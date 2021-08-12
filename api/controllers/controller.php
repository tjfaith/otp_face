<?php
use Illuminate\Http\Request;
use Illuminate\Database\Capsule\Manager as Capsule;

use Models\users;

class controller{
     // Generate id
     private function generateId(){
        // CODE TO GENERATE ID
         $token = 'qwertzuiopasdfghjklyxcvbnmABCDEFGHIJKLMNOPQRSTUVWXYZ123456789abcdefghijklmnopqrstuvwxyz';
         $token = str_shuffle($token);
         $token = substr($token,  0,  2);
         $current_date = date('Ymd');
         return $token = $token.$current_date;
     }

    public function registration($data){
        // insert data
        users::insert([
            'user_id'           =>  $this->generateId(),
            'name'             =>  $data['username'],
            'password'          => password_hash($data['password'], PASSWORD_BCRYPT),
            'phone'            => $data['telephone'],
            'email'             => $data['email'],
            'created_at'        => date('Y-m-d H:i:s'),
            'updated_at'        => date('Y-m-d H:i:s')
    
            ]);
    }
}