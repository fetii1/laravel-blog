<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                @foreach ($users as $user)
                    <div>
                        <div class="flex justify-between">
                            <div>
                                <h2 class="text-lg font-semibold">{{ $user->name }}</h2>
                                <p class="text-sm">{{ $user->email }}</p>
                            </div>
                            <div>
                                <a href="{{ route('users.show', $user->id) }}" class="text-blue-500">View</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
