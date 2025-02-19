@extends('layouts.main')

@section('title', "Product: $product->title")

@section('content')
   <x-navigation.breadcrumps :title="$product->title">
      <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
      <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
      <li class="breadcrumb-item active">{{ $product->title }}</li>
   </x-navigation.breadcrumps>

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
         <form action="{{ route('product.publish', $product->id) }}" method="POST" class="d-inline">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-{{$product->is_published->value ? 'warning' : 'info'}}">
               {{ $product->is_published->value ? 'Archive' : 'Publish' }}
            </button>
         </form>
         <div class="card w-50 mt-3">
         <div class="card-body table-responsive p-0">
            <table class="table table-hover">
               <thead>
                  <tr>
                     <th class="border-0">ID</th>
                     <td class="border-left">{{ $product->id }}</td>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <th>Title</th>
                     <td class="border-left">{{ $product->title }}</td>
                  </tr>
                  <tr>
                     <th>Description</th>
                     <td class="border-left">{{ $product->description }}</td>
                  </tr>
                  <tr>
                     <th>Content</th>
                     <td class="border-left">{{ $product->content }}</td>
                  </tr>
                  <tr>
                     <th>Preview image</th>
                     <td class="border-left"><img style="height: 350px;" src="{{ $product->previewImageUrl }}" alt="{{ $product->title }} preview"></td>
                  </tr>
                  @foreach ($product->images as $key => $image)
                  <tr>
                     <th>Image №{{++$key}}</th>
                     <td class="border-left"><img style="height: 350px;" src="{{ $image->imageUrl }}" alt="{{ $product->title }}"></td>
                  </tr>
                  @endforeach
                  <tr>
                     <th>Price</th>
                     <td class="border-left">{{ $product->price }}</td>
                  </tr>
                  @if ($product->old_price)
                     <tr>
                        <th>Old price</th>
                        <td class="border-left">{{ $product->old_price }}</td>
                     </tr>
                  @endif
                  <tr>
                     <th>Count</th>
                     <td class="border-left">{{ $product->count }}</td>
                  </tr>
                  <tr>
                     <th>Status</th>
                     <td class="border-left">{{ $product->is_published->text() }}</td>
                  </tr>
                  <tr>
                     <th>Category</th>
                     <td class="border-left">{{ $product->category->title }}</td>
                  </tr>
                  <tr>
                     <th>Colors</th>
                     <td class="border-left">
                        @foreach ($product->colors as $color)
                           <span class="mr-3">{{ $color->title }}</span>
                        @endforeach
                     </td>
                  </tr>
                  <tr>
                     <th>Tags</th>
                     <td class="border-left">
                        @foreach ($product->tags as $tag)
                           <span class="mr-3">{{ $tag->title }}</span>
                        @endforeach
                     </td>
                  </tr>
                  <tr>
                     <th>Sizes</th>
                     <td class="border-left">
                        @foreach ($product->sizes as $size)
                           <span class="mr-3">{{ $size->title }}</span>
                        @endforeach
                     </td>
                  </tr>
                  <tr>
                     <th>Coupons</th>
                     <td class="border-left">
                        @foreach ($product->coupons as $coupon)
                           <span class="mr-3">{{ $coupon->title }}</span>
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