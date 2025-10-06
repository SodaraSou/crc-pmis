@extends('layouts.app')

@section('title')
    របាយការណ៌មន្រ្តីថ្នាក់កណ្តាល
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <button id="btn-print" class="btn btn-primary float-right"><i class="fa fa-print"></i> បោះពុម្ភ</button>
        </div>
    </div>
    <div class="card" id="printable-area">
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
                        <div class="khm">
                            បញ្ជីររាយនាមមន្រ្តីប្រតិបត្តិដែលកំពុងបម្រើការងារនៅស្នាក់ការកណ្តាលកាកបាទក្រហមកម្ពុជា</div>
                    </div>
                </div>
            </div>
            <table class="table table-sm table-bordered cell-center">
                <tbody>
                    <tr>
                        <td class="khm text-center">ល.រ</td>
                        <td class="khm text-center">គោត្តនាម-នាម</td>
                        <td class="khm text-center">ភេទ</td>
                        <td class="khm text-center">នាយកដ្ឋាន</td>
                        <td class="khm text-center">តួនាទី ក្នុងកក្រក</td>
                        <td class="khm text-center">លេខទូរស័ព្ទ</td>
                    </tr>
                    @foreach ($grouped_employees_by_department as $department_json => $employees)
                        @php
                            $department = json_decode($department_json);
                        @endphp
                        <tr>
                            <td class="khm" colspan="6">{{ $department->kh_name }}</td>
                        </tr>
                        @foreach ($employees as $employee)
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
                </tbody>
                <tfoot></tfoot>
            </table>
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

            $('#btn-print').click(function() {
                window.print();
            })
        });
    </script>
@endsection
