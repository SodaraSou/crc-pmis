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
                        <img class="profile-user-img img-fluid img-circle"
                             src="{{$employee->profile_img}}"
                             alt="User profile picture">
                    </div>

                    <h3 class="profile-username text-center">{{$employee->kh_name}}</h3>

                    <p class="text-muted text-center">{{$employee->en_name}}</p>

                    <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>ថ្នាក់បុគ្គលិក</b> <a class="float-right">{{$employee->employee_level->kh_name}}</a>
                        </li>
                        @if($employee->employee_level_id > 1)
                            <li class="list-group-item">
                                <b>សាខា</b> <a class="float-right">{{$employee->branch->kh_name}}</a>
                            </li>
                        @endif
                        @if($employee->employee_level_id == 3)
                            <li class="list-group-item">
                                <b>អនុសាខា</b> <a class="float-right">{{$employee->sub_branch->kh_name}}</a>
                            </li>
                        @endif
                        <li class="list-group-item">
                            <b>នាយកដ្ឋាន</b> <a class="float-right">{{$employee->department->kh_name}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>ការិយាល័យ</b> <a class="float-right">{{$employee->office->kh_name}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>ដំណែង</b> <a class="float-right">{{$current_position->kh_name ?? 'N/A'}}</a>
                        </li>
                    </ul>
                    <div class="row g-4">
                        <div class="col-6">
                            <a href="{{route('employee.edit', Crypt::encrypt($employee->id))}}"
                               class="btn btn-info btn-block"><i class="fa fa-pen mr-1" aria-hidden="true"></i>
                                <b>កែប្រែ</b></a>
                        </div>
                        <div class="col-6">
                            <a href="#" class="btn btn-danger btn-block"><i class="fa fa-trash mr-2"
                                                                            aria-hidden="true"></i><b>លុប</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link" href="#info"
                                                data-toggle="tab">ព័ត៍មាន</a>
                        </li>
                        <li class="nav-item"><a class="nav-link active" href="#timeline"
                                                data-toggle="tab">ប្រវតិ្តដំណែង</a>
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
                        <div class="active tab-pane" id="timeline">
                            <div class="timeline timeline-inverse">
                                <?php
                                dd($positions);
                                ?>
                                @foreach($positions as $employee_postion)
                                    <div class="time-label">
                                        <span class="bg-primary">
                                            {{$employee_postion->start_date}}
                                        </span>
                                    </div>
                                    <div>
                                        <i class="fas fa-suitcase bg-primary"></i>
                                        <div class="timeline-item">
                                            <h3 class="timeline-header">{{$employee_postion->position->kh_name}}</h3>
                                            <div class="timeline-body">
                                                <div class="mb-2">
                                                    នាយកដ្ឋាន: {{$employee_postion->department->kh_name}}
                                                </div>
                                                <div>
                                                    ការិយាល័យ: {{$employee_postion->office->kh_name}}
                                                </div>
                                            </div>
                                            <div class="timeline-footer">
                                                <a href="{{route('home')}}" class="btn btn-success"><i
                                                        class="fa fa-file-alt mr-2"></i>កុងត្រា</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <i class="far fa-clock bg-gray"></i>
                                    </div>
                                @endforeach
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
