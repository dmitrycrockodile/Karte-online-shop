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
                        <x-forms.simple-input 
                            name="title" 
                            type="text" 
                            :isRequired="true"
                            placeholder="New title"
                            :defaultValue="$category->title"
                        />
                    </div>

                    <div class="form-group">
                        <x-forms.select 
                            name="coupons[]"
                            class="coupons"
                            multiple="multiple"
                            defaultText="Select a coupon"
                            :values="$coupons"
                            :selectedValue="$category->coupons"
                        />
                    </div>

                    <div class="form-group">
                        <h4>Upload preview image</h4>
                        <x-forms.image-input
                            name="preview_image"
                            label="Choose new file"
                            alt="Preview image"
                            errorName="preview_image"
                            :src="$category->previewImageUrl"
                            :isSet="$category->previewImageUrl ? true : false"
                        />
                    </div>

                    <div class="form-group">
                        <h4>Upload banner image</h4>
                        <x-forms.image-input
                            name="banner"
                            label="Choose new file"
                            alt="Banner image"
                            errorName="banner"
                            :src="$category->bannerUrl"
                            :isSet="$category->bannerUrl ? true : false"
                        />
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection
