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

   public function show(Question $item) {
      return view('questions.show', compact('item'));
   }

   public function toggle_status(Question $question) {
      if ($question->status == 'open') {
         $question->status = 'resolved';
      } elseif ($question->status == 'resolved') {
         $question->status = 'open';
      }
      $question->save();
      
      return redirect()->route('question.index');
   }
}
