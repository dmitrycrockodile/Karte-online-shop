<?php

namespace App\Http\Controllers\Question;

use App\Enums\QuestionStatus;
use App\Http\Controllers\Controller;
use App\Models\Question;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Database\Eloquent\Collection;

class QuestionController extends Controller
{
   public function index(): View {
      $questions = $this->getOrderedQuestions();

      return view('questions.index', compact('questions'));
   }

   public function show(Question $question): View {
      $question->status = QuestionStatus::IN_PROGRESS;
      $question->save();

      return view('questions.show', compact('question'));
   }

   public function update(Question $question): RedirectResponse {
      if ($question->status === QuestionStatus::IN_PROGRESS || $question->status === QuestionStatus::PENDING) {
         $question->status = QuestionStatus::RESOLVED;
      } elseif ($question->status === QuestionStatus::RESOLVED) {
         $question->status = QuestionStatus::PENDING;
      }
      $question->save();
      
      return redirect()->route('question.index');
   }

   private function getOrderedQuestions(): Collection {
      $questions = Question::orderByRaw("
         CASE 
               WHEN status = ? THEN 2 
               WHEN status = ? THEN 1  
               ELSE 0                   
         END ASC", [
         QuestionStatus::RESOLVED->value,
         QuestionStatus::PENDING->value,
      ])
      ->orderBy('created_at', 'DESC')
      ->get();

      return $questions;
   }
}
