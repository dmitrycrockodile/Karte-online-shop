@extends('layouts.main')

@section('title', 'Categories')

@section('content')
   <x-navigation.breadcrumps title="Categories">
      <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
      <li class="breadcrumb-item active">Categories</li>
   </x-navigation.breadcrumps>

   @if(session('success'))
      <x-info-message status="success">{{ session('success') }}</x-info-message>
   @elseif (session('error'))
      <x-info-message status="error">{{ session('error') }}</x-info-message>
   @endif
   
   <section class="content">
      <a class="btn btn-primary" href="{{ route('category.create') }}">Create</a>

      <div class="card w-50 mt-3">
         <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Title</th>
                     {{-- <th>Acts</th> --}}
                  </tr>
               </thead>
               <tbody>
                  @foreach ($categories as $category)
                     <tr>
                        <td>{{ $category->id }}</td>
                        <td><a href="{{ route('category.show', $category->id) }}">{{ $category->title }}</a></td>
                        {{-- <td>
                           <a class="text-success" href="{{ route('category.edit', $category->id) }}"><i class="fas fa-pen"></i></a>
                           <a class="text-danger ml-2" href="{{ route('category.delete', $category->id) }}"><i class="fas fa-trash"></i></a>
                           <a class="text-primary ml-2" href="{{ route('category.show', $category->id) }}"><i class="fas fa-eye"></i></a>
                        </td> --}}
                     </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </section>
@endsection