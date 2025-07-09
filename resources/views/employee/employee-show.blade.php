@extends('layouts.app')

@section('title')
    {{ $employee->kh_name }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                    <div class="text-center">
                        {{--                        <img class="profile-user-img img-fluid img-circle"--}}
                        {{--                             src="{{$employee->profile_img}}"--}}
                        {{--                             alt="User profile picture">--}}
                    </div>

                    <h3 class="profile-username text-center">{{$employee->kh_name}}</h3>

                    <p class="text-muted text-center">{{$employee->en_name}}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>ថ្នាក់បុគ្គលិក</b> <a class="float-right">{{$employee->employee_level->kh_name}}</a>
                        </li>
                        @if($employee->employee_level_id == 2)
                            <li class="list-group-item">
                                <b>សាខា</b> <a class="float-right">{{$employee->branch->kh_name}}</a>
                            </li>
                        @endif
                        @if($employee->employee_level_id == 3)
                            <li class="list-group-item">
                                <b>អនុសាខា</b> <a class="float-right">{{$employee->sub_branch->kh_name}}</a>
                            </li>
                        @endif
                        @if($employee->employee_level_id == 4)
                            <li class="list-group-item">
                                <b>ក្រុម</b> <a class="float-right">{{$employee->group->kh_name}}</a>
                            </li>
                        @endif
                        <li class="list-group-item">
                            <b>នាយកដ្ឋាន</b> <a class="float-right">{{$employee->department->kh_name}}</a>
                        </li>
                        @if($employee->office_id)
                            <li class="list-group-item">
                                <b>ការិយាល័យ</b> <a class="float-right">{{$employee->office->kh_name}}</a>
                            </li>
                        @endif
                        <li class="list-group-item">
                            <b>តួនាទី</b> <a class="float-right">{{$employee->current_position->position->kh_name}}</a>
                        </li>
                    </ul>
                    <div class="row g-4 mb-3">
                        <div class="col-12">
                            <a href="{{route('employee.edit', Crypt::encrypt($employee->id))}}"
                               class="btn btn-info btn-block"><i class="fa fa-pen mr-1" aria-hidden="true"></i>
                                <b>កែប្រែ</b></a>
                        </div>
                        {{--                        <div class="col-6">--}}
                        {{--                            <a href="#" class="btn btn-danger btn-block"><i class="fa fa-trash mr-2"--}}
                        {{--                                                                            aria-hidden="true"></i><b>លុប</b></a>--}}
                        {{--                        </div>--}}
                    </div>
                    <div class="row g-4 mb-3">
                        <div class="col-12">
                            <a href="{{route('employee.position.swap', Crypt::encrypt($employee->id))}}"
                               class="btn btn-success btn-block"><i class="fa fa-suitcase mr-2"
                                                                    aria-hidden="true"></i><b>ផ្លាស់តួនាទី</b></a>
                        </div>
                    </div>
                    <div class="row g-4">
                        <div class="col-12">
                            <a href="{{route('employee.education.create', Crypt::encrypt($employee->id))}}"
                               class="btn btn-primary btn-block"><i class="fa fa-graduation-cap mr-2"
                                                                    aria-hidden="true"></i><b>បង្កើតប្រវត្តិសិក្សា</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#info"
                                                data-toggle="tab">ព័ត៍មាន</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#timeline"
                                                data-toggle="tab">ប្រវតិ្តតួនាទី</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#activity"
                                                data-toggle="tab">ប្រវត្តិការសិក្សា</a>
                        <li class="nav-item"><a class="nav-link" href="#job"
                                                data-toggle="tab">ប្រវត្តិការងារ</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="info">
                            <table class="table table-bordered">
                                <tr>
                                    <th>ឈ្មោះ</th>
                                    <td>{{ $employee->kh_name }}</td>
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
                                            <dd class="col-sm-8">{{ $employee->bp_village->kh_name }}</dd>

                                            <dt class="col-sm-4">ឃុំ/សង្កាត់</dt>
                                            <dd class="col-sm-8">{{ $employee->bp_commune->kh_name }}</dd>

                                            <dt class="col-sm-4">ក្រុង/ស្រុក/ខណ្ឌ</dt>
                                            <dd class="col-sm-8">{{ $employee->bp_district->kh_name }}</dd>

                                            <dt class="col-sm-4">រាជធានី/ខេត្ត</dt>
                                            <dd class="col-sm-8">{{ $employee->bp_province->kh_name }}</dd>
                                        </dl>
                                    </td>
                                </tr>
                                <tr>
                                    <th>ស្ថានភាពគ្រួសារ</th>
                                    <td>{{ $employee->family_situation->kh_name }}</td>
                                </tr>
                                <tr>
                                    <th>ស្ថានភាពបុគ្គលិក</th>
                                    <td>{{ $employee->employee_status->kh_name }}</td>
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
                                            @if($employee->ad_street_number)
                                                <dt class="col-sm-4">លេខផ្លូវ</dt>
                                                <dd class="col-sm-8">{{ $employee->ad_street_number }}</dd>
                                            @endif
                                            @if($employee->ad_street_name)
                                                <dt class="col-sm-4">ឈ្មោះផ្លូវ</dt>
                                                <dd class="col-sm-8">{{ $employee->ad_street_name }}</dd>
                                            @endif
                                            @if($employee->ad_house_number)
                                                <dt class="col-sm-4">ផ្ទះលេខ/dt>
                                                <dd class="col-sm-8">{{ $employee->ad_house_number }}</dd>
                                            @endif

                                            <dt class="col-sm-4">ភូមិ</dt>
                                            <dd class="col-sm-8">{{ $employee->ad_village->kh_name }}</dd>

                                            <dt class="col-sm-4">ឃុំ/សង្កាត់</dt>
                                            <dd class="col-sm-8">{{ $employee->ad_commune->kh_name }}</dd>

                                            <dt class="col-sm-4">ក្រុង/ស្រុក/ខណ្ឌ</dt>
                                            <dd class="col-sm-8">{{ $employee->ad_district->kh_name }}</dd>

                                            <dt class="col-sm-4">រាជធានី/ខេត្ត</dt>
                                            <dd class="col-sm-8">{{ $employee->ad_province->kh_name }}</dd>
                                        </dl>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="tab-pane" id="timeline">
                            {{--                            <div class="text-right">--}}
                            {{--                                <a href="{{ route('employee.position.create', Crypt::encrypt($employee->id)) }}"--}}
                            {{--                                   class="btn btn-success"><i--}}
                            {{--                                        class="fa fa-plus mr-1"></i>--}}
                            {{--                                    បង្កើត--}}
                            {{--                                </a>--}}
                            {{--                            </div>--}}
                            <div class="timeline timeline-inverse">
                                @foreach($positions as $employee_postion)
                                    <div class="time-label">
                                        @if($employee_postion->pivot->end_date)
                                            <span class="bg-success">
                                                {{$employee_postion->pivot->start_date}} ដល់ {{$employee_postion->pivot->end_date}}
                                            </span>
                                        @else
                                            <span class="bg-primary">
                                                {{$employee_postion->pivot->start_date}}
                                            </span>
                                        @endif
                                    </div>
                                    <div>
                                        @if($employee_postion->pivot->end_date)
                                            <i class="fas fa-suitcase bg-success"></i>
                                        @else
                                            <i class="fas fa-suitcase bg-primary"></i>
                                        @endif
                                        <div class="timeline-item">
                                            <h3 class="timeline-header">{{$employee_postion->kh_name}}</h3>
                                            <div class="timeline-body">
                                                @if(!$employee_postion->pivot->sub_branch_id)
                                                    <div>
                                                        សាខា: {{$employee_postion->pivot->branch->kh_name}}
                                                    </div>
                                                @else
                                                    <div>
                                                        អនុសាខា: {{$employee_postion->pivot->sub_branch->kh_name}}
                                                    </div>
                                                @endif
                                                <div>
                                                    នាយកដ្ឋាន: {{$employee_postion->pivot->department->kh_name}}
                                                </div>
                                                @if($employee_postion->pivot->office_id)
                                                    <div>
                                                        ការិយាល័យ: {{$employee_postion->pivot->office->kh_name}}
                                                    </div>
                                                @endif
                                            </div>
                                            {{--                                            <div class="timeline-footer">--}}
                                            {{--                                                <a href="{{route('home')}}" class="btn btn-success"><i--}}
                                            {{--                                                        class="fa fa-file-alt mr-2"></i>កុងត្រា</a>--}}
                                            {{--                                                <a href="{{ route('employee.position.edit', [Crypt::encrypt($employee_postion->pivot->employee_id), Crypt::encrypt($employee_postion->pivot->id)]) }}"--}}
                                            {{--                                                   class="btn btn-info">--}}
                                            {{--                                                    <i class="fa fa-pen mr-2"></i>កែប្រែ--}}
                                            {{--                                                </a>--}}
                                            {{--                                            </div>--}}
                                        </div>
                                    </div>
                                @endforeach
                                @if($positions->count() > 0)
                                    <div>
                                        <i class="far fa-clock bg-gray"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="tab-pane" id="activity">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $("#sidebar li a").removeClass("active");
            $("#employee>a").addClass("active");
            $("#employee").addClass("menu-open");
            $("#employee-list>a").addClass("active");
        });
    </script>
@endsection
