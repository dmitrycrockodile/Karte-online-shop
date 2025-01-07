@extends('layouts.main')

@section('title', 'Deleted users')

@section('content')
   <x-navigation.breadcrumps title="Trashed users">
      <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
      <li class="breadcrumb-item active">Deleted users</li>
   </x-navigation.breadcrumps>

   <section class="content">
      <a class="btn btn-primary" href="{{ route('user.index') }}">Back</a>

      <div class="card w-50 mt-3">
         <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Username</th>
                     <th>eMail</th>
                     <th>Restore</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($trashed_users as $trashed_user)
                     <tr>
                        <td>{{ $trashed_user->id }}</td>
                        <td>{{ $trashed_user->name }}</td>
                        <td>{{ $trashed_user->email }}</td>
                        <td>
                           <form action="{{ route('user.restore', $trashed_user->id) }}" method="POST" class="d-inline">
                              @csrf
                              @method('PATCH')
                              <button type="submit" class="text-danger ml-2 mb-1" style="background-color: transparent; border: none;">
                                 Restore
                              </button>
                           </form>
                        </td>
                     </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </section>
@endsection