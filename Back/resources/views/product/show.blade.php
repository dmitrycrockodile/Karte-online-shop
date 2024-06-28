@extends('layouts.main')

@section('content')
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">{{ $product->title }}</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
                  <li class="breadcrumb-item active">{{ $product->title }}</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   
   <section class="content">
      <div class="container-fluid">
         <a class="btn btn-primary" href="{{ route('product.edit', $product->id) }}">Edit</a>
         <form action="{{ route('product.delete', $product->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
               Delete
            </button>
         </form>
         <div class="card w-50 mt-3">
         <div class="card-body table-responsive p-0">
            <table class="table table-hover">
               <thead>
                  <tr>
                     <th>ID</th>
                     <td>{{ $product->id }}</td>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <th>Title</th>
                     <td>{{ $product->title }}</td>
                  </tr>
                  <tr>
                     <th>Description</th>
                     <td>{{ $product->description }}</td>
                  </tr>
                  <tr>
                     <th>Content</th>
                     <td>{{ $product->content }}</td>
                  </tr>
                  <tr>
                     <th>Preview image</th>
                     <td><img style="height: 350px;" src="{{ $product->previewImageUrl }}" alt="{{ $product->title }} preview"></td>
                  </tr>
                  @foreach ($product->images as $key => $image)
                  <tr>
                     <th>Image №{{++$key}}</th>
                     <td><img style="height: 350px;" src="{{ $image->imageUrl }}" alt="{{ $product->title }}"></td>
                  </tr>
                  @endforeach
                  <tr>
                     <th>Price</th>
                     <td>{{ $product->price }}</td>
                  </tr>
                  @if ($product->old_price)
                     <tr>
                        <th>Old price</th>
                        <td>{{ $product->old_price }}</td>
                     </tr>
                  @endif
                  <tr>
                     <th>Count</th>
                     <td>{{ $product->count }}</td>
                  </tr>
                  <tr>
                     <th>Published</th>
                     <td>{{ $product->is_published }}</td>
                  </tr>
                  <tr>
                     <th>Category</th>
                     <td>{{ $product->category->title }}</td>
                  </tr>
                  <tr>
                     <th>Colors</th>
                     <td>
                        @foreach ($product->colors as $color)
                           <span class="mr-3">{{ $color->title }}</span>
                        @endforeach
                     </td>
                  </tr>
                  <tr>
                     <th>Tags</th>
                     <td>
                        @foreach ($product->tags as $tag)
                           <span class="mr-3">{{ $tag->title }}</span>
                        @endforeach
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      </div>
   </section>
@endsection