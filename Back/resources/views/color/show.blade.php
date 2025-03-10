@extends('layouts.main')

@section('title', "Color: $color->title")

@section('content')
   <x-navigation.breadcrumps :title="$color->title">
      <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
      <li class="breadcrumb-item"><a href="{{ route('color.index') }}">Colors</a></li>
      <li class="breadcrumb-item active">{{ $color->title }}</li>
   </x-navigation.breadcrumps>
   
   <section class="content">
      <div class="container-fluid">
         <a class="btn btn-primary" href="{{ route('color.edit', $color->id) }}">Edit</a>
         <form action="{{ route('color.delete', $color->id) }}" method="POST" class="d-inline">
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
                     <th class="border-0 w-25">ID</th>
                     <td class="border-left">{{ $color->id }}</td>
                  </tr>
               </thead>
               <tbody>
                  <tr>
                     <th class="w-25">Color title</th>
                     <td class="border-left">{{ $color->title }}</td>
                  </tr>
                  <tr>
                     <th class="w-25">Color</th>
                     <td class="border-left"><i class="fas fa-square ml-2"  style="color:{{ $color->title }}"></i></td>
                  </tr>
               </tbody>
            </table>
         </div>
      </div>
      </div>
   </section>
@endsection