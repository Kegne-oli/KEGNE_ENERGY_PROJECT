<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ChatIcon extends Component
{
    public $showForm = false;
    public $unreadCount = 0;

    public function mount()
    {
        $this->loadUnreadCount();
    }

    public function loadUnreadCount()
    {
        /** @var \App\Models\User|null $user */
        $user = Auth::user();

        if (! $user) {
            $this->unreadCount = 0;
            return;
        }

        $this->unreadCount = $user->chats()
            ->join('messages', 'chats.id', '=', 'messages.chat_id')
            ->where('messages.is_admin', true)
            ->whereNull('messages.read_at')
            ->count();
    }

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
    }

    public function refreshUnreadCount()
    {
        $this->loadUnreadCount();
    }

    protected $listeners = ['refreshChatIcon' => 'refreshUnreadCount'];

    public function render()
    {
        return view('components.chat.chat-icon');
    }
}