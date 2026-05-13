<div>
    {{-- Floating Chat Icon --}}
    <div class="ke-chat-icon" wire:click="toggleForm">
        <span class="material-symbols-outlined">chat</span>
        @if($unreadCount > 0)
        <div class="ke-chat-badge">{{ $unreadCount > 99 ? '99+' : $unreadCount }}</div>
        @endif
    </div>

    @if($showForm)
    <livewire:chat.chat-form />
    @endif

    <style>
    .ke-chat-icon {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 56px;
        height: 56px;
        background: var(--ke-primary);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        transition: all 0.3s ease;
        z-index: 1000;
    }

    .ke-chat-icon:hover {
        transform: scale(1.1);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }

    .ke-chat-icon .material-symbols-outlined {
        color: white;
        font-size: 24px;
    }

    .ke-chat-badge {
        position: absolute;
        top: -8px;
        right: -8px;
        background: var(--ke-error, #f44336);
        color: white;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 11px;
        font-weight: 600;
        border: 2px solid white;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
    }

    @media (max-width: 768px) {
        .ke-chat-icon {
            bottom: 16px;
            right: 16px;
            width: 50px;
            height: 50px;
        }

        .ke-chat-icon .material-symbols-outlined {
            font-size: 20px;
        }

        .ke-chat-badge {
            width: 20px;
            height: 20px;
            font-size: 10px;
            top: -6px;
            right: -6px;
        }
    }
    </style>
</div>