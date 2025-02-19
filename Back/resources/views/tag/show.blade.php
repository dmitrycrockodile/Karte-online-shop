@extends('layouts.main')

@section('title', "Tag: $tag->title")

@section('content')
   <x-navigation.breadcrumps :title="$tag->title">
      <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
      <li class="breadcrumb-item"><a href="{{ route('tag.index') }}">Tags</a></li>
      <li class="breadcrumb-item active">{{ $tag->title }}</li>
   </x-navigation.breadcrumps>
   
   <section class="content">
      <div class="container-fluid">
         <a class="btn btn-primary" href="{{ route('tag.edit', $tag->id) }}">Edit</a>
         <form action="{{ route('tag.delete', $tag->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
               Delete
            </button>
         </form>
         <div class="card w-50 mt-3">
         <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
               <thead>
                  <tr>
                     <th class="border-0 w-25">ID</th>
                     <td class="border-left">{{ $tag->id }}</td>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <th class="w-25">Title</th>
                     <td class="border-left">{{ $tag->title }}</td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      </div>
   </section>
@endsection