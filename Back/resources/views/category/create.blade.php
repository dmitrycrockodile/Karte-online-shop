@extends('layouts.main')

@section('title', 'Create New Category')

@section('content')
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
               <div class="col-sm-6">
                  <h1 class="m-0">Create category</h1>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
                     <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Categories</a></li>
                     <li class="breadcrumb-item active">Create</li>
                  </ol>
               </div>
         </div>
      </div>
   </div>

   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="form-group">
                  <x-forms.simple-input 
                     name="title" 
                     type="text" 
                     :isRequired="true"
                     placeholder="Enter title"
                  />
               </div>

               <div class="form-group">
                  <x-forms.select 
                     name="coupons[]"
                     multiple="multiple"
                     defaultText="Select a coupon"
                     :values="$coupons"
                     class="coupons"
                  />
               </div>

               <div class="form-group">
                  <p>Upload preview image</p>
                  <x-forms.image-input
                     name="preview_image"
                     label="Choose file"
                     alt="Preview image"
                     errorName="preview_image"
                  />
               </div>

               <div class="form-group">
                  <p>Upload banner image</p>
                  <x-forms.image-input
                     name="banner"
                     label="Choose file"
                     alt="Banner image"
                     errorName="banner"
                  />
               </div>

               <button type="submit" class="btn btn-primary">Submit</button>
            </form>
         </div>
      </div>
   </section>
@endsection