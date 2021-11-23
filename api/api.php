<?php
header('Access-Control-Allow-Origin: ' .$_SERVER['HTTP_ORIGIN']);
header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With');
header("Content-Type:application/json, Access-Control-Allow-Origin:*");
header("Content-Type:multipart/form-data, Access-Control-Allow-Origin:*");

include_once "../database.php";
include_once "controllers/controller.php";
include_once "controllers/kairos_face_php/Kairos.php";

$Kairos = new Kairos('b07139dc','193ebcef9e50706b46cc4b8972652eed' );
$controllerQuery = new controller();

  // QUERY REQUEST STARTS ===================
  $result = array('error'=>false);
  $action = '';

  if(isset($_GET['action'])){
      $action = $_GET['action'];
  }

  if($action=='register'){
      $query = json_decode(file_get_contents('php://input'),true);
      return json_encode($controllerQuery->registration($query));
  }

  if($action=='login'){
    $query = json_decode(file_get_contents('php://input'),true);
    return json_encode($controllerQuery->login($query));

}

  if($action=='face_auth'){
    // $query = json_decode(file_get_contents('php://input'),true);
    // echo json_encode ($query);
   echo $Kairos->viewGalleries();

}

if ($action == 'verify_email'){
  $query = json_decode(file_get_contents('php://input'),true);
  return json_encode($controllerQuery->verify_email($query));
}

if ($action == 'checkUsername'){
  $query = json_decode(file_get_contents('php://input'),true);
  return json_encode($controllerQuery->checkUsername($query));
}

if ($action == 'checkEmail'){
  $query = json_decode(file_get_contents('php://input'),true);
  return json_encode($controllerQuery->checkEmail($query));
}

