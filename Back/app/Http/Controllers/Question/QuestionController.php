<?php

namespace App\Http\Controllers\Question;

use App\Http\Controllers\Controller;
use App\Models\Question;

class QuestionController extends Controller
{
   public function index() {
      $questions = Question::all();

      return view('questions.index', compact('questions'));
   }

   public function show(Question $question) {
      $question->status = 'In Progress';
      $question->save();

      return view('questions.show', compact('question'));
   }

   public function toggle_status(Question $question) {
      if ($question->status == 'In Progress' || $question->status == 'Pending') {
         $question->status = 'Resolved';
      } elseif ($question->status == 'Resolved') {
         $question->status = 'Pending';
      }
      $question->save();
      
      return redirect()->route('question.index');
   }
}
