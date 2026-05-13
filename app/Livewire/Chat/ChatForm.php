<?php

namespace App\Livewire\Chat;

use App\Models\Chat;
use App\Models\Message;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ChatForm extends Component
{
    public $subject = '';
    public $message = '';
    public $priority = 'medium';
    public $showForm = false;

    protected $rules = [
        'subject' => 'required|string|max:255',
        'message' => 'required|string|max:1000',
        'priority' => 'required|in:low,medium,high',
    ];

    public function submit()
    {
        $this->validate();

        // Create new chat
        $chat = Chat::create([
            'user_id' => Auth::id(),
            'subject' => $this->subject,
            'priority' => $this->priority,
            'status' => 'open',
            'last_message_at' => now(),
        ]);

        // Create first message
        Message::create([
            'chat_id' => $chat->id,
            'user_id' => Auth::id(),
            'message' => $this->message,
            'is_admin' => false,
        ]);

        // Reset form
        $this->reset(['subject', 'message', 'priority']);
        $this->showForm = false;

        // Refresh chat icon unread count
        $this->emit('refreshChatIcon');

        session()->flash('message', 'Your message has been sent successfully! An admin will respond soon.');
    }

    public function toggleForm()
    {
        $this->showForm = !$this->showForm;
    }

    public function render()
    {
        return view('components.chat.chat-form');
    }
}