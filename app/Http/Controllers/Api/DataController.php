<?php

namespace App\Http\Controllers\Api;

use App\Models\Branch;
use App\Models\Commune;
use App\Models\District;
use App\Models\EmployeeStatus;
use App\Models\FamilySituation;
use App\Models\Gender;
use App\Models\Province;
use App\Models\SubBranch;
use App\Models\Village;

class DataController extends BaseController
{
    public function getFamilySituations()
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


    public function getCommunes($district_id)
    {
        $communes = Commune::where('district_id', $district_id)->get();

        return $this->successResponse($communes);
    }

    public function getVillages($commune_id)
    {
        $villages = Village::where('commune_id', $commune_id)->get();

        return $this->successResponse($villages);
    }

    public function getBranches()
    {
        $branches = Branch::all();

        return $this->successResponse($branches);
    }

    public function getSubBranches($branch_id)
    {
        $sub_branches = SubBranch::where('branch_id', $branch_id)->get();

        return $this->successResponse($sub_branches);
    }
}
