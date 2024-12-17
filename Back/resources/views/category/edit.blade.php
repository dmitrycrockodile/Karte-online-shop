@extends('layouts.main')

@section('title', "Edit Category: $category->title")

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit: {{ $category->title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Categories</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="New title" value="{{ $errors->any() ? old('title') : $category->title }}">

                        @error('title')
                           <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <select name="coupons[]" class="coupons" multiple="multiple" data-placeholder="Select a coupon" style="width: 100%;">
                          @foreach ($coupons as $coupon)
                            <option
                                value="{{ $coupon->id }}"
                                {{ is_array($category->coupons->pluck('id')->toArray()) && in_array($coupon->id, $category->coupons->pluck('id')->toArray()) ? ' selected' : '' }}  
                            >{{ $coupon->code }}</option>
                          @endforeach
                        </select>
      
                        @error('coupons')
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
                                <img src="{{ $category->previewImageUrl }}" alt="Preview image" class="w-50" />
                            </div>
                        </div>
      
                        @error('preview_image')
                           <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <h4>Upload banner image</h4>
                        <div class="input-group d-flex flex-column">
                            <div class="custom-file w-100">
                                <label class="custom-file-label" for="exampleInputFile">Choose new file</label>
                                <input name="banner" type="file" class="custom-file-input" id="exampleInputFile"">
                            </div>

                            @if ($category->bannerUrl)
                                <div class="w-50 mt-2">
                                    <img src="{{ $category->bannerUrl }}" alt="Banner image" class="w-50" />
                                </div>
                            @endif
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
