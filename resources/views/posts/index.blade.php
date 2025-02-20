<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @foreach ($allPosts as $post)
                        <div class="mb-4">
                            <a href="{{ route('posts.show', $post) }}">
                                <h4 class="text-xl font-medium mb-2">{{ $post->title }}</h4>
                                <img src="{{ $post->image }}" class="mb-2">
                                <p>{{ $post->user->name }}</p>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
