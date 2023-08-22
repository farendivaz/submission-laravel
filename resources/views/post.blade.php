@extends('layouts.app')
@section('container')
    <div class="w-4/5 mx-auto">
      <div class="pb-8 flex flex-col rounded-lg">
            <img src="https://source.unsplash.com/random/" alt="RANDOM" class="rounded-lg object-cover h-96">
            <div class="p-4">
                <h1 class="font-bold text-4xl">{{$post->title}}</h1>
                <div class="my-4 flex gap-4">
                <p class="text-sm text-slate-600 inline p-1 rounded-sm">Written on {{ $post->created_at->format("d M Y") }} by
                  <span class="text-sm bg-purple-300 inline p-1 rounded-sm text-black">{{$post->user->name}}</span>
                </p>
                    <p class="text-sm bg-purple-300 inline p-1 rounded-sm">🕒 {{mt_rand(3, 7)}} min read</p>
                </div>
                <p class="text-justify">{{ $post->body }}</p>
            </div>
      </div>
    </div>
@endsection
