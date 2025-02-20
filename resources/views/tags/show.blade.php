<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $tag->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- Add your tag-specific content here --}}
                    <h3 class="text-lg font-semibold mb-4">Posts with {{ $tag->name }} tag:</h3>
                    @forelse($tag->posts as $post)
                        <div class="mb-4">
                            <a href="{{ route('posts.show', $post) }}">
                                <h4 class="text-md font-medium">{{ $post->title }}</h4>
                            </a>
                        </div>
                    @empty
                        <p>No posts found with this tag.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
