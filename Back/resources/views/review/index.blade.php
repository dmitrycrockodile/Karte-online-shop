@extends('layouts.main')

@section('title', 'Reviews')

@section('content')
   <x-navigation.breadcrumps title="Reviews">
      <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
      <li class="breadcrumb-item active">Reviews</li>
   </x-navigation.breadcrumps>

   <section class="content">
      @if (count($reviews) !== 0)
         <div class="card">
            <div class="card-body">
               <ul class="todo-list ui-sortable" data-widget="todo-list">
                  @foreach ($reviews as $review)
                     <li class="{{ $review->deleted->value ? 'done' : '' }}">
                        <span class="text">{{ $review->title }}</span>
                        <span class="text">on</span>
                        <a href="{{ route('product.show', $review->product->id) }}" class="text">{{ $review->product->title }}</a>
                        @if ($review->reported->value)    
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
