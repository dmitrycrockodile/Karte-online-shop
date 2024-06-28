@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit: {{ $tag->title }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('tag.index') }}">Tags</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('tag.update', $tag->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" placeholder="New title" value="{{ old('name', $tag->title) }}">

                        @error('title')
                           <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection
