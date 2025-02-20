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
                    @forelse($posts as $post)
                        <div class="mb-4 ring-2 rounded-lg p-4">
                            <a href="{{ route('posts.show', $post) }}">
                                <h4 class="text-xl font-medium mb-2">{{ $post->title }}</h4>
                                @if ($post->image)
                                    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                                        class="mb-2">
                                @endif
                                <p>{{ $post->user->name }}</p>
                            </a>
                        </div>
                    @empty
                        <p>No posts found with this tag.</p>
                    @endforelse

                    <div class="mt-6">
                        {{ $posts->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
