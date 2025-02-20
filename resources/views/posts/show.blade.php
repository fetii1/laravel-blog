<x-app-layout>
    {{ $post->title }}
    {{ $post->content }}
    <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" />
    <a href="{{ route('posts.index') }}">Back</a>
</x-app-layout>
