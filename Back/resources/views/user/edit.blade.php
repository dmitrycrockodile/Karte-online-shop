@extends('layouts.main')

@section('title', "Edit User: $user->name")

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
                              <x-forms.simple-input 
                                 name="name" 
                                 type="text" 
                                 :isRequired="true"
                                 placeholder="Your name"
                                 :defaultValue="$user->name"
                              />
                            </div>
         
                            <div class="form-group col-md-5 pl-0">
                              <x-forms.simple-input 
                                 name="surname" 
                                 type="text" 
                                 placeholder="Your surname"
                                 :defaultValue="$user->surname"
                              />
                            </div>
         
                            <div class="form-group col-md-5 pl-0">
                              <x-forms.simple-input 
                                 name="patronymic" 
                                 type="text" 
                                 placeholder="Your patronymic"
                                 :defaultValue="$user->patronymic"
                              />
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
                              <x-forms.simple-input 
                                 name="address" 
                                 type="text" 
                                 placeholder="Address"
                                 :defaultValue="$user->address"
                              />
                           </div>
         
                           <div class="form-group col-md-5 pl-0">
                              <x-forms.simple-input 
                                 name="postal_code" 
                                 type="text" 
                                 placeholder="Postal code"
                                 :defaultValue="$user->postal_code"
                              />
                           </div>
         
                           <div class="form-group col-md-5 pl-0">
                              <x-forms.simple-input 
                                 name="city" 
                                 type="text" 
                                 placeholder="City"
                                 :defaultValue="$user->city"
                              />
                           </div>
         
                           <div class="form-group col-md-5 pl-0">
                              <x-forms.simple-input 
                                 name="country" 
                                 type="text" 
                                 placeholder="Country"
                                 :defaultValue="$user->country"
                              />
                           </div>
                        </div>
                     </div>
      
                     <div>
                        <h2 class="mb-2 h5">Age and Birth date</h2>
      
                        <div class="d-flex flex-wrap">
                           <div class="form-group col-md-5 pl-0">
                              <x-forms.simple-input 
                                 name="date_of_birth" 
                                 type="date" 
                                 :defaultValue="$user->date_of_birth"
                              />
                           </div>
         
                           <div class="form-group col-md-5 pl-0">
                              <x-forms.simple-input 
                                 name="age" 
                                 type="number" 
                                 placeholder="Your age"
                                 :defaultValue="$user->age"
                              />
                           </div>
                        </div>
                     </div>
      
                     <div>
                        <h2 class="mb-2 h5">Phone number</h2>
      
                        <div class="d-flex flex-wrap">
                           <div class="form-group col-md-5 pl-0">
                              <x-forms.simple-input 
                                 name="phone_number" 
                                 type="number" 
                                 placeholder="Phone number"
                                 :defaultValue="$user->phone_number"
                              />
                           </div>
                        </div>
                     </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </section>
@endsection
