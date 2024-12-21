@extends('layouts.main')

@section('title', "Edit Size: $size->title")

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit: {{ $size->title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('size.index') }}">Sizes</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('size.update', $size->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <x-forms.simple-input 
                            name="title" 
                            type="text" 
                            :isRequired="true"
                            :defaultValue="$size->title"
                            placeholder="Enter title"
                        />
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection
