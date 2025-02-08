@extends('layouts.main')

@section('title', 'Products')

@section('content')
   <x-navigation.breadcrumps title="Products">
      <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
      <li class="breadcrumb-item active">Products</li>
   </x-navigation.breadcrumps>

   @if(session('success'))
      <x-info-message status="success">{{ session('success') }}</x-info-message>
   @elseif (session('error'))
      <x-info-message status="error">{{ session('error') }}</x-info-message>
   @endif
   
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