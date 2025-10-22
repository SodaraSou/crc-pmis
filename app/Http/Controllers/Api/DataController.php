<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\District;
use App\Models\EmployeeStatus;
use App\Models\FamilySituation;
use App\Models\Gender;
use App\Models\Province;
use Illuminate\Http\Request;

class DataController extends BaseController
{
    public function getFamilySituation()
    {
        $family_situations = FamilySituation::all();

        return $this->successResponse($family_situations);
    }

    public function getGenders()
    {
        $genders = Gender::all();

        return $this->successResponse($genders);
    }

    public function getEmployeeStatuses()
    {
        $employee_statuses = EmployeeStatus::all();

        return $this->successResponse($employee_statuses);
    }

    public function getProvinces()
    {
        $provinces = Province::all();

        return $this->successResponse($provinces);
    }

    public function getDistricts($province_id)
    {
        $districts = District::where('province_id', $province_id)->get();

        return $this->successResponse($districts);
    }


    public function getCommunes() {}

    public function getVillages() {}

    public function getBranches()
    {
        $branches = Branch::all();

        return $this->successResponse($branches);
    }
}
