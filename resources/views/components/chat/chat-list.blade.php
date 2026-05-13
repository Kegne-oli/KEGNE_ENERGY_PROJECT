<div>
    {{-- User Chat List --}}
    <div class="ke-chat-list-container">
        <div class="ke-chat-list-header">
            <h5 class="mb-0">My Support Chats</h5>
        </div>

        <div class="ke-chat-list-body">
            @if($chats->count() > 0)
                @foreach($chats as $chat)
                <div class="ke-chat-item {{ $selectedChat && $selectedChat->id === $chat->id ? 'active' : '' }}"
                     wire:click="selectChat({{ $chat->id }})">
                    <div class="ke-chat-item-avatar">
                        {{ strtoupper(substr($chat->user->name, 0, 1)) }}
                    </div>
                    <div class="ke-chat-item-content">
                        <div class="ke-chat-item-subject">{{ $chat->subject }}</div>
                        <div class="ke-chat-item-preview">
                            @if($chat->latestMessage)
                                {{ Str::limit($chat->latestMessage->message, 50) }}
                            @else
                                No messages yet
                            @endif
                        </div>
                        <div class="ke-chat-item-meta">
                            <span class="ke-chat-status {{ $chat->status }}">{{ ucfirst($chat->status) }}</span>
                            <span class="ke-chat-time">{{ $chat->last_message_at ? $chat->last_message_at->diffForHumans() : 'Never' }}</span>
                        </div>
                    </div>
                    @if($chat->unreadMessagesForUser() > 0)
                    <div class="ke-chat-unread">{{ $chat->unreadMessagesForUser() }}</div>
                    @endif
                </div>
                @endforeach
            @else
                <div class="ke-chat-empty">
                    <span class="material-symbols-outlined">chat_bubble_outline</span>
                    <p>No support chats yet</p>
                    <small>Click the chat icon to start a conversation</small>
                </div>
            @endif
        </div>
    </div>

    @if($selectedChat)
    <div class="ke-chat-conversation">
        <div class="ke-chat-conversation-header">
            <div class="ke-chat-conversation-info">
                <h6 class="mb-0">{{ $selectedChat->subject }}</h6>
                <small class="text-muted">Status: {{ ucfirst($selectedChat->status) }}</small>
            </div>
            <button type="button" class="btn-close" wire:click="$set('selectedChat', null)"></button>
        </div>

        <div class="ke-chat-messages" id="messages-container">
            @foreach($selectedChat->messages as $message)
            <div class="ke-message {{ $message->is_admin ? 'admin' : 'user' }}">
                <div class="ke-message-content">
                    <div class="ke-message-text">{{ $message->message }}</div>
                    <div class="ke-message-time">{{ $message->created_at->format('M j, g:i A') }}</div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="ke-chat-input">
            <form wire:submit.prevent="sendMessage">
                <div class="input-group">
                    <input type="text" class="form-control" wire:model="newMessage"
                           placeholder="Type your message..." wire:keydown.enter.prevent="sendMessage">
                    <button type="submit" class="btn btn-primary">
                        <span class="material-symbols-outlined">send</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endif

    <style>
    .ke-chat-list-container {
        width: 350px;
        height: 500px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .ke-chat-list-header {
        padding: 1.5rem;
        border-bottom: 1px solid var(--ke-outline-var);
        background: var(--ke-surface);
    }

    .ke-chat-list-header h5 {
        color: var(--ke-on-surface);
        font-weight: 600;
    }

    .ke-chat-list-body {
        flex: 1;
        overflow-y: auto;
    }

    .ke-chat-item {
        padding: 1rem 1.5rem;
        border-bottom: 1px solid var(--ke-outline-var);
        cursor: pointer;
        transition: background 0.2s ease;
        display: flex;
        align-items: center;
        gap: 0.75rem;
    }

    .ke-chat-item:hover,
    .ke-chat-item.active {
        background: var(--ke-surface-cont);
    }

    .ke-chat-item-avatar {
        width: 40px;
        height: 40px;
        background: var(--ke-primary);
        color: white;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 14px;
        flex-shrink: 0;
    }

    .ke-chat-item-content {
        flex: 1;
        min-width: 0;
    }

    .ke-chat-item-subject {
        font-weight: 600;
        color: var(--ke-on-surface);
        margin-bottom: 0.25rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .ke-chat-item-preview {
        font-size: 13px;
        color: var(--ke-on-surface-var);
        margin-bottom: 0.25rem;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .ke-chat-item-meta {
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-size: 11px;
    }

    .ke-chat-status {
        padding: 0.25rem 0.5rem;
        border-radius: 12px;
        font-size: 10px;
        font-weight: 500;
        text-transform: uppercase;
    }

    .ke-chat-status.open {
        background: var(--ke-success, #4caf50);
        color: white;
    }

    .ke-chat-status.in_progress {
        background: var(--ke-warning, #ff9800);
        color: white;
    }

    .ke-chat-status.closed {
        background: var(--ke-error, #f44336);
        color: white;
    }

    .ke-chat-time {
        color: var(--ke-outline);
    }

    .ke-chat-unread {
        background: var(--ke-primary);
        color: white;
        border-radius: 50%;
        width: 20px;
        height: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: 600;
        flex-shrink: 0;
    }

    .ke-chat-empty {
        padding: 3rem 1.5rem;
        text-align: center;
        color: var(--ke-outline);
    }

    .ke-chat-empty .material-symbols-outlined {
        font-size: 48px;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    .ke-chat-empty p {
        margin-bottom: 0.5rem;
        font-weight: 500;
    }

    .ke-chat-empty small {
        font-size: 12px;
    }

    .ke-chat-conversation {
        width: 400px;
        height: 500px;
        background: white;
        border-radius: 12px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        display: flex;
        flex-direction: column;
        overflow: hidden;
        margin-left: 1rem;
    }

    .ke-chat-conversation-header {
        padding: 1.5rem;
        border-bottom: 1px solid var(--ke-outline-var);
        background: var(--ke-surface);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .ke-chat-conversation-info h6 {
        color: var(--ke-on-surface);
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .ke-chat-messages {
        flex: 1;
        padding: 1rem;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 0.75rem;
    }

    .ke-message {
        display: flex;
        margin-bottom: 0.5rem;
    }

    .ke-message.user {
        justify-content: flex-end;
    }

    .ke-message.admin {
        justify-content: flex-start;
    }

    .ke-message-content {
        max-width: 70%;
        padding: 0.75rem 1rem;
        border-radius: 18px;
        position: relative;
    }

    .ke-message.user .ke-message-content {
        background: var(--ke-primary);
        color: white;
    }

    .ke-message.admin .ke-message-content {
        background: var(--ke-surface-cont);
        color: var(--ke-on-surface);
    }

    .ke-message-text {
        font-size: 14px;
        line-height: 1.4;
        margin-bottom: 0.25rem;
    }

    .ke-message-time {
        font-size: 11px;
        opacity: 0.7;
    }

    .ke-chat-input {
        padding: 1rem 1.5rem;
        border-top: 1px solid var(--ke-outline-var);
        background: var(--ke-surface);
    }

    .ke-chat-input .input-group {
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        border-radius: 25px;
        overflow: hidden;
    }

    .ke-chat-input .form-control {
        border: none;
        padding: 0.75rem 1rem;
        font-size: 14px;
    }

    .ke-chat-input .form-control:focus {
        box-shadow: none;
    }

    .ke-chat-input .btn {
        border: none;
        padding: 0.75rem 1rem;
        background: var(--ke-primary);
        color: white;
    }

    .ke-chat-input .btn:hover {
        background: var(--ke-primary-hover, #1976d2);
    }

    @media (max-width: 768px) {
        .ke-chat-list-container,
        .ke-chat-conversation {
            width: 100%;
            max-width: none;
            height: 400px;
        }

        .ke-chat-conversation {
            margin-left: 0;
            margin-top: 1rem;
        }
    }
    </style>

    <script>
    document.addEventListener('livewire:updated', function () {
        const container = document.getElementById('messages-container');
        if (container) {
            container.scrollTop = container.scrollHeight;
        }
    });
    </script>
</div>