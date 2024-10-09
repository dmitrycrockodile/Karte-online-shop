@extends('layouts.main')

@section('content')
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">{{ $user->name }}</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Users</a></li>
                  <li class="breadcrumb-item active">{{ $user->title }}</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   
   <section class="content">
      <div class="container-fluid">
         <a class="btn btn-primary" href="{{ route('user.edit', $user->id) }}">Edit</a>
         <form action="{{ route('user.delete', $user->id) }}" method="POST" class="d-inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">
               Delete
            </button>
         </form>
         <div class="card w-50 mt-3">
         <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
               <thead>
                  <tr>
                     <th>ID</th>
                     <td>{{ $user->id }}</td>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <th>e-Mail</th>
                     <td>{{ $user->email }}</td>
                  </tr>
                  <tr>
                     <th>Verified</th>
                     <td>{{ $user->email_verified_at ? 'Yes' : 'No' }}</td>
                  </tr>
                  <tr>
                     <th>Username</th>
                     <td>{{ $user->name }}</td>
                  </tr>
                  <tr>
                     <th>Surname</th>
                     <td>{{ $user->surname }}</td>
                  </tr>
                  <tr>
                     <th>Patronymic</th>
                     <td>{{ $user->patronymic }}</td>
                  </tr>
                  <tr>
                     <th>Sex</th>
                     <td>{{ $user->sexTitle }}</td>
                  </tr>
                  <tr>
                     <th>Address</th>
                     <td>{{ $user->address }}</td>
                  </tr>
                  <tr>
                     <th>Postal Code</th>
                     <td>{{ $user->postal_code }}</td>
                  </tr>
                  <tr>
                     <th>City</th>
                     <td>{{ $user->city }}</td>
                  </tr>
                  <tr>
                     <th>Country</th>
                     <td>{{ $user->country }}</td>
                  </tr>
                  <tr>
                     <th>Date of birth</th>
                     <td>{{ $user->date_of_birth }}</td>
                  </tr>
                  <tr>
                     <th>Age</th>
                     <td>{{ $user->age }}</td>
                  </tr>
                  <tr>
                     <th>Phone number</th>
                     <td>{{ $user->phone_number }}</td>
                  </tr>
                  <tr>
                     <th>Subscription</th>
                     <td>{{ $user->is_subscribed ? 'Subscribed' : 'Not subscribed' }}</td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      </div>
   </section>
@endsection