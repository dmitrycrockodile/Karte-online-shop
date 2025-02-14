<?php

namespace App\Http\Controllers\API\Question;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Question\StoreRequest;
use App\Models\Question;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;

class QuestionController extends Controller
{
   /**
     * Stores a new question.
     *
     * This method validates the incoming request and creates a new 
     * question record in the database.
     *
     * @param StoreRequest $request The validated request containing question data.
     * @return JsonResponse A JSON response confirming the question submission.
   */
   public function store(StoreRequest $request): JsonResponse {
      $data = $request->validated();

      Question::create($data);
   
      return response()->json([
         'message' => 'Thank you, we recieved your question!',
         'success' => true,
      ], Response::HTTP_OK);
   }
}
