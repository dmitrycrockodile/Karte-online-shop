@extends('layouts.main')

@section('title', 'Create New Coupon')

@section('content')
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
               <div class="col-sm-6">
                  <h1 class="m-0">Create coupon</h1>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
                     <li class="breadcrumb-item"><a href="{{ route('coupon.index') }}">Coupons</a></li>
                     <li class="breadcrumb-item active">Create</li>
                  </ol>
               </div>
         </div>
      </div>
   </div>

   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <form action="{{ route('coupon.store') }}" method="post">
               @csrf
               <div class="form-group">
                  <x-forms.simple-input 
                     name="title" 
                     type="text" 
                     :isRequired="true"
                     placeholder="Enter Coupon title"
                  />
               </div>

               <div class="form-group">
                  <x-forms.simple-input 
                     name="percentage" 
                     type="number" 
                     :isRequired="true"
                     placeholder="Sale percentage"
                  />
               </div>

               <button type="submit" class="btn btn-primary">Submit</button>
            </form>
         </div>
      </div>
   </section>
@endsection
