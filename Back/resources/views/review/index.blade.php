@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Reviews</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
                        <li class="breadcrumb-item active">Reviews</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
      @if (count($reviews) !== 0)
         <div class="card">
            <div class="card-body">
               <ul class="todo-list ui-sortable" data-widget="todo-list">
                     @foreach ($reviews as $review)
                        <li class="{{ $review->deleted ? 'done' : '' }}">
                           <span class="text">{{ $review->title }}</span>
                           <span class="text">on</span>
                           <a href="{{ route('product.show', $review->product->id) }}" class="text">{{ $review->product->title }}</a>
                           @if ($review->reported)    
                              <small class="badge badge-warning">
                                 <i class="far fa-clock"></i>
                                 Reported
                              </small>
                           @endif
                           <small class="badge badge-primary">
                              <i class="far fa-clock"></i>
                              {{ $review->daysOld ? "$review->daysOld days" : ' Today'  }}
                           </small>
                           <div class="tools">
                              <a class="text-primary ml-2" href="{{ route('review.show', $review->id) }}">
                                 <i class="fas fa-eye"></i>
                              </a>
                           </div>
                        </li>
                     @endforeach
               </ul>
            </div>
         </div>
      @else
         <p>There is no reviews from users for now...</p>
      @endif       
   </section>
@endsection
