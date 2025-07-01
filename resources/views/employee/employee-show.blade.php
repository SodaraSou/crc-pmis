@extends('layouts.app')

@section('title')
    {{ $employee->kh_name }}
@endsection

@section('content')
    <div class="row">
        <div class="col-md-3">
            <!-- Profile Image -->
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
                            <b>ដំណែង</b> <a class="float-right">{{$employee->positions[0]->kh_name}}</a>
                        </li>
                    </ul>
                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                </div>
            </div>

            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">About Me</h3>
                </div>
                <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i> Education</strong>

                    <p class="text-muted">
                        B.S. in Computer Science from the University of Tennessee at Knoxville
                    </p>

                    <hr>

                    <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                    <p class="text-muted">Malibu, California</p>

                    <hr>

                    <strong><i class="fas fa-pencil-alt mr-1"></i> Skills</strong>

                    <p class="text-muted">
                        <span class="tag tag-danger">UI Design</span>
                        <span class="tag tag-success">Coding</span>
                        <span class="tag tag-info">Javascript</span>
                        <span class="tag tag-warning">PHP</span>
                        <span class="tag tag-primary">Node.js</span>
                    </p>

                    <hr>

                    <strong><i class="far fa-file-alt mr-1"></i> Notes</strong>

                    <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam
                        fermentum enim neque.</p>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header p-2">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="nav-link active" href="#timeline" data-toggle="tab">Timeline</a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#activity" data-toggle="tab">Activity</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="timeline">
                            <div class="timeline timeline-inverse">
                                @foreach($employee->positions as $employee_postion)
                                    {{--                                    <div class="time-label">--}}
                                    {{--                                    <span class="bg-primary">--}}
                                    {{--                                      {{$employee_postion->pivot->start_date}}--}}
                                    {{--                                    </span>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <div>--}}
                                    {{--                                        <i class="fas fa-suitcase bg-primary"></i>--}}
                                    {{--                                        <div class="timeline-item">--}}
                                    {{--                                            <h3 class="timeline-header">{{$employee_postion->kh_name}}</h3>--}}
                                    {{--                                            <div class="timeline-body">--}}
                                    {{--                                                <div class="mb-2">--}}
                                    {{--                                                    <i class="fa fa-file-alt"></i>--}}
                                    {{--                                                    នាយកដ្ឋាន: {{$employee_postion->}}--}}
                                    {{--                                                </div>--}}
                                    {{--                                                <div>--}}
                                    {{--                                                    <i class="fa fa-file-alt"></i> ការិយាល័យ:--}}
                                    {{--                                                </div>--}}
                                    {{--                                            </div>--}}
                                    {{--                                            <div class="timeline-footer">--}}
                                    {{--                                                <a href="{{route('home')}}" class="btn btn-success"><i--}}
                                    {{--                                                        class="fa fa-file-alt bg-primary"></i> កុងត្រា</a>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                    {{--                                    </div>--}}
                                    {{--                                    <div>--}}
                                    {{--                                        <i class="far fa-clock bg-gray"></i>--}}
                                    {{--                                    </div>--}}
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
