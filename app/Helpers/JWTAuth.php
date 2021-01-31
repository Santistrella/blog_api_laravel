<?php

namespace App\Helpers;

use Firebase\JWT\JWT;
use Illuminate\Support\Facades\DB;
use App\User;

class JwtAuth {

    public $key;

    public function __construct() {
        $this->key = 'secret_key-9994420';
    }

    public function signup($email, $password, $getToken = null){

        // Search user by credentials

        $user = User::where([
            'email' => $email,
            'password' => $password,
        ])->first();

        // Check if they are correct

        $signup = false;

        if(is_object($user)){
            $signup = true;
        }

        // Generate token

        if($signup) {

            $token = array(
                'sub'     => $user->id,
                'email'   => $user->email,
                'name'    => $user->name,
                'surname' => $user->surname,
                'iat'     => time(),
                'exp'     => time() + (7 * 24 * 60 * 60),
            );

            $jwt = JWT::encode($token, $this->key, 'HS256');
            $decoded = JWT::decode($jwt, $this->key, ['HS256']);
            // Give data or token 

            if(is_null($getToken)) {
                $data = $jwt;
            }else{
                $data = $decoded;
            }

        }else{

            $data = array(
                'status'  => 'error',
                'message' => 'Login failed.'
            );
        }

         

         return $data;
   }
   

   // Check TOKEN
   public function checkToken($jwt, $getidentity = false){
        $auth = false;

        try{
        $jwt = str_replace('"', '', $jwt);   
        $decoded = JWT::decode($jwt, $this->key, ['HS256']);
        } catch(\UnexpectedValueException $e){
            $auth = false;
        } catch(\DomainException $e){
            $auth = false;
        }

        if(!empty($decoded) && is_object($decoded) && isset($decoded->sub)){
            $auth = true;
        }else {
            $auth = false;
        }

        if($getidentity){
            return $decoded;
        }

        return $auth;

    }
   

}