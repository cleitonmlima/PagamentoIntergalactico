<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->service = new UserService;
    }
    
    public function store(Request $request)
    {
        // $validator = $this->service->validate($request);

        // if (!$validator->fails()) {
        //     // $pet = collect([
        //     //     "name" => $request->input('name'),
        //     //     "petType" => $request->input('petType')
        //     // ]);

        //     // $response = [
        //     //     'status' => 'success' ,
        //     //     'pet' => $this->service->store($pet)
        //     // ];
        // } else {
        //     $response = [
        //         'status' => 'error',
        //         'message' => $validator->errors()
        //     ];
        // }

        return $request;
    }
    
}
