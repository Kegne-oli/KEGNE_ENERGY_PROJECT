<div>
    {{-- Admin Chat Manager --}}
    <div class="ke-admin-chat-container">
        <div class="ke-admin-chat-header">
            <h4 class="mb-0">Support Chat Management</h4>
            <div class="ke-admin-chat-filters">
                <select class="form-select form-select-sm" wire:model.live="status">
                    <option value="all">All Chats</option>
                    <option value="open">Open</option>
                    <option value="in_progress">In Progress</option>
                    <option value="closed">Closed</option>
                </select>
            </div>
        </div>

        <div class="ke-admin-chat-body">
            <div class="ke-admin-chat-list">
                @if($chats->count() > 0)
                    @foreach($chats as $chat)
                    <div class="ke-admin-chat-item {{ $selectedChat && $selectedChat->id === $chat->id ? 'active' : '' }}"
                         wire:click="selectChat({{ $chat->id }})">
                        <div class="ke-admin-chat-item-header">
                            <div class="ke-admin-chat-user">
                                <div class="ke-admin-chat-avatar">
                                    {{ strtoupper(substr($chat->user->name, 0, 1)) }}
                                </div>
                                <div class="ke-admin-chat-user-info">
                                    <div class="ke-admin-chat-user-name">{{ $chat->user->name }}</div>
                                    <div class="ke-admin-chat-subject">{{ $chat->subject }}</div>
                                </div>
                            </div>
                            <div class="ke-admin-chat-meta">
                                <span class="ke-admin-chat-priority {{ $chat->priority }}">
                                    {{ ucfirst($chat->priority) }}
                                </span>
                                <span class="ke-admin-chat-time">
                                    {{ $chat->last_message_at ? $chat->last_message_at->diffForHumans() : 'Never' }}
                                </span>
                            </div>
                        </div>
                        <div class="ke-admin-chat-preview">
                            @if($chat->latestMessage)
                                {{ Str::limit($chat->latestMessage->message, 60) }}
                            @else
                                No messages yet
                            @endif
                        </div>
                        <div class="ke-admin-chat-status">
                            <select class="form-select form-select-sm"
                                    wire:change="updateStatus({{ $chat->id }}, $event.target.value)">
                                <option value="open" {{ $chat->status === 'open' ? 'selected' : '' }}>Open</option>
                                <option value="in_progress" {{ $chat->status === 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="closed" {{ $chat->status === 'closed' ? 'selected' : '' }}>Closed</option>
                            </select>
                            @if($chat->unreadMessagesForAdmin() > 0)
                            <div class="ke-admin-chat-unread">{{ $chat->unreadMessagesForAdmin() }}</div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="ke-admin-chat-empty">
                        <span class="material-symbols-outlined">chat_bubble_outline</span>
                        <p>No chats found</p>
                        <small>{{ $status === 'all' ? 'No support chats yet' : 'No ' . str_replace('_', ' ', $status) . ' chats' }}</small>
                    </div>
                @endif
            </div>

            @if($selectedChat)
            <div class="ke-admin-chat-conversation">
                <div class="ke-admin-chat-conversation-header">
                    <div class="ke-admin-chat-conversation-info">
                        <h5 class="mb-0">{{ $selectedChat->subject }}</h5>
                        <div class="ke-admin-chat-conversation-meta">
                            <span class="me-3">User: {{ $selectedChat->user->name }}</span>
                            <span class="me-3">Priority: {{ ucfirst($selectedChat->priority) }}</span>
                            <span>Status: {{ ucfirst($selectedChat->status) }}</span>
                        </div>
                    </div>
                    <button type="button" class="btn-close" wire:click="$set('selectedChat', null)"></button>
                </div>

                <div class="ke-admin-chat-messages" id="admin-messages-container">
                    @foreach($selectedChat->messages as $message)
                    <div class="ke-admin-message {{ $message->is_admin ? 'admin' : 'user' }}">
                        <div class="ke-admin-message-avatar">
                            @if($message->is_admin)
                                <span class="material-symbols-outlined">support_agent</span>
                            @else
                                {{ strtoupper(substr($message->user->name, 0, 1)) }}
                            @endif
                        </div>
                        <div class="ke-admin-message-content">
                            <div class="ke-admin-message-header">
                                <span class="ke-admin-message-sender">
                                    {{ $message->is_admin ? 'Support Team' : $message->user->name }}
                                </span>
                                <span class="ke-admin-message-time">
                                    {{ $message->created_at->format('M j, g:i A') }}
                                </span>
                            </div>
                            <div class="ke-admin-message-text">{{ $message->message }}</div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="ke-admin-chat-input">
                    <form wire:submit.prevent="sendMessage">
                        <div class="input-group">
                            <input type="text" class="form-control" wire:model="newMessage"
                                   placeholder="Type your response..." wire:keydown.enter.prevent="sendMessage">
                            <button type="submit" class="btn btn-primary">
                                <span class="material-symbols-outlined">send</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>

    <style>
    .ke-admin-chat-container {
        height: 100%;
        display: flex;
        flex-direction: column;
        background: var(--ke-surface);
        border-radius: 12px;
        overflow: hidden;
    }

    .ke-admin-chat-header {
        padding: 1.5rem;
        border-bottom: 1px solid var(--ke-outline-var);
        background: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .ke-admin-chat-header h4 {
        color: var(--ke-on-surface);
        font-weight: 600;
        margin: 0;
    }

    .ke-admin-chat-filters .form-select {
        width: auto;
        min-width: 150px;
    }

    .ke-admin-chat-body {
        flex: 1;
        display: flex;
        overflow: hidden;
    }

    .ke-admin-chat-list {
        width: 400px;
        border-right: 1px solid var(--ke-outline-var);
        overflow-y: auto;
        background: white;
    }

    .ke-admin-chat-item {
        padding: 1rem 1.5rem;
        border-bottom: 1px solid var(--ke-outline-var);
        cursor: pointer;
        transition: background 0.2s ease;
    }

    .ke-admin-chat-item:hover,
    .ke-admin-chat-item.active {
        background: var(--ke-surface-cont);
    }

    .ke-admin-chat-item-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        margin-bottom: 0.5rem;
    }

    .ke-admin-chat-user {
        display: flex;
        align-items: center;
        gap: 0.75rem;
        flex: 1;
    }

    .ke-admin-chat-avatar {
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

    .ke-admin-chat-user-info {
        flex: 1;
        min-width: 0;
    }

    .ke-admin-chat-user-name {
        font-weight: 600;
        color: var(--ke-on-surface);
        margin-bottom: 0.25rem;
    }

    .ke-admin-chat-subject {
        font-size: 13px;
        color: var(--ke-on-surface-var);
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .ke-admin-chat-meta {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        gap: 0.25rem;
    }

    .ke-admin-chat-priority {
        padding: 0.25rem 0.5rem;
        border-radius: 12px;
        font-size: 10px;
        font-weight: 500;
        text-transform: uppercase;
    }

    .ke-admin-chat-priority.low {
        background: var(--ke-success, #4caf50);
        color: white;
    }

    .ke-admin-chat-priority.medium {
        background: var(--ke-warning, #ff9800);
        color: white;
    }

    .ke-admin-chat-priority.high {
        background: var(--ke-error, #f44336);
        color: white;
    }

    .ke-admin-chat-time {
        font-size: 11px;
        color: var(--ke-outline);
    }

    .ke-admin-chat-preview {
        font-size: 13px;
        color: var(--ke-on-surface-var);
        margin-bottom: 0.5rem;
        line-height: 1.4;
    }

    .ke-admin-chat-status {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .ke-admin-chat-status .form-select {
        width: 120px;
    }

    .ke-admin-chat-unread {
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

    .ke-admin-chat-empty {
        padding: 3rem 1.5rem;
        text-align: center;
        color: var(--ke-outline);
    }

    .ke-admin-chat-empty .material-symbols-outlined {
        font-size: 48px;
        margin-bottom: 1rem;
        opacity: 0.5;
    }

    .ke-admin-chat-empty p {
        margin-bottom: 0.5rem;
        font-weight: 500;
    }

    .ke-admin-chat-empty small {
        font-size: 12px;
    }

    .ke-admin-chat-conversation {
        flex: 1;
        display: flex;
        flex-direction: column;
        background: white;
    }

    .ke-admin-chat-conversation-header {
        padding: 1.5rem;
        border-bottom: 1px solid var(--ke-outline-var);
        background: var(--ke-surface);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .ke-admin-chat-conversation-info h5 {
        color: var(--ke-on-surface);
        font-weight: 600;
        margin-bottom: 0.25rem;
    }

    .ke-admin-chat-conversation-meta {
        font-size: 13px;
        color: var(--ke-on-surface-var);
    }

    .ke-admin-chat-messages {
        flex: 1;
        padding: 1rem;
        overflow-y: auto;
        display: flex;
        flex-direction: column;
        gap: 1rem;
    }

    .ke-admin-message {
        display: flex;
        gap: 0.75rem;
        margin-bottom: 0.5rem;
    }

    .ke-admin-message.user {
        justify-content: flex-start;
    }

    .ke-admin-message.admin {
        justify-content: flex-end;
        flex-direction: row-reverse;
    }

    .ke-admin-message-avatar {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 600;
        font-size: 14px;
        flex-shrink: 0;
    }

    .ke-admin-message.user .ke-admin-message-avatar {
        background: var(--ke-primary);
        color: white;
    }

    .ke-admin-message.admin .ke-admin-message-avatar {
        background: var(--ke-secondary);
        color: white;
    }

    .ke-admin-message.admin .ke-admin-message-avatar .material-symbols-outlined {
        font-size: 18px;
    }

    .ke-admin-message-content {
        flex: 1;
        max-width: calc(100% - 50px);
    }

    .ke-admin-message-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 0.25rem;
    }

    .ke-admin-message-sender {
        font-weight: 600;
        font-size: 13px;
        color: var(--ke-on-surface);
    }

    .ke-admin-message-time {
        font-size: 11px;
        color: var(--ke-outline);
    }

    .ke-admin-message-text {
        font-size: 14px;
        line-height: 1.4;
        color: var(--ke-on-surface);
        background: var(--ke-surface-cont);
        padding: 0.75rem 1rem;
        border-radius: 12px;
        word-wrap: break-word;
    }

    .ke-admin-message.admin .ke-admin-message-text {
        background: var(--ke-primary);
        color: white;
    }

    .ke-admin-chat-input {
        padding: 1rem 1.5rem;
        border-top: 1px solid var(--ke-outline-var);
        background: var(--ke-surface);
    }

    .ke-admin-chat-input .input-group {
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        border-radius: 25px;
        overflow: hidden;
    }

    .ke-admin-chat-input .form-control {
        border: none;
        padding: 0.75rem 1rem;
        font-size: 14px;
    }

    .ke-admin-chat-input .form-control:focus {
        box-shadow: none;
    }

    .ke-admin-chat-input .btn {
        border: none;
        padding: 0.75rem 1rem;
        background: var(--ke-primary);
        color: white;
    }

    .ke-admin-chat-input .btn:hover {
        background: var(--ke-primary-hover, #1976d2);
    }

    @media (max-width: 1024px) {
        .ke-admin-chat-list {
            width: 350px;
        }
    }

    @media (max-width: 768px) {
        .ke-admin-chat-body {
            flex-direction: column;
        }

        .ke-admin-chat-list {
            width: 100%;
            height: 300px;
            border-right: none;
            border-bottom: 1px solid var(--ke-outline-var);
        }

        .ke-admin-chat-conversation {
            height: 400px;
        }
    }
    </style>

    <script>
    document.addEventListener('livewire:updated', function () {
        const container = document.getElementById('admin-messages-container');
        if (container) {
            container.scrollTop = container.scrollHeight;
        }
    });
    </script>
</div>