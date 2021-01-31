<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Category;

class CategoryController extends Controller
{   
    public function __construct() {
        $this->middleware('api.auth', ['except' =>['index', 'show']]);
    }

    public function index() {
     
        $categories = Category::all();

        return response()->json([
            'code' => 200,
            'status' => 'success',
            'category' => $categories
        ]);
    }

    public function show($id) {

        $category = Category::find($id);

        if(is_object($category)) {
            $data = [
                'code' => 200,
                'status' => 'success',
                'category' => $category
            ];
        } else {
            [
                'code' => 400,
                'status' => 'error',
                'message' => 'The category does not exists'
            ];
        }

        return response()->json($data, $data['code']);
    }

    public function store(Request $request) {
        // get data from request
        $json = $request->input('json', null);
        $params_array = json_decode($json, true);
        
        if(!empty($params_array)){

        // validate data
        $validate = \Validator::make($params_array, [
            'name' => 'required'
        ]);

        if($validate->fails()) {
            $data = [
                'code'   => 400,
                'status' => 'error',
                'message' => 'Category was not created'
            ];
        } else {
            $category = new Category();
            $category->name = $params_array['name'];
            $category->save();

            $data = [
                'code'   => 200,
                'status' => 'success',
                'message' => 'Category was created!'
            ];
        }
    } else {
        $data = [
            'code'   => 400,
            'status' => 'error',
            'message' => 'You have not send any category'
        ];
    }
        // give response

        return response()->json($data, $data['code']);
    }

    public function update($id, Request $request) {

        // get data from request
        $json = $request->input('json', null);
        $params_array = json_decode($json, true);
        
        if(!empty($params_array)) {
         // validate data
        $validate = \Validator::make($params_array, [
            'name' => 'required',
        ]);
 
        // avoid
        unset($params_array['id']);
        unset($params_array['created_at']);
        // update data
        $category = Category::where('id', $id)->update($params_array);
        $data = [
            'code'     => 200,
            'status'   => 'success',
            'category' => $params_array
        ];

        } else {
            $data = [
                'code'   => 400,
                'status' => 'error',
                'message' => 'You have not send any category'
            ];    
        }

        return response()->json($data, $data['code']);
    }
}