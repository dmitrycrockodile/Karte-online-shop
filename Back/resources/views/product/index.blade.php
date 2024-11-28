@extends('layouts.main')

@section('content')
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Products</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
                  <li class="breadcrumb-item active">Products</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   
   <section class="content">
      <a class="btn btn-primary" href="{{ route('product.create') }}">Create</a>

      <div class="card w-50 mt-3">
         <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Title</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($products as $product)
                     <tr>
                        <td>{{ $product->id }}</td>
                        <td><a href="{{ route('product.show', $product->id) }}">{{ $product->title }}</a></td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </section>
@endsection