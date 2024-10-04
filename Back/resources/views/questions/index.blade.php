@extends('layouts.main')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Questions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('main.index') }}">Main page</a></li>
                        <li class="breadcrumb-item active">Questions</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
      @if (count($questions) !== 0)
         <div class="card">
            <div class="card-body">
               <ul class="todo-list ui-sortable" data-widget="todo-list">
                     @foreach ($questions as $question)
                        <li class="">
                           <span class="handle ui-sortable-handle">
                              <i class="fas fa-ellipsis-v"></i>
                              <i class="fas fa-ellipsis-v"></i>
                           </span>
                           <form action="{{ route('question.update', $question->id) }}" method="POST" class="icheck-primary d-inline ml-2">
                              @csrf
                              @method('PATCH')
                              <input type="checkbox" value="" name="todo2" id="todoCheck2" @checked($question->status === 'Resolved') onchange="this.form.submit()">
                              <label for="todoCheck2"></label>
                           </form>
                           <span class="text">{{ $question->question }}</span>
                           <span class="text">by</span>
                           <span class="text">{{ $question->name }}</span>
                           <small class="badge badge-{{ $question->status === 'Pending' ? 'warning' : 'success' }}">
                              <i class="far fa-clock"></i>
                              {{ $question->status }}
                           </small>
                           <small class="badge badge-primary">
                              <i class="far fa-clock"></i>
                              {{ $question->daysOld ? "$question->daysOld days" : ' Today' }}
                           </small>
                           <div class="tools">
                              <a class="text-primary ml-2" href="{{ route('question.show', $question->id) }}">
                                 <i class="fas fa-eye"></i>
                              </a>
                           </div>
                        </li>
                     @endforeach
               </ul>
            </div>
         </div>
      @else
         <p>There is no questions from users for now...</p>
      @endif       
   </section>
@endsection
