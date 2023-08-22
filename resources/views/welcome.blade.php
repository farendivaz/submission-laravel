@extends('layouts.app')
@section('container')
    {{-- <h1 class="text-3xl text-center text-blue-500 font-bold underline">WELCOME TO THE HOME PAGE</h1> --}}
    <div class="w-4/5 mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
    @foreach ($posts as $post)
    {{-- <a href="/blog/{{$post->slug}}"> --}}
    <a href="{{route('guest.singlePost', $post->slug)}}">
    <div class="relative h-96 flex flex-col border border-slate-400 rounded-lg">
            <img src="https://source.unsplash.com/200x100/?{{$post->category->name}}" alt="RANDOM" class="rounded-t-lg">
            <div class="flex absolute rounded-lg top-1 right-1">
                @foreach ($post->tags as $tag)
                    <div class="mr-2 bg-purple-300 px-2 py-1 rounded-lg">
                        <small class="">{{$tag->name}}</small>
                    </div>
                @endforeach
            </div>

        {{-- <a href="/categories/{{$post->category->slug}}" class="absolute text-xs bg-purple-300 inline p-1 rounded-sm">{{$post->category->name}}</a> --}}
            <div class="p-4">
                <h1 class="font-bold text-xl">{{$post->title}}</h1>
                <div class="my-1 flex gap-4">
                    <p class="text-sm bg-purple-300 inline p-1 rounded-sm">{{ $post->created_at->format("d M Y") }}</p>
                    <p class="text-sm bg-purple-300 inline p-1 rounded-sm">🕒 {{mt_rand(3, 7)}} min read</p>
                </div>
                <p>{{ $post->excerpt }}</p>
            </div>
        </div>
    </a>
    @endforeach
    </div>
@endsection
