{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Update Post') }}
        </h2>
    </x-slot> --}}
@extends('layouts.app')
@section('container')
    <style>
        .inp_div
        {
            position: relative;
            width: 100px;
            height: 40px;
            display: flex;
            justify-content: center;
            align-items: center;
            overflow: hidden;
            border: 1px solid #0099f9;
            border-radius: 10px;
        }
        .inp_div input
        {
            position: absolute;
            left: 0;
            width: 100%;
            z-index: 9;
            height: 200%;
        }
        .inp_div input::-webkit-file-upload-button
        {
            background: #0099f9;
            color: #fff;
            border: none;
            outline: none;
            cursor: pointer;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }
        .inp_div span
        {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            color: #fff
        }

        #imagePreview
        {
            position: relative;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 350px;
            height: 250px;
            border-radius: 10px;
        }
    </style>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-4 overflow-hidden shadow-sm sm:rounded-lg">
                <form id="add_form" action="{{route('post.update_post',[$post->id,$post->category_id])}}" enctype="multipart/form-data" method="POST" class="row">
                    @csrf

                    <div class="col-lg-6 p-3">
                        <label class="mt-2" for="title">Title</label>
                        <input value="{{$post->title}}" required type="text" placeholder="Post Title" name="title" class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">

                        <label required class="mt-2" for="excerpt">Excerpt</label>
                        <textarea value="" placeholder="Post Excerpt" style="resize: none" name="excerpt" id="" class="tinymce-editor border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" cols="30" rows="3">{{$post->excerpt}}</textarea>

                        <label required class="mt-2" for="body">Body</label>
                        <textarea value="" placeholder="Post Body" style="resize: none" name="body" id="" class="tinymce-editor border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" cols="30" rows="3">{{$post->body}}</textarea>

                        <label class="mt-2 mb-1" for="category">Category - <span class="text-blue-500">{{$post->Category->name}}</span></label>
                        <select name="category" class="form-control" id="exampleSelect">
                            <option>Select Category</option>

                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach

                        </select>

                        <button id="add_btn" class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-2 px-4 mt-4 rounded">Update Post</button>
                    </div>

                    {{-- <div class="col-lg-6 align-self-center justify-content-center align-items-center">
                        <!-- Image element to display the preview -->
                        @if ($post->post_img)
                            <img src="{{asset('storage/images/'.$post->post_img)}}" id="imagePreview" class="shadow mx-auto mb-3" style="display: block" src="#" alt="Image Preview">

                        @else
                            <img id="imagePreview" class="shadow mx-auto" style="display: none" src="#" alt="Image Preview">

                        @endif
                        <div class="inp_div shadow mx-auto">
                            <input type="hidden" value="{{$post->post_img}}" name="hidden_image">
                            <input type="file" name="image" id="imageInput">
                        </div>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('imageInput').addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    document.getElementById('imagePreview').src = reader.result;
                    document.getElementById('imagePreview').style.marginBottom = '20px';
                    document.getElementById('imagePreview').style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        });

        document.getElementById('add_form').addEventListener('submit',function(e){
            document.querySelector('.outer_spinner').style.display = 'block';
        })
    </script>
@endsection


{{-- </x-app-layout> --}}
