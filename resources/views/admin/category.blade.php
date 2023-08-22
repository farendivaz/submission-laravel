{{-- <x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Categories') }}
      </h2>
  </x-slot> --}}
@extends('admin.layouts')
@section('container')
  <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white p-3 overflow-hidden shadow-sm sm:rounded-lg">
              <p class="text-grey-600 text-lg mb-3">Add Category</p>

              {{-- FIRST ROW --}}
              <form action="{{route('post.category')}}" method="POST" id="category_form" class="row mb-4">
                  @csrf
                  <div class="col-lg-3 col-8">
                      <input name="category" required placeholder="Category name" type="text" class="border-gray-300 w-full focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                  </div>
                  <div class="col-lg-3 col-4">
                      <button id="add_btn" class="bg-gray-900 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Add</button>
                  </div>
              </form>

              {{-- SECOND ROW --}}
              <hr>
              @if ($categories->count() > 0)
                  <p class="text-grey-600 text-lg mb-3 mt-3">All Categories</p>

                  <div class="row justify-content-center">
                      <div class="col">
                          <table class="table-auto">
                              <thead class="bg-blue-400 text-white">
                                  <tr>
                                      <td class="font-bold border border-slate-600 p-2"><b>No.</b></td>
                                      <td class="font-bold border border-slate-600 p-2"><b>Name</b></td>
                                      <td class="font-bold border border-slate-600 p-2"><b>No. of posts</b></td>
                                      <td class="font-bold border border-slate-600 p-2"><b>Delete</b></td>
                                  </tr>
                              </thead>

                                  @php
                                      $increment = 1;
                                  @endphp
                                <tbody>
                                  @foreach ($categories as $category)
                                      <tr>
                                          <td class="font-bold border border-slate-800 p-4">{{$increment}}</td>
                                          <td class="font-bold border border-slate-800 p-4">{{$category->name}}</td>
                                          <td class="font-bold border border-slate-800 text-center p-4">{{$category->posts->count()}}</td>
                                          <td class="font-bold border border-slate-800 p-4">
                                              <a id="del_button" class="btn btn-sm bg-red-600 text-white p-2" href="{{route('view.del_category', $category->id)}}">Remove</a>
                                          </td>
                                      </tr>

                                      @php
                                          $increment++;
                                      @endphp
                                  @endforeach
                                </tbody>
                          </table>
                      </div>
                  </div>
              @else
                  <p class="text-grey-600 text-lg mb-3 mt-3">No Category!</p>

              @endif
          </div>
      </div>
  </div>

  <script>
      var del_btn = document.getElementById('del_button')
      var add_btn = document.getElementById('add_btn')

      add_btn.addEventListener('click', function(){
          add_btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i>'
      })

      del_btn.addEventListener('click', function(){
          del_btn.style.display = 'none'
      })
  </script>
@endsection

{{-- </x-app-layout> --}}
