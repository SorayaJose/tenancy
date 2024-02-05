<x-tenancy-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Post
        </h2>
    </x-slot>

    <x-container class="py-6">
        <div class="card">
            <div class="card-body">
                <h1 class="text-2xl font-semibold mb-4">{{$post->name}}</h1>
                <p>{{$post->body}}</p>   
                
                <div class="flex justify-start">
                    <img src="{{ route('file', $post->image_url) }}" alt="">
                </div>
            </div>
        </div>
    </x-container>
</x-tenancy-layout>