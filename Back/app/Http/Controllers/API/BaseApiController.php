<?php 

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

class BaseApiController extends Controller {
   /**
    * Method for all API controllers to handle successful JSON responses
    *
    * @param array $data The data client needs to recieve
    * @param string $message Additional message for the client
    * @param int $statusCode The response status 
    *
    * @return JsonResponse The response with all data
   */
   protected function successResponse( 
      mixed $data = [], 
      string $message = 'Success!', 
      int $statusCode = Response::HTTP_OK
   ): JsonResponse {
      return response()->json([
         'success' => true,
         'message' => $message,
         'data' => $data,
      ], $statusCode);
   }

   /**
    * Method for all API controllers to handle JSON responses with failed operations
    *
    * @param string $errorMessage Message with error info 
    * @param int $statusCode The response status 
    *
    * @return JsonResponse The response with error info
   */
   protected function errorResponse( 
      string $errorMessage = 'An error occured.', 
      int $statusCode = Response::HTTP_BAD_REQUEST 
   ): JsonResponse {
      return response()->json([
         'success' => false,
         'error' => $errorMessage
      ], $statusCode);
   }
}