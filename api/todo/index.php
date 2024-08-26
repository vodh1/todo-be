<?php

  include("../../libs/db.php");
  include("todo.controller.php");
  $request_method = $_SERVER["REQUEST_METHOD"];

  $todo = new TodoController();

  switch($request_method) {
    case 'GET':
      header('Content-type: application/json');
      echo $todo->getAll();
      break;
    case 'POST':
      echo $todo->add($_POST['name']);
      break;
    case 'PUT':
      // Get the raw input data from the request body
      $input = file_get_contents('php://input');

      // Parse the input data into an associative array (assuming URL-encoded form data)
      parse_str($input, $payload);
      echo $todo->update($payload['id'], $payload['is_done']);
      break;
    case 'DELETE':
      // Get the raw input data from the request body
      $input = file_get_contents('php://input');

      // Parse the input data into an associative array (assuming URL-encoded form data)
      parse_str($input, $payload);
      echo $todo->delete($payload['id']);
      break;
    default:
      echo 'Method not allowed';
  }
 ?>