@extends('layouts.main')

@section('title', 'Users')

@section('content')
   <x-navigation.breadcrumps title="Users">
      <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
      <li class="breadcrumb-item active">Users</li>
   </x-navigation.breadcrumps>

   @if(session('success'))
      <x-info-message>{{ session('success') }}</x-info-message>
   @endif

   <section class="content">
      <a class="btn btn-primary" href="{{ route('user.create') }}">Create</a>

      <div class="card w-50 mt-3">
         <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Username</th>
                     <th>eMail</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($users as $user)
                     <tr>
                        <td>{{ $user->id }}</td>
                        <td>
                           <a href="{{ route('user.show', $user->id) }}">{{ $user->name }}</a>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>
                           <a class="text-success" href="{{ route('user.edit', $user->id) }}"><i class="fas fa-pen"></i></a>
                           <form action="{{ route('user.delete', $user->id) }}" method="POST" class="d-inline">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="text-danger ml-2 mb-1" style="background-color: transparent; border: none;">
                                 <i class="fas fa-trash"></i>
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