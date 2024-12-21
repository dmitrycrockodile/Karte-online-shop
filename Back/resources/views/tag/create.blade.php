@extends('layouts.main')

@section('title', 'Create New Tag')

@section('content')
   <x-navigation.breadcrumps title="Create tag">
      <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
      <li class="breadcrumb-item"><a href="{{ route('tag.index') }}">Tags</a></li>
      <li class="breadcrumb-item active">Create</li>
   </x-navigation.breadcrumps>

   <section class="content">
      <div class="container-fluid">
         <div class="row">
            <form action="{{ route('tag.store') }}" method="post">
               @csrf
               <div class="form-group">
                  <x-forms.simple-input 
                     name="title" 
                     type="text" 
                     :isRequired="true"
                     placeholder="Enter title"
                  />
               </div>

               <button type="submit" class="btn btn-primary">Submit</button>
            </form>
         </div>
      </div>
   </section>
@endsection
