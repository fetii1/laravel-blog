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
                    <h1 class="text-3xl md:text-5xl mb-6">{{ $post->title }}</h1>
                    {{ $post->image }}
                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="mb-6" />
                    <p>{{ $post->content }}</p>
                    <a href="{{ route('posts.index') }}">Back</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
