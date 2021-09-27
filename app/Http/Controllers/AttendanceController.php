<?php

namespace App\Http\Controllers;

use App\Services\AttendanceService;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    
    public function __construct()
    {
        $this->service = new AttendanceService;
    }
    public function index()
    {
        return $this->service->getAll();
    } 
    
    public function store(Request $request)
    {
        $validator = $this->service->validate($request);

        if (!$validator->fails()) {
            $attendance = collect([
                'name' => $request->input('name'),
                'petType' => $request->input('petType'),
                'dateAttendance' => $request->input('dateAttendance'),
                'description' => !empty($request->input('description')) ? $request->input('description') : null,
            ]);

            $response = [
                'status' => 'success' ,
                'attendance' => $this->service->store($attendance)
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => $validator->errors()
            ];
        }

        return $response;
    }

    public function getFormatted()
    {
        return response()->json($this->service->getAttendanceFormatted());
    }
}
