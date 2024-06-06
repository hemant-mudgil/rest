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
   
   public static function send($statusCode, $message = null , $data = null ,  $error = null) {

      header('Content-Type: application/json');
      http_response_code($statusCode);
      
      $response = [
         'status'    => ($statusCode >= 200 && $statusCode < 300) ? 'success' : 'error',
         'message'   => $message,
         'data'      => $data,
         'error'     => $error
      ];
      
      echo json_encode($response);
      exit();
   }

   /**
    * Send a 200 OK response.
    *
    * @param string|null $message The success message to be included.
    * @param mixed $data The data to be sent in the response body.
    */
   public static function success($message = 'Success', $data = null) {
      self::send(200, $message, $data);
   }

   /**
      * Send a 201 Created response.
      *
      * @param string|null $message The success message to be included.
      * @param mixed $data The data to be sent in the response body.
      */
   public static function created($message = 'Created', $data = null) {
      self::send(201, $message, $data);
   }

   /**
      * Send a 400 Bad Request response.
      *
      * @param string $message The error message.
      */
   public static function badReq($message = 'Bad Request') {
      self::send(400, $message);
   }

   /**
      * Send a 401 Unauthorized response.
      *
      * @param string $message The error message.
      */
   public static function unauth($message = 'Unauthorized') {
      self::send(401, $message);
   }

   /**
      * Send a 403 Forbidden response.
      *
      * @param string $message The error message.
      */
   public static function forbidden($message = 'Forbidden') {
      self::send(403, $message);
   }

   /**
      * Send a 404 Not Found response.
      *
      * @param string $message The error message.
      */
   public static function notfound($message = 'Not Found') {
      self::send(404, $message);
   }

   /**
      * Send a 500 Internal Server Error response.
      *
      * @param string $message The error message.
      */
   public static function error($message = 'Internal Server Error') {
      self::send(500, $message);
   }
}


// // can use like 
// use \nv\Rest\Response as RestResponse;
// RestResponse::success('hey it working');
// RestResponse::badreq('hey it not working');
