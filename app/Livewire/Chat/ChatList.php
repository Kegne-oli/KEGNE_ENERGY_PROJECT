<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ChatList extends Component
{
    public $chats;
    public $selectedChat = null;
    public $newMessage = '';

    public function mount()
    {
        $this->loadChats();
    }

    public function loadChats()
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        if (! $user) {
            $this->chats = collect();
            return;
        }

        $this->chats = $user->chats()
            ->with(['latestMessage', 'messages' => function($query) {
                $query->latest()->limit(1);
            }])
            ->orderBy('last_message_at', 'desc')
            ->get();
    }

    public function selectChat($chatId)
    {
        $this->selectedChat = Chat::with('messages.user')->find($chatId);

        // Mark messages as read for user
        if ($this->selectedChat) {
            $this->selectedChat->markMessagesAsRead(false);
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
            'is_admin' => false,
        ]);

        // Update chat's last message timestamp
        $this->selectedChat->update(['last_message_at' => now()]);

        $this->newMessage = '';
        $this->loadChats(); // Refresh the chat list

        // Refresh chat icon unread count
        $this->emit('refreshChatIcon');
    }

    public function render()
    {
        return view('components.chat.chat-list');
    }
}