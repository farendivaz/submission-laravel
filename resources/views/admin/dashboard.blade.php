{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
@extends('admin.layouts')
@section('container')
    <div class="py-12">
        <div class="w-4/5 mx-auto sm:px-6 lg:px-8">
            <div class="bg-transparent overflow-hidden  sm:rounded-lg">
                {{-- FIRST ROW --}}
                <div class="row px-lg-4 px-2 py-4">
                    <div class="text-5xl col-12">
                        <h1 class="display-3 text-gray-800 ">Hi, <span class="font-bold">{{$user->name}}!</span></h1>
                    </div>
                </div>

                {{-- SECOND ROW --}}
                <div class="row px-lg-4 px-2 py-4">
                    <div class="col-md-3 mr-3 d-flex flex-column justify-content-between align-items-start rounded mt-2 p-lg-3 p-2 bg-blue-400 shadow">
                        <h1 class="text-white-700 font-bold text-white text-4xl">Posts</h1>
                        <h1 class="text-4xl mt-2 text-white ml-auto">{{$posts->count()}}</h1>
                    </div>
                    <div class="col-md-3 mr-3 d-flex flex-column justify-content-between align-items-start mr-md-2 mr-0 rounded mt-2 p-lg-3 p-2 bg-red-400 shadow">
                        <h1 class="text-white-700 font-bold text-white text-4xl">Joined at</h1>
                        <h1 class="text-3xl  mt-2 text-white ml-auto">{{$user->created_at->format('d M Y')}}</h1>
                    </div>
                    <div class="col-md-3 mr-3 d-flex flex-column justify-content-between align-items-start mr-md-2 mr-0 rounded mt-2 p-lg-3 p-2 bg-teal-400 shadow">
                        <h1 class="text-white-700 font-bold text-white text-4xl">Most Used Categories</h1>
                        @if ($mostUsedCategoryModel)
                            <h1 class="text-3xl  mt-2 text-white ml-auto">{{$mostUsedCategoryModel->name}}</h1>
                        @else
                            <h1 class="text-3xl  mt-2 text-white ml-auto">Null</h1>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

{{-- </x-app-layout> --}}
