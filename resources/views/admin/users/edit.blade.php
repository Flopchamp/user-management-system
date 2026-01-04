<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('admin.users.update', $user) }}">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div class="mb-4">
                            <label for="name" class="block font-medium text-sm text-gray-700">
                                Name
                            </label>
                            <input id="name" 
                                   type="text" 
                                   name="name" 
                                   value="{{ old('name', $user->name) }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                   required autofocus>
                            @error('name')
                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-4">
                            <label for="email" class="block font-medium text-sm text-gray-700">
                                Email
                            </label>
                            <input id="email" 
                                   type="email" 
                                   name="email" 
                                   value="{{ old('email', $user->email) }}"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                   required>
                            @error('email')
                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Role -->
                        <div class="mb-4">
                            <label for="role" class="block font-medium text-sm text-gray-700">
                                Role
                            </label>
                            <select id="role" 
                                    name="role" 
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" 
                                    required>
                                <option value="user" {{ old('role', $user->role) == 'user' ? 'selected' : '' }}>User</option>
                                <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                            @error('role')
                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password (Optional) -->
                        <div class="mb-4">
                            <label for="password" class="block font-medium text-sm text-gray-700">
                                New Password (leave blank to keep current)
                            </label>
                            <input id="password" 
                                   type="password" 
                                   name="password" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                            @error('password')
                                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="block font-medium text-sm text-gray-700">
                                Confirm New Password
                            </label>
                            <input id="password_confirmation" 
                                   type="password" 
                                   name="password_confirmation" 
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm">
                        </div>

                        <!-- Buttons -->
                      <!-- Buttons -->
                        <div class="flex items-center justify-end mt-6" style="margin-top: 20px;">
                            <a href="{{ route('admin.users.index') }}" 
                            style="background-color: #6b7280; color: white; padding: 10px 20px; border-radius: 5px; text-decoration: none; margin-right: 10px; display: inline-block;">
                                Cancel
                            </a>
                            <button type="submit" 
                                    style="background-color: #3b82f6; color: white; padding: 10px 20px; border-radius: 5px; border: none; cursor: pointer; font-weight: bold;">
                                Update User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>