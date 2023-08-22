{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot> --}}

@extends('admin.layouts')
@section('container')
    <div class="mx-auto h-screen py-12">
        <div class="max-w-7xl h-screen mx-auto sm:px-6 lg:px-8">
            <div class="mx-auto bg-white h-screen p-lg-3 p-2 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="h-screen mx-auto row p-2">
                    @if ($posts->count() > 0)
                        <table class="border-collapse border border-slate-500">
                            <thead class="bg-blue-400 text-white">
                                <tr>
                                    <th class="font-bold border border-slate-600 p-2">No.</th>
                                    <th class="font-bold border border-slate-600 p-2">Title</th>
                                    <th class="font-bold border border-slate-600 p-2">Posted on</th>
                                    <th class="font-bold border border-slate-600 p-2">Category</th>
                                    <th class="font-bold border border-slate-600 p-2">Options</th>
                                </tr>
                            </thead>
                                @php
                                    $i = 1;
                                @endphp

                                @foreach ($posts as $post)
                            <tbody>
                                    <tr>
                                        <td class="border border-slate-600 p-2">{{$i}}</td>
                                        {{-- <td>
                                            @if ($post->post_img)
                                                <img src="{{asset('storage/images/'.$post->post_img)}}" style="width: 50px;height:50px;border-radius:5px;border:1px solid #a3a3a3;" alt="">
                                            @else
                                                <p class="text-gray-500">No Image</p>
                                            @endif
                                        </td> --}}
                                        <td class="text-gray-500 border border-slate-600 p-2">{{Str::limit($post->title,100)}}</td>
                                        <td class="text-gray-500 border border-slate-600 p-2">{{$post->created_at->format('d F Y')}}</td>
                                        <td class="text-gray-500 border border-slate-600 p-2">{{$post->Category->name}}</td>
                                        <td class="border border-slate-600 p-2">
                                            <a href="{{route('view.single',$post->id)}}" class="bg-green-500 text-white py-1 px-2 rounded-sm" title="Preview">View</a>
                                            <a href="{{route('view.update_post',[$post->id,$post->category_id])}}" class="bg-blue-500 text-white py-1 px-2 rounded-sm" title="Edit">Edit</a>
                                            <a href="{{route('view.del_post',[$post->id, $post->category_id])}}" title="Delete" class="bg-red-500 text-white py-1 px-2 rounded-sm">Delete</a>
                                        </td>
                                    </tr>

                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                        <br>
                        {{-- <div>
                            {{ $posts->links() }}
                        </div> --}}
                    @else
                        <h1 class="p-2 text-gray-5">No Posts!</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- </x-app-layout> --}}
