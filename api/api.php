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

// KARIOS API ===================================================================================== START

  if($action=='face_auth'){
    // $query = json_decode(file_get_contents('php://input'),true);
    // echo json_encode ($query);
   echo $Kairos->viewGalleries();
}

if($action == 'remove_image_subject'){

  $query = json_decode(file_get_contents('php://input'),true);
 $subject_id = $query['email'];
$gallery_name = 'yabatech';
$argumentArray =  array(
    "subject_id" => $subject_id,
    "gallery_name" => $gallery_name 
);
echo $Kairos->removeSubjectFromGallery($argumentArray);
}

if($action=='detect_image'){
  $query = json_decode(file_get_contents('php://input'),true);
  $image      = $query['image'];
$argumentArray =  array(
    "image" => $image
);
//  echo $Kairos->detect($argumentArray);
echo $Kairos->detect($argumentArray);
}

if ($action == 'check_image'){
  $query = json_decode(file_get_contents('php://input'),true);

  // CHECK IF IMAGE EXIST
  $image      = $query['webcamImage'];
  $gallery_name = 'yabatech';
  $argumentArray =  array(
    "image" => $image,
    "gallery_name" => $gallery_name
  );
 echo $Kairos->recognize($argumentArray);
}

if($action == 'enroll_image'){
  $query = json_decode(file_get_contents('php://input'),true);

  

  // ENROLL IMAGE
  $image      = $query['webcamImage'];
  $subject_id = $query['email'];
  $gallery_name = 'yabatech';
  $argumentArray =  array(
      "image" => $image,
      "subject_id" => $subject_id,
      "gallery_name" => $gallery_name
  );
  $kair = $Kairos->enroll($argumentArray);
  $local = $controllerQuery->save_image($query);
  $response = json_decode($kair, true);
  $imageData = array_push ($response, $local);
  return json_encode($imageData);

}

// KARIOS API ========================================================================END
if ($action == 'save_image'){
  $query = json_decode(file_get_contents('php://input'),true);
  return json_encode($controllerQuery->save_image($query));
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

