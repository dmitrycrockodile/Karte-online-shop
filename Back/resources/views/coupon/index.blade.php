@extends('layouts.main')

@section('content')
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Coupons</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
                  <li class="breadcrumb-item active">Coupons</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   
   <section class="content">
      <a class="btn btn-primary" href="{{ route('coupon.create') }}">Create</a>

      <div class="card w-50 mt-3">
         <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Code</th>
                     {{-- <th>Acts</th> --}}
                  </tr>
               </thead>
               <tbody>
                  @foreach ($coupons as $coupon)
                     <tr>
                        <td>{{ $coupon->id }}</td>
                        <td><a href="{{ route('coupon.show', $coupon->id) }}">{{ $coupon->code }}</a></td>
                        {{-- <td>
                           <a class="text-success" href="{{ route('coupon.edit', $coupon->id) }}"><i class="fas fa-pen"></i></a>
                           <a class="text-danger ml-2" href="{{ route('coupon.delete', $coupon->id) }}"><i class="fas fa-trash"></i></a>
                           <a class="text-primary ml-2" href="{{ route('coupon.show', $coupon->id) }}"><i class="fas fa-eye"></i></a>
                        </td> --}}
                     </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </section>
@endsection