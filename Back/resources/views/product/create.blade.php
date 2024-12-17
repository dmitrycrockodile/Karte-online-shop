@extends('layouts.main')

@section('title', 'Create New Product')

@section('content')
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
               <div class="col-sm-6">
                  <h1 class="m-0">Create product</h1>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
                     <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
                     <li class="breadcrumb-item active">Create</li>
                  </ol>
               </div>
         </div>
      </div>
   </div>

   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <div class="form-group">
                  <input 
                     type="text" 
                     class="form-control" 
                     name="title" 
                     placeholder="Enter title *"
                     value="{{ old('title') }}"
                  >
                  @error('title')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>

               <div class="form-group">
                  <input 
                     type="text" 
                     class="form-control" 
                     name="description" 
                     placeholder="Enter description *"
                     value="{{ old('description') }}"
                  >
                  @error('description')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>

               <div class="form-group">
                  <textarea 
                     class="form-control" 
                     rows="3" 
                     name="content" 
                     placeholder="Enter content *"
                  >{{ old('content') }}</textarea>
                  @error('content')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>

               <div class="form-group">
                  <input 
                     type="number" 
                     class="form-control" 
                     name="price" 
                     placeholder="Enter price *"
                     value="{{ old('price') }}"
                  >
                  @error('price')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>

               <div class="form-group">
                  <input 
                     type="number" 
                     class="form-control" 
                     name="old_price" 
                     placeholder="Enter old price"
                     value="{{ old('old_price') }}"
                  >
                  @error('price')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>

               <div class="form-group">
                  <input 
                     type="number" 
                     class="form-control" 
                     name="count" 
                     placeholder="Enter count *"
                     value="{{ old('count') }}"
                  >
                  @error('count')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>

               <div class="form-group">
                  <select name="category_id" class="form-control select2" style="width: 100%;">
                     <option selected="selected" disabled>Select a category</option>
                     @foreach ($categories as $category)
                        <option 
                           value="{{ $category->id }}"
                           {{ $category->id == old('category_id') ? ' selected' : '' }}
                        >{{ $category->title }}</option>
                     @endforeach
                  </select>

                  @error('category_id')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>

               <div class="form-group">
                  <select name="tags[]" class="tags" multiple="multiple" data-placeholder="Select a tag" style="width: 100%;">
                    @foreach ($tags as $tag)
                     <option 
                        value="{{ $tag->id }}"
                        {{ old('tags') && in_array($tag->id, old('tags')) ? ' selected' : '' }}
                     >{{ $tag->title }}</option>
                    @endforeach
                  </select>

                  @error('tags')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>

               <div class="form-group">
                  <select name="sizes[]" class="sizes" multiple="multiple" data-placeholder="Select a size" style="width: 100%;">
                    @foreach ($sizes as $size)
                     <option 
                        value="{{ $size->id }}"
                        {{ old('sizes') && in_array($size->id, old('sizes')) ? ' selected' : '' }}
                     >{{ $size->title }}</option>
                    @endforeach
                  </select>

                  @error('sizes')
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
                  <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Select a color*" style="width: 100%;">
                     @foreach ($colors as $color)
                        <option 
                           value="{{ $color->id }}"
                           {{ old('colors') && in_array($color->id, old('colors')) ? ' selected' : '' }}
                        >{{$color->title}}</option>
                     @endforeach
                  </select>

                  @error('colors')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>

               <div class="form-group">
                  <h4>Upload preview image *</h4>
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

               <div>
                  <h4>Upload product images</h4>
                  <div class="form-group">
                     <div class="input-group">
                        <div class="custom-file">
                           <input name="images[]" type="file" class="custom-file-input" id="exampleInputFile">
                           <label class="custom-file-label" for="exampleInputFile">Choose first image</label>
                        </div>
                     </div>
                  </div>

                  <div class="form-group">
                     <div class="input-group">
                        <div class="custom-file">
                           <input name="images[]" type="file" class="custom-file-input" id="exampleInputFile">
                           <label class="custom-file-label" for="exampleInputFile">Choose second image</label>
                        </div>
                     </div>
                  </div>

                  <div class="form-group">
                     <div class="input-group">
                        <div class="custom-file">
                           <input name="images[]" type="file" class="custom-file-input" id="exampleInputFile">
                           <label class="custom-file-label" for="exampleInputFile">Choose third image</label>
                        </div>
                     </div>
                  </div>

                  @error('images')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>

               <div class="form-check mb-3 ml-1">
                  <label class="form-check-label">
                     <input name="is_published" type="checkbox" class="form-check-input" value="1">
                     Published
                  </label>

                  @error('is_published')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>

               <button type="submit" class="btn btn-primary mb-3">Submit</button>
            </form>
         </div>
      </div>
   </section>
@endsection