<?php

namespace nv\Rest;

class Response {

   /**
    * Send a JSON response with a given HTTP status code, message, and data.
    *
    * @param int $statusCode The HTTP status code for the response.
    * @param string|null $message The message to be sent in the response.
    * @param mixed $data The data to be sent in the response body.
    */
   // private static function send($statusCode, $message = null, $data = null) {
   //    header('Content-Type: application/json');
   //    header('Access-Control-Allow-Origin: *'); // Allow all origins for CORS
   //    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS'); // Allow specific methods
   //    header('Access-Control-Allow-Headers: Content-Type, Authorization'); // Allow specific headers
   //    http_response_code($statusCode);
      
   //    $response = [];
   //    if ($message !== null) {
   //       $response['message'] = $message;
   //    }
   //    if ($data !== null) {
   //       $response['data'] = $data;
   //    }
      
   //    echo json_encode($response);
   //    exit();
   // }
   
   /**
    * Send a JSON response with a given HTTP status code, message, and data.
    *
    * @param int $statusCode The HTTP status code for the response.
    * @param string|null|array $message The message to be sent in the response.
    * @param mixed $data The data to be sent in the response body.
    */
    public static function send($statusCode, $message = null, $data = null) {
      header('Content-Type: application/json');
      http_response_code($statusCode);
      
      $response = [
         'status'    => ($statusCode >= 200 && $statusCode < 300) ? 'success' : 'error',
         'message'   => $message,
         'data'      => $data
      ];
      
      echo json_encode($response);
      exit();
   }

   /**
    * Send a 200 OK response.
    *
    * @param string|null|array $message The success message to be included.
    * @param mixed $data The data to be sent in the response body.
    */
   public static function success($message = 'Success', $data = null) {
      self::send(200, $message, $data);
   }

   /**
    * Send a 201 Created response.
    *
    * @param string|null|array $message The success message to be included.
    * @param mixed $data The data to be sent in the response body.
    */
   public static function created($message = 'Created', $data = null) {
      self::send(201, $message, $data);
   }

   /**
    * Send a 400 Bad Request response.
    *
    * @param string|null|array $message The error message.
    */
   public static function badReq($message = 'Bad Request') {
      self::send(400, $message);
   }

   /**
    * Send a 401 Unauthorized response.
    *
    * @param string|null|array $message The error message.
    */
   public static function unauth($message = 'Unauthorized') {
      self::send(401, $message);
   }

   /**
    * Send a 403 Forbidden response.
    *
    * @param string|null|array $message The error message.
    */
   public static function forbidden($message = 'Forbidden') {
      self::send(403, $message);
   }

   /**
    * Send a 404 Not Found response.
    *
    * @param string|null|array $message The error message.
    */
   public static function notfound($message = 'Not Found') {
      self::send(404, $message);
   }

   /**
    * Send a 500 Internal Server Error response.
    *
    * @param string|null|array $message The error message.
    */
   public static function error($message = 'Internal Server Error') {
      self::send(500, $message);
   }
}



// // can use like 
// use \nv\Rest\Response as RestResponse;
// RestResponse::success('hey it working');
// RestResponse::badreq('hey it not working');


// 100-level (Informational) – server acknowledges a request
// 200-level (Success) – server completed the request as expected
// 300-level (Redirection) – client needs to perform further actions to complete the request
// 400-level (Client error) – client sent an invalid request
// 500-level (Server error) – server failed to fulfill a valid request due to an error with server


// Here are some common response codes:

// 400 Bad Request – client sent an invalid request, such as lacking required request body or parameter
// 401 Unauthorized – client failed to authenticate with the server
// 403 Forbidden – client authenticated but does not have permission to access the requested resource
// 404 Not Found – the requested resource does not exist
// 412 Precondition Failed – one or more conditions in the request header fields evaluated to false
// 500 Internal Server Error – a generic error occurred on the server
// 503 Service Unavailable – the requested service is not available
