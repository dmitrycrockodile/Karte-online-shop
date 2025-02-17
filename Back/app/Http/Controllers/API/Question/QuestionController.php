<?php

namespace App\Http\Controllers\API\Question;

use App\Http\Controllers\API\BaseApiController;
use App\Http\Requests\API\Question\StoreRequest;
use App\Models\Question;
use Illuminate\Http\JsonResponse;

class QuestionController extends BaseApiController
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

      return $this->successResponse([], 'Thank you, we recieved your question!');
   }
}
