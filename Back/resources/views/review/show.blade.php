@extends('layouts.main')

@section('content')
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">"{{ $review->title }}"</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('review.index') }}">Reviews</a></li>
                  <li class="breadcrumb-item active">{{ $review->id }}</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   
   <section class="content">
      <div class="container-fluid">
         <a class="btn btn-primary" href="{{ route('review.index')}}">Go Back</a>
         <div class="card w-50 mt-3">
            <div class="card-body table-responsive p-0">
               <table class="table table-hover">
                     <tr>
                        <th>ID</th>
                        <td>{{ $review->id }}</td>
                     </tr>
                     <tr>
                        <th>Review title</th>
                        <td>{{ $review->title }}</td>
                     </tr>
                     <tr>
                        <th>Review body</th>
                        <td>{{ $review->body ? $review->body : 'Not provided' }}</td>
                     </tr>
                     <tr>
                        <th>Helpful count</th>
                        <td>+{{ $review->helpfulCount }}</td>
                     </tr>
                     <tr>
                        <th>Not helpful count</th>
                        <td>-{{ $review->notHelpfulCount }}</td>
                     </tr>
                     <tr>
                        <th>Reported</th>
                        <td>{{ $review->reported ? 'Yes' : 'No' }}</td>
                     </tr>
                     <tr>
                        <th>User name</th>
                        <td>{{ $review->user->name . $review->user->surname }}</td>
                     </tr>
                     <tr>
                        <th>User email</th>
                        <td>{{ $review->user->email }}</td>
                     </tr>
                     <tr>
                        <th>User phone number</th>
                        <td>{{ $review->user->phone_number ?: 'Not provided' }}</td>
                     </tr>
                     <tr>
                        <th>Product</th>
                        <td>
                           <a href="{{ route('product.show', $review->product->id) }}">
                              {{ $review->product->title }}
                           </a>
                        </td>
                     </tr>
               </table>
            </div>
         </div>
         @if (!$review->deleted)    
         <form action="{{ route('review.delete', $review->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger mb-3">
               Delete
            </button>
         </form>
         @else
         <form action="{{ route('review.restore', $review->id) }}" method="POST" class="d-inline">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-primary mb-3">
               Restore
            </button>
         </form>
         @endif
         @if ($review->reported)
         <form action="{{ route('review.resolve', $review->id) }}" method="POST" class="d-inline">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-success mb-3 ml-2">
               Resolved!
            </button>
         </form>
         @endif
      </div>
   </section>
@endsection