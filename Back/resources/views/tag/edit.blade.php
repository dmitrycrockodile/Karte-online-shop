@extends('layouts.main')

@section('title', "Edit Tag: $tag->title")

@section('content')
    <x-navigation.breadcrumps title="Edit: {{ $tag->title }}">
        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
        <li class="breadcrumb-item"><a href="{{ route('tag.index') }}">Tags</a></li>
        <li class="breadcrumb-item active">Edit</li>
    </x-navigation.breadcrumps>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('tag.update', $tag->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <x-forms.simple-input 
                            name="title" 
                            type="text" 
                            :isRequired="true"
                            :defaultValue="$tag->title"
                            placeholder="Enter title"
                        />
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection
