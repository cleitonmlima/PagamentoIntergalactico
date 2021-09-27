<?php

namespace App\Services;

use App\Models\Attendance;
use App\Services\PetsService;
use App\Models\Pets;
use App\Http\Resources\AttendanceCollection;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class AttendanceService extends Attendance
{
    public function store($attendance)
    {
        try {
            // save pet and obtain id
            $pet = $this->savePet($attendance);
            $this->pet_id = $pet->id;
            $this->date_attendance = $attendance->get('dateAttendance');
            $this->description = $attendance->get('description');

            if (!boolval($this->save())) {
                throw new Exception('Error ocurred during the creating attendance');
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $this;
    }

    public function getAll()
    {
        return new AttendanceCollection($this->paginate(5));
    }

    public function savePet($pet)
    {
        $petService = new PetsService();

        $pet = collect([
            "name" => $pet->get('name'),
            "petType" => $petService::TYPES[$pet->get('petType')]
        ]);
        
        $pet = $petService->store($pet);
        return $pet;
    }

    public function validate($request)
    {
        return Validator::make($request->all(), [
            'name' => 'required|min:2',
            'petType' => 'required|in:C,G',
            'dateAttendance' => 'required|date_format:"Y-m-d"',
        ]);
    }

    public function getAttendanceFormatted()
    {
        $attendance = $this->all();
        $petService = app(PetsService::class);

        $collectionAttendance = collect();
        foreach ($attendance as $at) {
       
            $pet = $petService->getById($at->pet_id);
            
            $petName = $pet->first()->name;
            $petType = $pet->first()->type->name;
            $dateAttendance = Carbon::createFromFormat('Y-m-d', $at->date_attendance)->format('d/m/Y');

            $collectionAttendance->add(
                'Em ' . $dateAttendance . ' o pet ' . $petName . '(' . ucFirst($petType) .') ´' . $at->description . '´'
            );
        }

        return $collectionAttendance;
    }
}
