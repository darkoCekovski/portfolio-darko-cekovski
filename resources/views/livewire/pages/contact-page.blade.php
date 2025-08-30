<div>
    <section class="container mx-auto px-6 py-12">
        <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 mb-6">{{ __('messages.contact_title') }}</h2>
        <form wire:submit.prevent="submit" class="max-w-lg mx-auto space-y-6">
            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('messages.contact_name_label') }}</label>
                <input type="text" id="name" wire:model="name" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white">
                @error('name') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('messages.contact_email_label') }}</label>
                <input type="email" id="email" wire:model="email" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white">
                @error('email') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <!-- Comment -->
            <div>
                <label for="comment" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('messages.contact_message_label') }}</label>
                <textarea id="comment" wire:model="comment" rows="5" class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-700 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:text-white"></textarea>
                @error('comment') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>
            <!-- Submit Button -->
            <div>
                <button type="submit" class="w-full px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-200">
                    {{ __('messages.contact_submit') }}
                </button>
            </div>
            <!-- Feedback Messages -->
            @if ($successMessage)
                <p class="text-green-600 dark:text-green-400">{{ $successMessage }}</p>
            @endif
            @if ($errorMessage)
                <p class="text-red-600 dark:text-red-400">{{ $errorMessage }}</p>
            @endif
        </form>
    </section>
</div>
