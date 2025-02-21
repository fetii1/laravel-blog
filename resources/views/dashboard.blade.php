<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categories') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-semibold text-gray-900">Select a Category</h2>
                </div>
                <div class="p-6 text-gray-900 w-full grid max-md:grid-cols-2 lg:grid-cols-3 gap-4">
                    @foreach ($tags as $tag)
                        <a href={{ route('tags.show', $tag) }}>
                            <div class="bg-gray-100 p-4 rounded-lg shadow-sm text-center">
                                <h2 class="uppercase tracking-widest font-semibold">{{ $tag->name }}</h2>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
