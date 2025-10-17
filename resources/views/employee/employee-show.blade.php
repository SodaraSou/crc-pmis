@extends('layouts.app')

@section('title')
    {{ $employee->kh_last_name }} {{ $employee->kh_first_name }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-danger card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            @if ($employee->profile_img)
                                <img class="profile-user-img img-fluid img-thumbnail" src="{{ $employee->profile_img }}"
                                    alt="User profile picture">
                            @else
                                <img class="profile-user-img img-fluid img-thumbnail" src="{{ asset('default.png') }}"
                                    alt="User profile picture">
                            @endif
                        </div>

                        <h3 class="profile-username text-center">
                            {{ $employee->kh_last_name }} {{ $employee->kh_first_name }}
                        </h3>

                        <p class="text-muted text-center">{{ $employee->en_name }}</p>

                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>ថ្នាក់មន្រ្តី</b> <a
                                    class="float-right text-dark">{{ $current_position->employee_level->kh_name }}</a>
                            </li>
                            @if ($current_position->employee_level_id == 2)
                                <li class="list-group-item">
                                    <b>សាខា</b> <a
                                        class="float-right text-dark">{{ $current_position->branch->kh_name }}</a>
                                </li>
                            @endif
                            @if ($current_position->employee_level_id == 3)
                                <li class="list-group-item">
                                    <b>អនុសាខា</b> <a
                                        class="float-right text-dark">{{ $current_position->sub_branch->kh_name }}</a>
                                </li>
                            @endif
                            @if ($current_position->employee_level_id == 4)
                                <li class="list-group-item">
                                    <b>ក្រុម</b> <a
                                        class="float-right text-dark">{{ $current_position->group->kh_name }}</a>
                                </li>
                            @endif
                            <li class="list-group-item">
                                <b>នាយកដ្ឋាន</b> <a
                                    class="float-right text-dark">{{ $current_position->department->kh_name }}</a>
                            </li>
                            @if ($current_position->office_id)
                                <li class="list-group-item">
                                    <b>ការិយាល័យ</b> <a
                                        class="float-right text-dark">{{ $current_position->office->kh_name }}</a>
                                </li>
                            @endif
                            <li class="list-group-item">
                                <b>តួនាទី</b> <a class="float-right text-dark">
                                    @if ($current_position->opt_position_name)
                                        {{ $current_position->opt_position_name }}
                                    @else
                                        @if ($employee->gender_id == 1 && $employee->current_position->position->female_kh_name)
                                            {{ $current_position->position->female_kh_name }}
                                        @else
                                            {{ $current_position->position->male_kh_name }}
                                        @endif
                                    @endif
                                </a>
                            </li>
                        </ul>
                        <div class="row g-4">
                            <div class="col-12 mb-2">
                                <a href="{{ route('employee.edit', Crypt::encrypt($employee->id)) }}"
                                    class="btn btn-info btn-block"><i class="fa fa-pen mr-1" aria-hidden="true"></i>
                                    <b>កែប្រែ</b></a>
                            </div>
                            <div class="col-12">
                                <livewire:employee.employee-delete-button :employee="$employee" />
                            </div>
                        </div>
                        {{-- <div class="row g-4">
                            <div class="col-12">
                                <a href="{{ route('employee.education.create', Crypt::encrypt($employee->id)) }}"
                                    class="btn btn-primary btn-block"><i class="fa fa-graduation-cap mr-2"
                                        aria-hidden="true"></i><b>បង្កើតប្រវត្តិសិក្សា</b></a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item nav-item-own"><a class="nav-link active" href="#info"
                                    data-toggle="tab">ព័ត៍មាន</a>
                            </li>
                            <li class="nav-item nav-item-own"><a class="nav-link" href="#timeline"
                                    data-toggle="tab">ប្រវតិ្តតួនាទី</a>
                            </li>
                            {{-- <li class="nav-item nav-item-own"><a class="nav-link" href="#education"
                                    data-toggle="tab">ប្រវត្តិការសិក្សា</a>
                            <li class="nav-item nav-item-own"><a class="nav-link" href="#job"
                                    data-toggle="tab">ប្រវត្តិការងារ</a>
                            </li> --}}
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="info">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>ឈ្មោះ</th>
                                        <td>{{ $employee->kh_last_name }} {{ $employee->kh_first_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>ឈ្មោះឡាតាំង</th>
                                        <td>{{ $employee->en_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>ភេទ</th>
                                        <td>{{ $employee->gender->kh_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>ថ្ងៃ/ខែ/ឆ្នាំកំណើត</th>
                                        <td>{{ $employee->dob }}</td>
                                    </tr>
                                    <tr>
                                        <th>ទីកន្លែងកំណើត</th>
                                        <td>
                                            <dl class="row mb-0">
                                                <dt class="col-sm-4">ភូមិ</dt>
                                                <dd class="col-sm-8">{{ $employee->bp_village->kh_name ?? 'N/A' }}</dd>

                                                <dt class="col-sm-4">ឃុំ/សង្កាត់</dt>
                                                <dd class="col-sm-8">{{ $employee->bp_commune->kh_name ?? 'N/A' }}</dd>

                                                <dt class="col-sm-4">ក្រុង/ស្រុក/ខណ្ឌ</dt>
                                                <dd class="col-sm-8">{{ $employee->bp_district->kh_name ?? 'N/A' }}</dd>

                                                <dt class="col-sm-4">រាជធានី/ខេត្ត</dt>
                                                <dd class="col-sm-8">{{ $employee->bp_province->kh_name ?? 'N/A' }}</dd>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>ស្ថានភាពគ្រួសារ</th>
                                        <td>{{ $employee->family_situation->kh_name ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>ស្ថានភាពបុគ្គលិក</th>
                                        <td>{{ $employee->employee_status->kh_name ?? 'N/A' }}</td>
                                    </tr>
                                    <tr>
                                        <th>លេខអត្តសញ្ញាណប័ណ្ខ</th>
                                        <td>{{ $employee->national_id }}</td>
                                    </tr>
                                    <tr>
                                        <th>លេខទូរស័ព្ទ</th>
                                        <td>{{ $employee->phone_number }}</td>
                                    </tr>
                                    <tr>
                                        <th>អុីម៉ែល</th>
                                        <td>{{ $employee->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>អាស័យដ្ឋានបច្ចុប្បន្ន</th>
                                        <td>
                                            <dl class="row mb-0">
                                                @if ($employee->ad_street_number)
                                                    <dt class="col-sm-4">លេខផ្លូវ</dt>
                                                    <dd class="col-sm-8">{{ $employee->ad_street_number }}</dd>
                                                @endif
                                                @if ($employee->ad_street_name)
                                                    <dt class="col-sm-4">ឈ្មោះផ្លូវ</dt>
                                                    <dd class="col-sm-8">{{ $employee->ad_street_name }}</dd>
                                                @endif
                                                @if ($employee->ad_house_number)
                                                    <dt class="col-sm-4">ផ្ទះលេខ/dt>
                                                    <dd class="col-sm-8">{{ $employee->ad_house_number }}</dd>
                                                @endif

                                                <dt class="col-sm-4">ភូមិ</dt>
                                                <dd class="col-sm-8">{{ $employee->ad_village->kh_name ?? 'N/A' }}</dd>

                                                <dt class="col-sm-4">ឃុំ/សង្កាត់</dt>
                                                <dd class="col-sm-8">{{ $employee->ad_commune->kh_name ?? 'N/A' }}</dd>

                                                <dt class="col-sm-4">ក្រុង/ស្រុក/ខណ្ឌ</dt>
                                                <dd class="col-sm-8">{{ $employee->ad_district->kh_name ?? 'N/A' }}</dd>

                                                <dt class="col-sm-4">រាជធានី/ខេត្ត</dt>
                                                <dd class="col-sm-8">{{ $employee->ad_province->kh_name ?? 'N/A' }}</dd>
                                            </dl>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="tab-pane" id="timeline">
                                <div class="timeline timeline-inverse">
                                    @foreach ($positions as $position)
                                        <div class="time-label">
                                            @if ($position->end_date)
                                                <span class="bg-success">
                                                    {{ $position->start_date }} ដល់
                                                    {{ $position->end_date }}
                                                </span>
                                            @else
                                                <span class="bg-primary">
                                                    {{ $position->start_date }}
                                                </span>
                                            @endif
                                        </div>
                                        <div>
                                            @if ($position->end_date)
                                                <i class="fas fa-suitcase bg-success"></i>
                                            @else
                                                <i class="fas fa-suitcase bg-primary"></i>
                                            @endif
                                            <div class="timeline-item">
                                                <h3 class="timeline-header">
                                                    @if ($employee->gender_id == 1 && $position->position->female_kh_name)
                                                        {{ $position->position->female_kh_name }}
                                                    @else
                                                        {{ $position->position->male_kh_name }}
                                                    @endif
                                                </h3>
                                                <div class="timeline-body">
                                                    @if (!$position->sub_branch_id)
                                                        <div>
                                                            សាខា: {{ $position->branch->kh_name }}
                                                        </div>
                                                    @else
                                                        <div>
                                                            អនុសាខា: {{ $position->sub_branch->kh_name }}
                                                        </div>
                                                    @endif
                                                    <div>
                                                        នាយកដ្ឋាន: {{ $position->department->kh_name }}
                                                    </div>
                                                    @if ($position->office_id)
                                                        <div>
                                                            ការិយាល័យ: {{ $position->office->kh_name }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @if ($positions->count() > 0)
                                        <div>
                                            <i class="far fa-clock bg-gray"></i>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            {{-- <div class="tab-pane" id="education">
                                <div class="timeline timeline-inverse">
                                    @foreach ($educations as $education)
                                        <div class="time-label">
                                            <span class="bg-success">
                                                {{ $education->start_year }} ដល់ {{ $education->end_year }}
                                            </span>
                                        </div>
                                        <div>
                                            <i class="fa fa-graduation-cap bg-success"></i>
                                            <div class="timeline-item">
                                                <h3 class="timeline-header">{{ $education->degree_type->kh_name }}</h3>
                                                <div class="timeline-body">
                                                    <div>
                                                        ជំនាញ: {{ $education->field_of_study }}
                                                    </div>
                                                    <div>
                                                        គ្រឹះស្ថានសិក្សា: {{ $education->institution }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @if ($educations->count() > 0)
                                        <div>
                                            <i class="far fa-clock bg-gray"></i>
                                        </div>
                                    @endif
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#employee>a").addClass("active");
            $("#employee").addClass("menu-open");
            $("#employee-list>a").addClass("active");
        });
    </script>
@endsection
