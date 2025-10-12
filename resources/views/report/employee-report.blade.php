@extends('layouts.app')

@section('title')
    របាយការណ៌
@endsection

@section('content')
    <div class="container">
        <livewire:report.employee-report />
    </div>
    {{-- <div class="card">
        <div class="card-body">
            <form action="{{ route('report.employee-report') }}" method="GET">
                <div class="row">
                    <div class="col-12 col-md-3">
                        <label>នាយកដ្ឋាន</label>
                        <select class="form-control" name="department_id">
                            <option value="">សូមជ្រើសរើសនាយកដ្ឋាន</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}"
                                    {{ request('department_id') == $department->id ? 'selected' : '' }}>
                                    {{ $department->kh_name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-12 col-md-3"></div>
                    <div class="col-12 col-md-3 d-flex justify-content-end align-items-center">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-filter"></i>
                            ច្រោះ</button>
                    </div>
                    <div class="col-12 col-md-3 d-flex justify-content-end align-items-center">
                        <button id="btn-print" type="button" class="btn btn-primary float-right"><i
                                class="fa fa-print"></i>
                            បោះពុម្ភ</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="container">
        <div class="card" id="printable-area">
            <div class="card-body">
                <div>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4 text-center">
                            <img src="{{ asset('Cambodian_Red_Cross_Logo.png') }}" alt="crc-logo"
                                style="width: 120px; height: 120px;" class="mb-3">
                            <div class="khm">កាកបាទក្រហមកម្ពុជា</div>
                        </div>
                        <div class="col-4"></div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12 text-center">
                            <div class="khm">
                                បញ្ជីររាយនាមមន្រ្តីប្រតិបត្តិស្នាក់ការកណ្តាលកាកបាទក្រហមកម្ពុជា</div>
                        </div>
                    </div>
                </div>
                <table class="table table-sm table-bordered cell-center">
                    <thead>
                        <tr>
                            <th class="khm text-center font-weight-normal" colspan="1">ល.រ</th>
                            <th class="khm text-center font-weight-normal">គោត្តនាម-នាម</th>
                            <th class="khm text-center font-weight-normal" colspan="1">ភេទ</th>
                            <th class="khm text-center font-weight-normal">តួនាទី ក្នុងកក្រក</th>
                            <th class="khm text-center font-weight-normal">លេខទូរស័ព្ទ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($employees_grouped_by_department as $department_name => $employees)
                            <tr>
                                <td class="khm" colspan="6">{{ $department_name }}</td>
                            </tr>
                            @foreach ($employees as $employee)
                                <tr>
                                    <td class="khs text-center" colspan="1">{{ $loop->iteration }}</td>
                                    <td class="khs text-center">
                                        @if ($employee->title)
                                            {{ $employee->title }}
                                        @endif {{ $employee->name }}
                                    </td>
                                    <td class="khs text-center" colspan="1">{{ $employee->gender }}</td>
                                    <td class="khs text-center">
                                        @if ($employee->opt_position_name)
                                            {{ $employee->opt_position_name }}
                                        @elseif ($employee->office_name)
                                            {{ $employee->position }}{{ $employee->office_name }}
                                        @else
                                            {{ $employee->position }}
                                        @endif
                                    </td>
                                    <td class="khs text-center">{{ $employee->phone_number }}</td>
                                </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
        </div>
    </div> --}}
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#report>a").addClass("active");
            $("#report").addClass("menu-open");
            $("#employee-report>a").addClass("active");

            $('#btn-print').click(function() {
                window.print();
            })
        });
    </script>
@endsection
