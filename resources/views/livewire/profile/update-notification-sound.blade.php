<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Volt\Component;
use Livewire\WithFileUploads;

new class extends Component
{
    use WithFileUploads;

    public $notificationSound;

    /**
     * Update the notification sound for the currently authenticated user.
     */
    public function updateNotificationSound(): void
    {
        $this->validate([
            'notificationSound' => ['required', 'file', 'mimes:mp3', 'max:10240'], // Max 10MB
        ]);

        $user = Auth::user();

        // Store the uploaded file
        $filePath = $this->notificationSound->store('sounds', 'public');



        // Update user's profile with the new sound path
        $user->notification_url= asset('storage/'.$filePath);
        $user->save();

        $this->dispatch('notification-sound-updated', path: $filePath);
    }


};
?>
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Notification Sound') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Upload a new MP3 file to change your notification sound.") }}
        </p>
    </header>

    <form wire:submit.prevent="updateNotificationSound" class="mt-6 space-y-6" enctype="multipart/form-data">
        <div>
            <x-input-label for="notificationSound" :value="__('Notification Sound (MP3)')" />
            <x-text-input wire:model="notificationSound" id="notificationSound" name="notificationSound" type="file" class="mt-1 block w-full form-control" required />
            <x-input-error class="mt-2" :messages="$errors->get('notificationSound')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            <x-action-message class="me-3" on="notification-sound-updated">
                {{ __('Notification sound updated successfully.') }}
            </x-action-message>
        </div>
    </form>
</section>
