@extends('layouts.main')

@section('title', "Category: $category->title")

@section('content')
   <x-navigation.breadcrumps :title="$category->title">
      <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
      <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Categories</a></li>
      <li class="breadcrumb-item active">{{ $category->title }}</li>
   </x-navigation.breadcrumps>
   
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
                  @if (count($category->coupons))
                  <tr>
                     <th>Coupons</th>
                     @foreach ($category->coupons as $coupon)
                        <td>
                           {{ $coupon->title }}
                        </td>
                     @endforeach
                  </tr>
                  @endif
                  <tr>
                     <th>Preview image</th>
                     <td>
                        @if ($category->preview_image)
                        <img class="w-75" src="{{ $category->previewImageUrl }}" alt="{{ $category->title }} preview">
                        @endif
                     </td>
                  </tr>
                  <tr>
                     <th>Banner image</th>
                     <td>
                        @if ($category->banner)
                        <img class="w-100" src="{{ $category->bannerUrl }}" alt="{{ $category->title }} banner">
                        @endif
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      </div>
   </section>
@endsection