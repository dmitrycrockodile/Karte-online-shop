@extends('layouts.main')

@section('title', 'Colors')

@section('content')
   <x-navigation.breadcrumps title="Colors">
      <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
      <li class="breadcrumb-item active">Colors</li>
   </x-navigation.breadcrumps>

   @if(session('success'))
      <x-info-message>{{ session('success') }}</x-info-message>
   @endif

   <section class="content">
      <a class="btn btn-primary" href="{{ route('color.create') }}">Create</a>

      <div class="card w-50 mt-3">
         <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
               <thead>
                  <tr>
                     <th>ID</th>
                     <th>Color title</th>
                     <th>Color</th>
                     {{-- <th>Acts</th> --}}
                  </tr>
               </thead>
               <tbody>
                  @foreach ($colors as $color)
                     <tr>
                        <td>{{ $color->id }}</td>
                        <td>
                           <a href="{{ route('color.show', $color->id) }}">{{ $color->title }}</a>
                        </td>
                        <td><i class="fas fa-square ml-2"  style="color:{{ $color->title }}"></i></td>
                        {{-- <td>
                           <a class="text-success" href="{{ route('color.edit', $color->id) }}"><i class="fas fa-pen"></i></a>
                           <a class="text-danger ml-2" href="{{ route('color.delete', $color->id) }}"><i class="fas fa-trash"></i></a>
                           <a class="text-primary ml-2" href="{{ route('color.show', $color->id) }}"><i class="fas fa-eye"></i></a>
                        </td> --}}
                     </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </section>
@endsection