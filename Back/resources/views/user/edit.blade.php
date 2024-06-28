@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit: {{ $user->name }}</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Users</a></li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="d-flex">
                        <div class="form-group">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="name" 
                                placeholder="Your name"
                                value="{{ old('name', $user->name) }}"
                            >
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group ml-2">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="surname" 
                                placeholder="Your surname"
                                value="{{ old('surname', $user->surname) }}"
                            >
                            @error('surname')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group ml-2">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="patronymic" 
                                placeholder="Your patronymic"
                                value="{{ old('patronymic', $user->patronymic) }}"
                            >
                            @error('patronymic')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex">
                        <div class="form-group">
                            <input 
                                type="number" 
                                class="form-control" 
                                name="age" 
                                placeholder="Your age"
                                value="{{ old('age', $user->age) }}"
                            >
                            @error('age')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group ml-2">
                            <input 
                                type="text" 
                                class="form-control" 
                                name="address" 
                                placeholder="Your address"
                                value="{{ old('address', $user->address) }}"
                            >
                            @error('address')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group ml-2">
                            <select name="sex" class="form-control">
                                <option disabled selected>Sex</option>
                                <option {{ old('sex', $user->sex) == 2 ? ' selected' : '' }} value="2">Female</option>
                                <option {{ old('sex', $user->sex) == 1 ? ' selected' : '' }} value="1">Male</option>
                            </select>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection
