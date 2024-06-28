@extends('layouts.main')

@section('content')
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">{{ $category->title }}</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Categories</a></li>
                  <li class="breadcrumb-item active">{{ $category->title }}</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   
   <section class="content">
      <div class="container-fluid">
         <a class="btn btn-primary" href="{{ route('category.edit', $category->id) }}">Edit</a>
         <form action="{{ route('category.delete', $category->id) }}" method="POST" class="d-inline">
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
                     <th>ID</th>
                     <td>{{ $category->id }}</td>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <th>Title</th>
                     <td>{{ $category->title }}</td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      </div>
   </section>
@endsection