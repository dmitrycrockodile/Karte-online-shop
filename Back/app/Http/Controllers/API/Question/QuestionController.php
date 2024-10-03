<?php

namespace App\Http\Controllers\API\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Question\StoreRequest;
use App\Models\Question;

class QuestionController extends Controller
{
   public function store(StoreRequest $request) {
      $data = $request->validated();

      Question::create($data);
   
      return response()->json([
         'message' => 'Thank you, we recieved your question!',
         'success' => true,
      ], 200);
   }
}
