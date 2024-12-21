@extends('layouts.main')

@section('title', 'Create New User')

@section('content')
   <x-navigation.breadcrumps title="Create user">
      <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
      <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Users</a></li>
      <li class="breadcrumb-item active">Create</li>
   </x-navigation.breadcrumps>

   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <form action="{{ route('user.store') }}" method="post">
               @csrf

               <div class="form-group w-50">
                  <h2 class="mb-2 h5">Email</h2>
                  <x-forms.simple-input 
                     name="email" 
                     type="email" 
                     :isRequired="true"
                     placeholder="Your email"
                  />
               </div>

               <div>
                  <h2 class="mb-2 h5">Full name and sex</h2>
                  <div class="d-flex flex-wrap">
                     <div class="form-group col-md-5 pl-0">
                        <x-forms.simple-input 
                           name="name" 
                           type="text" 
                           :isRequired="true"
                           placeholder="Your name"
                        />
                     </div>
   
                     <div class="form-group col-md-5 pl-0">
                        <x-forms.simple-input 
                           name="surname" 
                           type="text" 
                           placeholder="Your surname"
                        />
                     </div>
   
                     <div class="form-group col-md-5 pl-0">
                        <x-forms.simple-input 
                           name="patronymic" 
                           type="text" 
                           placeholder="Your patronymic"
                        />
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
                        <x-forms.simple-input 
                           name="address" 
                           type="text" 
                           placeholder="Address"
                        />
                     </div>
   
                     <div class="form-group col-md-5 pl-0">
                        <x-forms.simple-input 
                           name="postal_code" 
                           type="text" 
                           placeholder="Postal code"
                        />
                     </div>
   
                     <div class="form-group col-md-5 pl-0">
                        <x-forms.simple-input 
                           name="city" 
                           type="text" 
                           placeholder="City"
                        />
                     </div>
   
                     <div class="form-group col-md-5 pl-0">
                        <x-forms.simple-input 
                           name="country" 
                           type="text" 
                           placeholder="Country"
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
                        />
                     </div>
   
                     <div class="form-group col-md-5 pl-0">
                        <x-forms.simple-input 
                           name="age" 
                           type="number" 
                           placeholder="Your age"
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
                           type="text" 
                           placeholder="Phone number"
                        />
                     </div>
                  </div>
               </div>

               <div>
                  <h2 class="mb-2 h5">
                     Password
                  </h2>
                  <div class="form-group w-50">
                     <x-forms.simple-input 
                        name="password" 
                        type="password" 
                        placeholder="Your password"
                        :isRequired="true"
                     />
                  </div>
   
                  <div class="form-group w-50">
                     <x-forms.simple-input 
                        name="password_confirmation" 
                        type="password" 
                        placeholder="Confirm password"
                        :isRequired="true"
                     />
                  </div>
               </div>
            
               <button type="submit" class="btn btn-primary mb-4">Submit</button>
            </form>
         </div>
      </div>
   </section>
@endsection
