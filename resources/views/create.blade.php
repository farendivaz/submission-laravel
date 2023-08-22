@extends('layouts.app')

@section('container')
    <div class="container mx-auto px-4 mt-8">
        <h2 class="text-2xl font-semibold mb-4">Create Post</h2>
        <form action="{{ url('store-form') }}" method="post" class="max-w-md">
            @csrf
            <div class="mb-4">
                <label for="title" class="block font-medium mb-1">Title:</label>
                <input type="text" class="form-input w-full" id="title" name="title" required>
            </div>
            <div class="mb-4">
                <label for="content" class="block font-medium mb-1">Content:</label>
                <textarea class="form-input w-full" id="content" name="content" rows="5" required></textarea>
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Create</button>
        </form>
    </div>
@endsection
