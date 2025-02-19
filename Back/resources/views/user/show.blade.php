@extends('layouts.main')

@section('title', "User: $user->name")

@section('content')
   <x-navigation.breadcrumps :title="$user->name">
      <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
      <li class="breadcrumb-item"><a href="{{ route('user.index') }}">Users</a></li>
      <li class="breadcrumb-item active">{{ $user->name }}</li>
   </x-navigation.breadcrumps>
   
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
                     <th class="w-25 border-0" class="border-0">ID</th>
                     <td class="border-left">{{ $user->id }}</td>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <th class="w-25">e-Mail</th>
                     <td class="border-left">{{ $user->email }}</td>
                  </tr>
                  <tr>
                     <th class="w-25">Verified</th>
                     <td class="border-left">{{ $user->email_verified_at ? 'Yes' : 'No' }}</td>
                  </tr>
                  <tr>
                     <th class="w-25">Username</th>
                     <td class="border-left">{{ $user->name }}</td>
                  </tr>
                  <tr>
                     <th class="w-25">Surname</th>
                     <td class="border-left">{{ $user->surname }}</td>
                  </tr>
                  <tr>
                     <th class="w-25">Patronymic</th>
                     <td class="border-left">{{ $user->patronymic }}</td>
                  </tr>
                  <tr>
                     <th class="w-25">Sex</th>
                     <td class="border-left">{{ $user->sexTitle }}</td>
                  </tr>
                  <tr>
                     <th class="w-25">Address</th>
                     <td class="border-left">{{ $user->address }}</td>
                  </tr>
                  <tr>
                     <th class="w-25">Postal Code</th>
                     <td class="border-left">{{ $user->postal_code }}</td>
                  </tr>
                  <tr>
                     <th class="w-25">City</th>
                     <td class="border-left">{{ $user->city }}</td>
                  </tr>
                  <tr>
                     <th class="w-25">Country</th>
                     <td class="border-left">{{ $user->country }}</td>
                  </tr>
                  <tr>
                     <th class="w-25">Date of birth</th>
                     <td class="border-left">{{ $user->date_of_birth }}</td>
                  </tr>
                  <tr>
                     <th class="w-25">Age</th>
                     <td class="border-left">{{ $user->age }}</td>
                  </tr>
                  <tr>
                     <th class="w-25">Phone number</th>
                     <td class="border-left">{{ $user->phone_number }}</td>
                  </tr>
                  <tr>
                     <th class="w-25">Subscription</th>

                     <td class="border-left">{{ $user->is_subscribed->text() }}</td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      </div>
   </section>
@endsection