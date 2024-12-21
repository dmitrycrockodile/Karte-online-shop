@extends('layouts.main')

@section('title', 'Create New Product')

@section('content')
   <x-navigation.breadcrumps title="Create product">
      <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
      <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
      <li class="breadcrumb-item active">Create</li>
   </x-navigation.breadcrumps>

   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="form-group">
                  <x-forms.simple-input 
                     name="title" 
                     type="text" 
                     :isRequired="true"
                  />
               </div>

               <div class="form-group">
                  <x-forms.simple-input 
                     name="description" 
                     type="text" 
                     :isRequired="true" 
                  />
               </div>

               <div class="form-group">
                  <x-forms.textarea
                     name="content" 
                     rows="3" 
                     :isRequired="true" 
                  />
               </div>

               <div class="form-group">
                  <x-forms.simple-input 
                     name="price" 
                     type="number" 
                     :isRequired="true" 
                  />
               </div>

               <div class="form-group">
                  <x-forms.simple-input 
                     name="old_price" 
                     placeholder="Enter old price"
                     type="number" 
                  />
               </div>

               <div class="form-group">
                  <x-forms.simple-input 
                     name="count" 
                     type="number" 
                     :isRequired="true" 
                  />
               </div>

               <div class="form-group">
                  <x-forms.select 
                     name="category_id"
                     defaultText="Select a category"
                     :values="$categories"
                     class="categories"
                     :isRequired="true"
                  />
               </div>

               <div class="form-group">
                  <x-forms.select 
                     name="tags[]"
                     defaultText="Select a tag"
                     :values="$tags"
                     :multiple="true"
                     class="tags"
                  />
               </div>

               <div class="form-group">
                  <x-forms.select 
                     name="sizes[]"
                     defaultText="Select a size"
                     :values="$sizes"
                     :multiple="true"
                     class="sizes"
                     :isRequired="true"
                  />
               </div>

               <div class="form-group">
                  <x-forms.select 
                     name="coupons[]"
                     defaultText="Select a coupon"
                     :values="$coupons"
                     :multiple="true"
                     class="coupons"
                  />
               </div>

               <div class="form-group">
                  <x-forms.select 
                     name="colors[]"
                     defaultText="Select a color"
                     :values="$colors"
                     :multiple="true"
                     :isRequired="true"
                     class="colors"
                  />
               </div>

               <div class="form-group">
                  <h4>Upload preview image *</h4>
                  <div class="input-group">
                     <x-forms.image-input
                        name="preview_image"
                        label="Choose file"
                        alt="Preview image"
                        errorName="preview_image"
                     />
                  </div>
               </div>

               <div class="form-group">
                  <h4>Upload product images</h4>
                  <div class="input-group">
                     <x-forms.image-input
                        name="images[]"
                        label="Choose first image"
                        alt="Product image"
                        errorName="images.0"
                     />
                  </div>
                  <div class="input-group">
                     <x-forms.image-input
                        name="images[]"
                        label="Choose second image"
                        alt="Product image"
                        errorName="images.1"
                     />
                  </div>
                  <div class="input-group">
                     <x-forms.image-input
                        name="images[]"
                        label="Choose third image"
                        alt="Product image"
                        errorName="images.2"
                     />
                  </div>
               </div>
               <div class="form-check mb-3 ml-1">
                  <x-forms.checkbox
                     name="is_published" 
                     :isChecked="old('is_published')"
                     placeholder="Published"
                  />
               </div>

               <button type="submit" class="btn btn-primary mb-3">Submit</button>
            </form>
         </div>
      </div>
   </section>
@endsection