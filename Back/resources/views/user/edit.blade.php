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
      
                    <div>
                        <h2 class="mb-2 h5">Full name and sex</h2>
                        <div class="d-flex flex-wrap">
                            <div class="form-group col-md-5 pl-0">
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
         
                            <div class="form-group col-md-5 pl-0">
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
         
                            <div class="form-group col-md-5 pl-0">
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
      
                            <div class="form-group col-md-2 pl-0">
                                <select name="sex" class="form-control">
                                    <option disabled selected>Sex</option>
                                    <option {{ old('sex', $user->sex) == 1 ? ' selected' : ' ' }} value="1">Male</option>
                                    <option {{ old('sex', $user->sex) == 2 ? ' selected' : ' ' }} value="2">Female</option>
                                </select>
                            </div>
                        </div>
                     </div>
      
                     <div>
                        <h2 class="mb-2 h5">Full address</h2>
      
                        <div class="d-flex flex-wrap">
                           <div class="form-group col-md-5 pl-0">
                              <input 
                                 type="text" 
                                 class="form-control" 
                                 name="address" 
                                 placeholder="Address"
                                 value="{{ old('address', $user->address) }}"
                              >
                              @error('address')
                                 <p class="text-danger">{{ $message }}</p>
                              @enderror
                           </div>
         
                           <div class="form-group col-md-5 pl-0">
                              <input 
                                 type="text" 
                                 class="form-control" 
                                 name="postal_code" 
                                 placeholder="Postal code"
                                 value="{{ old('postal_code', $user->postal_code) }}"
                              >
                              @error('postal_code')
                                 <p class="text-danger">{{ $message }}</p>
                              @enderror
                           </div>
         
                           <div class="form-group col-md-5 pl-0">
                              <input 
                                 type="text" 
                                 class="form-control" 
                                 name="city" 
                                 placeholder="City"
                                 value="{{ old('city', $user->city) }}"
                              >
                              @error('city')
                                 <p class="text-danger">{{ $message }}</p>
                              @enderror
                           </div>
         
                           <div class="form-group col-md-5 pl-0">
                              <input 
                                 type="text" 
                                 class="form-control" 
                                 name="country" 
                                 placeholder="Country"
                                 value="{{ old('country', $user->country) }}"
                              >
                              @error('country')
                                 <p class="text-danger">{{ $message }}</p>
                              @enderror
                           </div>
                        </div>
                     </div>
      
                     <div>
                        <h2 class="mb-2 h5">Age and Birth date</h2>
      
                        <div class="d-flex flex-wrap">
                           <div class="form-group col-md-5 pl-0">
                              <input 
                                 type="date" 
                                 class="form-control" 
                                 name="date_of_birth" 
                                 value="{{ old('date_of_birth', $user->date_of_birth) }}"
                              >
                              @error('date_of_birth')
                                 <p class="text-danger">{{ $message }}</p>
                              @enderror
                           </div>
         
                           <div class="form-group col-md-5 pl-0">
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
                        </div>
                     </div>
      
                     <div>
                        <h2 class="mb-2 h5">Phone number</h2>
      
                        <div class="d-flex flex-wrap">
                           <div class="form-group col-md-5 pl-0">
                              <input 
                                 type="text" 
                                 class="form-control" 
                                 name="phone_number" 
                                 placeholder="Phone number"
                                 value="{{ old('phone_number', $user->phone_number) }}"
                              >
                              @error('phone_number')
                                 <p class="text-danger">{{ $message }}</p>
                              @enderror
                           </div>
         
                           <div class="form-group col-md-5 pl-0">
                              <input 
                                 type="text" 
                                 class="form-control" 
                                 name="phone_number_country" 
                                 placeholder="Your phone code (+...)"
                                 value="{{ old('phone_number_country', $user->phone_number_country) }}"
                              >
                              @error('phone_number_country')
                                 <p class="text-danger">{{ $message }}</p>
                              @enderror
                           </div>
                        </div>
                     </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection
