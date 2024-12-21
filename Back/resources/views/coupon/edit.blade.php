@extends('layouts.main')

@section('title', "Edit Coupon: $coupon->title")

@section('content')
    <x-navigation.breadcrumps title="Edit: {{ $coupon->title }}">
        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
        <li class="breadcrumb-item"><a href="{{ route('coupon.index') }}">Coupons</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </x-navigation.breadcrumps>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('coupon.update', $coupon->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <x-forms.simple-input 
                            name="title" 
                            type="text" 
                            :isRequired="true"
                            :defaultValue="$coupon->title"
                            placeholder="Enter title"
                        />
                    </div>

                    <div class="form-group">
                        <x-forms.simple-input 
                            name="percentage" 
                            type="number" 
                            :isRequired="true"
                            :defaultValue="$coupon->percentage"
                            placeholder="New percentage"
                        />
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection
