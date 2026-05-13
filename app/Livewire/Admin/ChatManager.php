<?php

namespace App\Livewire\Admin;

use App\Models\Chat;
use App\Models\Message;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ChatManager extends Component
{
    public $chats;
    public $selectedChat = null;
    public $newMessage = '';
    public $status = 'all';

    public function mount()
    {
        $this->loadChats();
    }

    public function loadChats()
    {
        $query = Chat::with(['user', 'latestMessage', 'messages' => function($query) {
            $query->latest()->limit(1);
        }]);

        if ($this->status !== 'all') {
            $query->where('status', $this->status);
        }

        $this->chats = $query->orderBy('last_message_at', 'desc')->get();
    }

    public function selectChat($chatId)
    {
        $this->selectedChat = Chat::with('messages.user')->find($chatId);

        // Mark messages as read for admin
        if ($this->selectedChat) {
            $this->selectedChat->markMessagesAsRead(true);
        }
    }

    public function sendMessage()
    {
        if (!$this->selectedChat || empty($this->newMessage)) {
            return;
        }

        $this->validate([
            'newMessage' => 'required|string|max:1000',
        ]);

        // Create new message
        $this->selectedChat->messages()->create([
            'user_id' => Auth::id(),
            'message' => $this->newMessage,
            'is_admin' => true,
        ]);

        // Update chat's last message timestamp
        $this->selectedChat->update(['last_message_at' => now()]);

        $this->newMessage = '';
        $this->loadChats(); // Refresh the chat list

        // Refresh user chat icon unread counts
        $this->emit('refreshChatIcon');
    }

    public function updateStatus($chatId, $status)
    {
        $chat = Chat::find($chatId);
        if ($chat) {
            $chat->update(['status' => $status]);
            $this->loadChats();
        }
    }

    public function updatedStatus()
    {
        $this->loadChats();
    }

    public function render()
    {
        return view('components.admin.chat-manager');
    }
}