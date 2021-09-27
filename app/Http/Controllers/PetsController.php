<?php

namespace App\Http\Controllers;

use App\Services\PetsService;
use Illuminate\Http\Request;

class PetsController extends Controller
{
    public function __construct()
    {
        $this->service = new PetsService;
    }
    public function index()
    {
        return $this->service->getAll();
    } 
    
    public function store(Request $request)
    {
        $validator = $this->service->validate($request);

        if (!$validator->fails()) {
            $pet = collect([
                "name" => $request->input('name'),
                "petType" => $request->input('petType')
            ]);

            $response = [
                'status' => 'success' ,
                'pet' => $this->service->store($pet)
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => $validator->errors()
            ];
        }

        return $response;
    }
    
    public function show($name)
    {
       return $this->service->getByName($name);
    }

    public function delete($id)
    {
        return $this->service->deletePet($id);
    }
}
