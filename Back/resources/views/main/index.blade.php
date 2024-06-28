@extends('layouts.main')

@section('content')
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">Main page</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  {{-- <li class="breadcrumb-item"><a href="#">Main page</a></li> --}}
                  <li class="breadcrumb-item active">Main page</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   
   <section class="content">
      <div class="container-fluid">
      <div class="row">
         <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
               <div class="inner">
                  <h3>150</h3>

                  <p>Orders</p>
               </div>
               <div class="icon">
                  <i class="fas fa-shopping-bag"></i>
               </div>
               <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div>
         
         <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
            <div class="inner">
               <h3>{{ $productsCount }}</h3>

               <p>Products</p>
            </div>
            <div class="icon">
               <i class="fas fa-truck-loading"></i>
            </div>
            <a href="{{ route('product.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div>

         <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
            <div class="inner">
               <h3>{{ $usersCount }}</h3>

               <p>Users</p>
            </div>
            <div class="icon">
               <i class="fas fa-user-tie"></i>
            </div>
            <a href="{{ route('user.index') }}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div>

         <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
            <div class="inner">
               <h3>65</h3>

               <p>Reviews</p>
            </div>
            <div class="icon">
               <i class="fas fa-comment-alt"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
         </div>
      </div>
   </section>
@endsection