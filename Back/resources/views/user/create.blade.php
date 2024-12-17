@extends('layouts.main')

@section('title', 'Create New User')

@section('content')
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
               <div class="col-sm-6">
                  <h1 class="m-0">Create user</h1>
               </div>
               <div class="col-sm-6">
                  <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
                     <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Users</a></li>
                     <li class="breadcrumb-item active">Create</li>
                  </ol>
               </div>
         </div>
      </div>
   </div>

   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <form action="{{ route('user.store') }}" method="post">
               @csrf

               <div class="form-group w-50">
                  <h2 class="mb-2 h5">Email</h2>
                  <input 
                     type="email" 
                     class="form-control" 
                     name="email" 
                     placeholder="Your email"
                     value="{{ old('email') }}"
                  >
                  @error('email')
                     <p class="text-danger">{{ $message }}</p>
                  @enderror
               </div>

               <div>
                  <h2 class="mb-2 h5">Full name and sex</h2>
                  <div class="d-flex flex-wrap">
                     <div class="form-group col-md-5 pl-0">
                        <input 
                           type="text" 
                           class="form-control" 
                           name="name" 
                           placeholder="Your name"
                           value="{{ old('name') }}"
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
                           value="{{ old('surname') }}"
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
                           value="{{ old('patronymic') }}"
                        >
                        @error('patronymic')
                           <p class="text-danger">{{ $message }}</p>
                        @enderror
                     </div>

                     <div class="form-group col-md-2 pl-0">
                        <select name="sex" class="form-control">
                           <option disabled selected>Sex</option>
                           <option {{ old('sex') == 1 ? ' selected' : ' ' }} value="1">Male</option>
                           <option {{ old('sex') == 2 ? ' selected' : ' ' }} value="2">Female</option>
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
                           value="{{ old('address') }}"
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
                           value="{{ old('postal_code') }}"
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
                           value="{{ old('city') }}"
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
                           value="{{ old('country') }}"
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
                           value="{{ old('date_of_birth') }}"
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
                           value="{{ old('age') }}"
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
                           value="{{ old('phone_number') }}"
                        >
                        @error('phone_number')
                           <p class="text-danger">{{ $message }}</p>
                        @enderror
                     </div>
                  </div>
               </div>

               <div>
                  <h2 class="mb-2 h5">
                     Password
                  </h2>
                  <div class="form-group w-50">
                     <input 
                        type="password" 
                        class="form-control" 
                        name="password" 
                        placeholder="Your password"
                        value="{{ old('password') }}"
                     >
                     @error('password')
                        <p class="text-danger">{{ $message }}</p>
                     @enderror
                  </div>
   
                  <div class="form-group w-50">
                     <input 
                        type="password" 
                        class="form-control" 
                        name="password_confirmation" 
                        placeholder="Confirm password"
                        value="{{ old('password_confirmation') }}"
                     >
                     @error('password_confirmation')
                        <p class="text-danger">{{ $message }}</p>
                     @enderror
                  </div>
               </div>
            
               <button type="submit" class="btn btn-primary mb-4">Submit</button>
            </form>
         </div>
      </div>
   </section>
@endsection
