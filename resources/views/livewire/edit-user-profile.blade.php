<div>
    <x-auth-validation-errors class="mb-4" :errors="$errors" />
    <x-success-message-session class="mb-4"/>
    <form wire:submit.prevent="updateUser('{{$user->id}}')" method="POST">
    @csrf

    <!-- Name -->
        <div class="grid grid-cols-2 gap-6">
            <div class="grid grid-rows-2 gap-6">
                <div>
            <x-label for="name" :value="__('Name')" />

            <x-input wire:model="name" id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
        </div>
        <!-- Email Address -->
        <div>
            <x-label for="email" :value="__('Email')" />

            <x-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
        </div>
</div>
            <!-- Password -->
            <div class="grid grid-rows-2 gap-6">
                <div>
                    <x-label for="password" :value="__('Password')" />

                    <x-input wire:model="password" id="password" class="block mt-1 w-full"
                             type="password"
                             name="password"
                             required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input wire:model="password_confirmation" id="password_confirmation" class="block mt-1 w-full"
                             type="password"
                             name="password_confirmation" required />
                </div>
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button class="ml-4">
                    {{ __('Update') }}
                </x-button>
            </div>
        </div>
    </form>
</div>
