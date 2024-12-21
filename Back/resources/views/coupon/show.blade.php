@extends('layouts.main')

@section('title', "Coupon: $coupon->title")

@section('content')
   <x-navigation.breadcrumps :title="$coupon->title">
      <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
      <li class="breadcrumb-item"><a href="{{ route('coupon.index') }}">Coupons</a></li>
      <li class="breadcrumb-item active">{{ $coupon->title }}</li>
   </x-navigation.breadcrumps>
   
   <section class="content">
      <div class="container-fluid">
         <a class="btn btn-primary" href="{{ route('coupon.edit', $coupon->id) }}">Edit</a>
         <form action="{{ route('coupon.delete', $coupon->id) }}" method="POST" class="d-inline">
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
                     <td>{{ $coupon->id }}</td>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <th>Title</th>
                     <td>{{ $coupon->title }}</td>
                  </tr>
                  <tr>
                     <th>Percentage</th>
                     <td>{{ $coupon->percentage }}</td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      </div>
   </section>
@endsection