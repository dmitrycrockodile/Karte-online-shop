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
                  <input 
                     type="text" 
                     class="form-control" 
                     name="title" 
                     placeholder="Enter title"
                     value="{{ old('title') }}"
                  >
                  @error('title')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>

               <div class="form-group">
                  <select name="coupons[]" class="coupons" multiple="multiple" data-placeholder="Select a coupon" style="width: 100%;">
                    @foreach ($coupons as $coupon)
                     <option 
                        value="{{ $coupon->id }}"
                        {{ old('coupons') && in_array($coupon->id, old('coupons')) ? ' selected' : '' }}
                     >{{ $coupon->code }}</option>
                    @endforeach
                  </select>

                  @error('coupons')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>

               <div class="form-group">
                  <p>Upload preview image</p>
                  <div class="input-group">
                     <div class="custom-file">
                        <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile" value="{{ old('preview_image') }}">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                     </div>
                  </div>

                  @error('preview_image')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>

               <div class="form-group">
                  <p>Upload banner image</p>
                  <div class="input-group">
                     <div class="custom-file">
                        <input name="banner" type="file" class="custom-file-input" id="exampleInputFile" value="{{ old('banner') }}">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                     </div>
                  </div>

                  @error('banner')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>

               <button type="submit" class="btn btn-primary">Submit</button>
            </form>
         </div>
      </div>
   </section>
@endsection