@extends('layouts.main')

@section('title', "Edit Product: $product->title")

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit: {{ $product->title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form class="w-50" action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input 
                           type="text" 
                           class="form-control" 
                           name="title" 
                           placeholder="Enter title"
                           value="{{ $errors->any() ? old('title') : $product->title }}"
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
                           placeholder="Enter description"
                           value="{{ $errors->any() ? old('description') : $product->description }}"
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
                           placeholder="Enter content"
                        >{{ $errors->any() ? old('content') : $product->content }}</textarea>
                        @error('content')
                           <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
      
                    <div class="form-group">
                        <input 
                           type="number" 
                           class="form-control" 
                           name="price" 
                           placeholder="Enter price"
                           value="{{ $errors->any() ? old('price') : $product->price }}"
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
                           value="{{ $errors->any() ? old('old_price') : $product->old_price }}"
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
                           placeholder="Enter count"
                           value="{{ $errors->any() ? old('count') : $product->count }}"
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
                                    {{ $category->id == ($errors->any() ? old('category_id') : $product->category_id) ? ' selected' : '' }}
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
                                {{ is_array($product->tags->pluck('id')->toArray()) && in_array($tag->id, $product->tags->pluck('id')->toArray()) ? ' selected' : '' }}  
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
                                {{ is_array($product->sizes->pluck('id')->toArray()) && in_array($size->id, $product->sizes->pluck('id')->toArray()) ? ' selected' : '' }}  
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
                                {{ is_array($product->coupons->pluck('id')->toArray()) && in_array($coupon->id, $product->coupons->pluck('id')->toArray()) ? ' selected' : '' }}  
                            >{{ $coupon->code }}</option>
                          @endforeach
                        </select>
      
                        @error('coupons')
                           <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
      
                    <div class="form-group">
                        <select name="colors[]" class="colors" multiple="multiple" data-placeholder="Select a color" style="width: 100%;">
                            @foreach ($colors as $color)
                                <option 
                                    value="{{ $color->id }}"
                                    {{ is_array($product->colors->pluck('id')->toArray()) && in_array($color->id, $product->colors->pluck('id')->toArray()) ? ' selected' : '' }}  
                                >{{$color->title}}</option>
                            @endforeach
                        </select>
      
                        @error('colors')
                           <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
      
                    <div class="form-group">
                        <h4>Upload preview image</h4>
                        <div class="input-group d-flex flex-column">
                            <div class="custom-file w-100">
                                <label class="custom-file-label" for="exampleInputFile">Choose new file</label>
                                <input name="preview_image" type="file" class="custom-file-input" id="exampleInputFile"">
                            </div>

                            <div class="w-50 mt-2">
                                <img src="{{ $product->previewImageUrl }}" alt="Preview image" class="w-50" />
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

                           @if (isset($product->images[0]))
                            <div class="w-50 mt-2">
                                <img src="{{ $product->images[0]->imageUrl }}" alt="Preview image" class="w-50" />
                            </div>
                           @endif
         
                           @error('images[]')
                              <p class="text-danger">{{ $message }}</p>
                           @enderror
                        </div>
      
                        <div class="form-group">
                           <div class="input-group">
                              <div class="custom-file">
                                 <input name="images[]" type="file" class="custom-file-input" id="exampleInputFile">
                                 <label class="custom-file-label" for="exampleInputFile">Choose second image</label>
                              </div>
                           </div>

                           @if (isset($product->images[1]))
                            <div class="w-50 mt-2">
                                <img src="{{ $product->images[1]->imageUrl }}" alt="Preview image" class="w-50" />
                            </div>
                           @endif

         
                           @error('images[]')
                              <p class="text-danger">{{ $message }}</p>
                           @enderror
                        </div>
      
                        <div class="form-group">
                           <div class="input-group">
                              <div class="custom-file">
                                 <input name="images[]" type="file" class="custom-file-input" id="exampleInputFile">
                                 <label class="custom-file-label" for="exampleInputFile">Choose third image</label>
                              </div>
                           </div>

                           @if (isset($product->images[2]))
                            <div class="w-50 mt-2">
                                <img src="{{ $product->images[2]->imageUrl }}" alt="Preview image" class="w-50" />
                            </div>
                           @endif
         
                           @error('images[]')
                              <p class="text-danger">{{ $message }}</p>
                           @enderror
                        </div>
                     </div>

                    <div class="form-check mb-3 ml-1">
                        <label class="form-check-label">
                            <input 
                                name="is_published" 
                                type="checkbox" 
                                class="form-check-input" 
                                value="1"
                                {{ (old('is_published') ?? $product->is_published) ? ' checked' : '' }}    
                            >
                           Published
                        </label>
      
                        @error('is_published')
                           <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection
