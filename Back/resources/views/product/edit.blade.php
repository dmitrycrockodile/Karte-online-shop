@extends('layouts.main')

@section('title', "Edit Product: $product->title")

@section('content')
    <x-navigation.breadcrumps title="Edit: {{ $product->title }}">
        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
        <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Products</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </x-navigation.breadcrumps>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form class="w-50 pb-4" action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <x-forms.simple-input 
                            name="title" 
                            type="text" 
                            :isRequired="true" 
                            :defaultValue="$product->title" 
                        />
                    </div>
                    <div class="form-group">
                        <x-forms.simple-input 
                            name="description" 
                            type="text" 
                            :isRequired="true" 
                            :defaultValue="$product->description" 
                        />
                    </div>
      
                    <div class="form-group">
                        <x-forms.textarea
                            name="content" 
                            rows="3" 
                            :isRequired="true" 
                            :defaultValue="$product->content" 
                        />
                    </div>
      
                    <div class="form-group">
                        <x-forms.simple-input 
                            name="price" 
                            type="number" 
                            :isRequired="true" 
                            :defaultValue="$product->price"
                        />
                    </div>

                    <div class="form-group">
                        <x-forms.simple-input 
                            name="old_price" 
                            type="number" 
                            :defaultValue="$product->old_price" 
                            placeholder="Enter old price"
                        />
                    </div>
      
                    <div class="form-group">
                        <x-forms.simple-input 
                            name="count" 
                            type="number" 
                            :isRequired="true" 
                            :defaultValue="$product->count" 
                        />
                    </div>
      
                    <div class="form-group">
                        <x-forms.select 
                            name="category_id"
                            defaultText="Select a category"
                            :values="$categories"
                            :selectedValue="$product->category_id"
                            class="categories"
                            :isRequired="true"
                        />
                    </div>
      
                    <div class="form-group">
                        <x-forms.select 
                            name="tags[]"
                            defaultText="Select a tag"
                            :values="$tags"
                            :selectedValue="$product->tags"
                            :multiple="true"
                            class="tags"
                        />
                    </div>

                    <div class="form-group">
                        <x-forms.select 
                            name="sizes[]"
                            defaultText="Select a size"
                            :values="$sizes"
                            :selectedValue="$product->sizes"
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
                            :selectedValue="$product->coupons"
                            :multiple="true"
                            class="coupons"
                        />
                    </div>
      
                    <div class="form-group">
                        <x-forms.select 
                            name="colors[]"
                            defaultText="Select a color"
                            :values="$colors"
                            :selectedValue="$product->colors"
                            :multiple="true"
                            class="colors"
                            :isRequired="true"
                        />
                    </div>
      
                    <div class="form-group">
                        <h4>Upload preview image</h4>
                        <x-forms.image-input
                            name="preview_image"
                            :src="$product->previewImageUrl"
                            label="Choose new file"
                            alt="Preview image"
                            :isSet="$product->previewImageUrl ? true : false"
                            errorName="preview_image"
                        />
                    </div>

                    <div>
                        <h4>Upload product images</h4>
                        <div class="form-group">
                            <x-forms.image-input
                                name="images[]"
                                :src="isset($product->images[0]) ? $product->images[0]->imageUrl : false"
                                label="Choose first image"
                                alt="Product Image"
                                isSet="{{isset($product->images[0]) ? true : false}}"
                                errorName="images.0"
                            />
                        </div>
      
                        <div class="form-group">
                            <x-forms.image-input
                                name="images[]"
                                :src="isset($product->images[1]) ? $product->images[1]->imageUrl : false"
                                label="Choose second image"
                                alt="Product Image"
                                isSet="{{isset($product->images[1]) ? true : false}}"
                                errorName="images.1"
                            />
                        </div>
      
                        <div class="form-group">
                            <x-forms.image-input
                                name="images[]"
                                :src="isset($product->images[2]) ? $product->images[2]->imageUrl : false"
                                label="Choose third image"
                                alt="Product Image"
                                isSet="{{isset($product->images[2]) ? true : false}}"
                                errorName="images.2"
                            />
                        </div>
                     </div>

                    <div class="form-check mb-3 ml-1">
                        <x-forms.checkbox
                            name="is_published" 
                            :isChecked="old('is_published') ?? $product->is_published->value"
                            placeholder="Published"
                        />
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection
