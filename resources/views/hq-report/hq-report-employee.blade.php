@extends('layouts.app')

@section('title')
    របាយការណ៌មន្រ្តីថ្នាក់កណ្តាល
@endsection

@section('content')
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <div>
                    <div class="row">
                        <div class="col-3 text-center">
                            <div class="khm">កាកបាទក្រហមកម្ពុជា</div>
                            <div class="khm">នាយកដ្ឋានធនធានមនុស្ស</div>
                        </div>
                        <div class="col"></div>
                        <div class="col-3 text-center">
                            <div class="khm">ព្រះរាជាណាចក្រកម្ពុជា</div>
                            <div class="khm">ជាតិ សាសនា ព្រះមហាក្សត្រ</div>
                        </div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12 text-center">
                            <div class="khm">បញ្ជីររាយនាមមន្រ្តីប្រតិបត្តិ
                                និងមុខងារភារកិច្ចដែលកំពុងបម្រើការងារនៅកាកបាទក្រហមកម្ពុជាស្នាក់ការកណ្តាល</div>
                        </div>
                    </div>
                </div>
                <table class="table table-sm table-bordered cell-center">
                    <thead>
                        <tr>
                            <th class="khs text-center">ល.រ</th>
                            <th class="khs text-center">គោត្តនាម-នាម</th>
                            <th class="khs text-center">ភេទ</th>
                            <th class="khs text-center">នាយកដ្ឋាន</th>
                            <th class="khs text-center">តួនាទី ក្នុងកក្រក</th>
                            <th class="khs text-center">លេខទូរស័ព្ទ</th>
                        </tr>
                    </thead>
                    <tbody class="table-middle">
                        @foreach ($grouped_employees_by_department as $department_employees)
                            <tr>
                                <td></td>
                            </tr>
                            @foreach ($department_employees as $employee)
                                <tr>
                                    <td class="khs text-center">{{ $loop->iteration }}</td>
                                    <td class="khs text-center">{{ $employee->kh_name }}</td>
                                    <td class="khs text-center">{{ $employee->gender->kh_abbr }}</td>
                                    <td class="khs text-center">{{ $employee->current_position->department->kh_name }}</td>
                                    <td class="khs text-center">{{ $employee->current_position->position->kh_name }}</td>
                                    <td class="khs text-center">{{ $employee->phone_number }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                        {{-- @foreach ($employees as $employee)
                            <tr>
                                <td class="khs text-center">{{ $loop->iteration }}</td>
                                <td class="khs text-center">{{ $employee->kh_name }}</td>
                                <td class="khs text-center">{{ $employee->gender->kh_abbr }}</td>
                                <td class="khs text-center">{{ $employee->current_position->department->kh_name }}</td>
                                <td class="khs text-center">{{ $employee->current_position->position->kh_name }}</td>
                                <td class="khs text-center">{{ $employee->phone_number }}</td>
                            </tr>
                        @endforeach --}}
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#hq-report>a").addClass("active");
            $("#hq-report").addClass("menu-open");
            $("#hq-employee-report>a").addClass("active");
        });
    </script>
@endsection
