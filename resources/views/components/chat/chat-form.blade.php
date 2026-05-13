<div>
    {{-- Chat Form Modal --}}
    <div class="ke-chat-modal-overlay" wire:click="toggleForm">
        <div class="ke-chat-modal" wire:click.stop>
            <div class="ke-chat-modal-header">
                <h5 class="mb-0">Contact Support</h5>
                <button type="button" class="btn-close" wire:click="toggleForm"></button>
            </div>

            <div class="ke-chat-modal-body">
                <form wire:submit.prevent="submit">
                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="subject" wire:model="subject"
                               placeholder="Brief description of your issue">
                        @error('subject') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="mb-3">
                        <label for="priority" class="form-label">Priority</label>
                        <select class="form-select" id="priority" wire:model="priority">
                            <option value="low">Low</option>
                            <option value="medium" selected>Medium</option>
                            <option value="high">High</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="message" class="form-label">Message</label>
                        <textarea class="form-control" id="message" rows="4" wire:model="message"
                                  placeholder="Describe your issue in detail..."></textarea>
                        @error('message') <div class="text-danger small">{{ $message }}</div> @enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary flex-fill">
                            <span class="material-symbols-outlined me-1">send</span>
                            Send Message
                        </button>
                        <button type="button" class="btn btn-outline-secondary" wire:click="toggleForm">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show position-fixed"
             style="bottom: 20px; left: 20px; z-index: 1001; min-width: 300px;">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <style>
    .ke-chat-modal-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1001;
    }

    .ke-chat-modal {
        background: white;
        border-radius: 12px;
        width: 90%;
        max-width: 500px;
        max-height: 90vh;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .ke-chat-modal-header {
        padding: 1.5rem;
        border-bottom: 1px solid var(--ke-outline-var);
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .ke-chat-modal-header h5 {
        color: var(--ke-on-surface);
        font-weight: 600;
    }

    .ke-chat-modal-body {
        padding: 1.5rem;
    }

    .form-label {
        font-weight: 500;
        color: var(--ke-on-surface);
        margin-bottom: 0.5rem;
    }

    .form-control, .form-select {
        border: 1px solid var(--ke-outline);
        border-radius: 8px;
        padding: 0.75rem;
        font-size: 14px;
    }

    .form-control:focus, .form-select:focus {
        border-color: var(--ke-primary);
        box-shadow: 0 0 0 0.2rem rgba(33, 150, 243, 0.25);
    }

    .btn {
        padding: 0.75rem 1.5rem;
        border-radius: 8px;
        font-weight: 500;
        border: none;
    }

    .btn-primary {
        background: var(--ke-primary);
        color: white;
    }

    .btn-primary:hover {
        background: var(--ke-primary-hover, #1976d2);
    }

    .btn-outline-secondary {
        border: 1px solid var(--ke-outline);
        color: var(--ke-on-surface);
    }

    .btn-outline-secondary:hover {
        background: var(--ke-surface-cont);
    }

    @media (max-width: 576px) {
        .ke-chat-modal {
            width: 95%;
            margin: 1rem;
        }

        .ke-chat-modal-header,
        .ke-chat-modal-body {
            padding: 1rem;
        }
    }
    </style>
</div>