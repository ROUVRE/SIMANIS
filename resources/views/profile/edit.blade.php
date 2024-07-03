<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Profile') }}
            <a href="{{ '/' }}">
                <div class="flex items-center justify-end">
                    <button
                        class="rounded-lg bg-purple-600 px-4 py-2 font-bold text-white hover:bg-purple-700">Back</button>
                </div>
            </a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="sm:px-6 mx-auto max-w-7xl space-y-6 lg:px-8">
            <div class="sm:p-8 sm:rounded-lg bg-white p-4 shadow">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="sm:p-8 sm:rounded-lg bg-white p-4 shadow">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="sm:p-8 sm:rounded-lg bg-white p-4 shadow">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
