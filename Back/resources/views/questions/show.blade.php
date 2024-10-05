@extends('layouts.main')

@section('content')
   <div class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-6">
               <h1 class="m-0">{{ $question->title }}</h1>
            </div>
            <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
                  <li class="breadcrumb-item"><a href="{{ route('question.index') }}">Questions</a></li>
                  <li class="breadcrumb-item active">{{ $question->id }}</li>
               </ol>
            </div>
         </div>
      </div>
   </div>
   
   <section class="content">
      <div class="container-fluid">
         <a class="btn btn-primary" href="{{ route('question.index', $question->id) }}">Go Back</a>
         <div class="card w-50 mt-3">
            <div class="card-body table-responsive p-0">
               <table class="table table-hover">
                     <tr>
                        <th>ID</th>
                        <td>{{ $question->id }}</td>
                     </tr>
                     <tr>
                        <th>Status</th>
                        <td>{{ $question->status }}</td>
                     </tr>
                     <tr>
                        <th>User name</th>
                        <td>{{ $question->name }}</td>
                     </tr>
                     <tr>
                        <th>User email</th>
                        <td>{{ $question->email }}</td>
                     </tr>
                     <tr>
                        <th>User phone number</th>
                        <td>{{ $question->phone }}</td>
                     </tr>
                     <tr>
                        <th>Question</th>
                        <td>{{ $question->question }}</td>
                     </tr>
                     <tr>
                        <th>Message</th>
                        <td>{{ $question->message }}</td>
                     </tr>
               </table>
            </div>
      </div>
      </div>
   </section>
@endsection