<?php

namespace App\Services;

use App\Models\Pets;
use App\Http\Resources\PetsCollection;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class PetsService extends Pets
{
    public function store($pet)
    {
        try {
            $this->name = $pet->get('name');
            $this->pet_type_id = self::TYPES[$pet->get('petType')];

            if (!boolval($this->save())) {
                throw new Exception('Error ocurred during the creating pet');
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return $this;
    }

    public function getAll()
    {
        return new PetsCollection($this->paginate(5));
    }

    public function getByName($name)
    {
        $this->filteredName = $name;

        $filtered = $this->all()->filter(function ($value, $key) {
            if (boolval($this->filterByName($value->name))) {
                return $value;
            }
        });
    
        return new PetsCollection($filtered);
    }
    
    private function filterByName($name)
    {
        return Str::is($this->filteredName . '*', $name);
    }

    public function validate($request)
    {
        return Validator::make($request->all(), [
            'name' => 'required|min:2',
            'petType' => 'required|in:C,G',
        ]);
    }

    public function deletePet($pet)
    {
        $deletePet = $this->find($pet);
        if (!empty($deletePet)) {
            $deletePet->delete();
        }
        return "Delete whit success";
    }
    
    public function getById($pet)
    {
        return $this->where(['id' => $pet])->get();
    }
}
