@extends('layouts.app')
@section('container')
    <h1 class="text-3xl text-center font-bold mb-4">POST CATEGORY: {{ $title }}</h1>
    <div class="w-4/5 mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
    @foreach ($posts as $post)
    {{-- <a href="/blog/{{$post->slug}}"> --}}
    <a href="{{route('guest.singlePost', $post->slug)}}">
      <div class="h-96 relative flex flex-col border border-slate-400 rounded-lg">
        <img src="https://source.unsplash.com/400x200/?{{$post->category->name}}" alt="RANDOM" class="rounded-t-lg object-cover">
        {{-- <a href="/categories/{{$post->category->slug}}" class="text-3xl bg-purple-300 p-1 rounded-sm">{{$post->category->name}}</a> --}}
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