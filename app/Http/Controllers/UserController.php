<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\User;

class UserController extends Controller
{
    
    public function register(Request $request) {
        
        // Get user data

        $json = $request->input('json', null);
        $params = json_decode($json);
        $params_array = json_decode($json, true); // array
        
        if(!empty($params) && !empty($params_array)) {
        // Limpiar datos

        $params_array = array_map('trim', $params_array);

        // validate data

        $validate = \Validator::make($params_array, [
            'name'      => 'required|alpha',
            'surname'   => 'required|alpha',
            'email'     => 'required|email|unique:users',
            'password'  => 'required'
        ]);

        if($validate->fails()){

            // validation failed

            $data = array(
                'status' => 'error',
                'code' => 404,
                'message' => 'El usuario no ha sido creado',
                'errors' => $validate->errors()
            );

        } else {
            // Validation success
            
            // hash passwords
            
            $pwd = hash('sha256', $params->password);
            
            // check if user is already registered

            $user = new User();
            $user->name = $params_array['name'];
            $user->surname = $params_array['surname'];
            $user->email = $params_array['email'];
            $user->password = $pwd;
            $user->role = 'ROLE_USER';

            // save user

            $user->save();

            $data = array(
                'status' => 'success',
                'code' => 200,
                'message' => 'El usuario ha sido creado',
                'user' => $user
            );
        }
    } else {
        $data = array(
            'status' => 'error',
            'code' => 404,
            'message' => 'Los datos no son correctos'
        );
    }  
        
        return response()->json($data, $data['code']);
    }



    // LOGIN 
    public function login(Request $request) {

        $jwtAuth = new \JwtAuth();

        // Receive data by Post 

        $json = $request->input('json', null);
        $params = json_decode($json);
        $params_array = json_decode($json, true);
        
        // Validate 

        $validate = \Validator::make($params_array, [
            'email'     => 'required|email',
            'password'  => 'required'
        ]);

        if($validate->fails()){
            // Login Fails
            $signup = array(
                'status'    => 'error',
                'code'      => 404,
                'message'   => 'User cannot be identified',
                'errors'    => $validate->errors()
            );
        } else {
            // Hash pwd
            $pwd = hash('sha256', $params->password);

            // Give token/data

            $signup = $jwtAuth->signup($params->email, $pwd);

            if(!empty($params->getToken)) {
                $signup = $jwtAuth->signup($params->email, $pwd, true);
            }
        }

        return response()->json($signup, 200);
    }


    public function update(Request $request){

        // Check if user is already logged in
        $token = $request->header('Authorization');
        $jwtAuth = new \JwtAuth();
        $checkToken = $jwtAuth->checkToken($token);

        // get data by post request
        $json = $request->input('json', null);
        $params_array = json_decode($json, true);

        if($checkToken && !empty($params_array)){
            
            // get user identified
            $user = $jwtAuth->checkToken($token, true);
            

            // validate data
            $validate = \Validator::make($params_array, [
                'name'      => 'required|alpha',
                'surname'   => 'required|alpha',
                'email'     => 'required|email|unique:users'
            ]);
            
            // avoid data we don't need
            unset($params_array['id']);
            unset($params_array['role']);
            unset($params_array['password']);
            unset($params_array['created_at']);
            unset($params_array['remember_token']);

            // update user in ddbb
            $user_update = User::where('id',$user->sub)->update($params_array);
            
            // give back array with results
            $data = array(
                'code'    => 200,
                'status'  => 'success',
                'user' => $user,
                'changes' => $params_array
            );

        }else {

            $data = array(
                'code'    => 400,
                'message' => 'User is not logged in',
                'status'  => 'error'
            );
        }

        return response()->json($data, $data['code']);
    }

    public function upload(Request $request) {

        // get data from Request
        $image = $request->file('file0');

        // validation

        $validate = \Validator::make($request->all(), [
            'file0' => 'required|mimes:jpeg,jpg,png',
        ]);

        // upload file
        if(!$image || $validate->fails()){
            $data = array(
                'code'    => 400,
                'status'  => 'error',
                'message' => 'Error uploading image'
            );
        } else {
            $image_name = time().$image->getClientOriginalName();
            \Storage::disk('users')->put($image_name, \File::get($image));

            $data = array(
                'code'   => 200,
                'status' => 'success',
                'image'  => $image_name,
            );
        }

        return response()->json($data, $data['code']);
    }

    public function getImage($filename){
        $isset = \Storage::disk('users')->exists($filename);

        if($isset){
            $file = \Storage::disk('users')->get($filename);
            return new Response($file, 200);
        } else {
            $data = array(
                'code'    => 400,
                'status'  => 'error',
                'message' => 'This file does not exist'
            );

            return response()->json($data, $data['code']);

        }
    }

    public function detail($id){
        $user = User::find($id);
        
        if(is_object($user)){
            $data = array(
                'code'   => 200,
                'status' => 'success',
                'user'   => $user
            );
        } else {
            $data = array(
                'code'   => 404,
                'status' => 'error',
                'message'   => 'User does not exist'
            );
        }
        return response()->json($data, $data['code']);
    }

}
