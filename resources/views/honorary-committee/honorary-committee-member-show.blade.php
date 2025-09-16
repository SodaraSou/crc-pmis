@extends('layouts.app')

@section('title')
    {{ $member->kh_name }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <div class="card card-danger card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            {{--                        <img class="profile-user-img img-fluid img-circle" --}}
                            {{--                             src="{{$member->profile_img}}" --}}
                            {{--                             alt="User profile picture"> --}}
                        </div>
                        <h3 class="profile-username text-center">{{ $member->kh_name }}</h3>
                        <p class="text-muted text-center">{{ $member->en_name }}</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            @php
                                $today = now()->toDateString();
                                $current_committee = $member
                                    ->committee_members()
                                    ->where('active', true)
                                    ->whereHas('branch_term', function ($bt) use ($today) {
                                        $bt->where('active', true)
                                            ->where('start_date', '<=', $today)
                                            ->where('end_date', '>=', $today);
                                    })
                                    ->orWhereHas('sub_branch_term', function ($sbt) use ($today) {
                                        $sbt->where('active', true)
                                            ->where('start_date', '<=', $today)
                                            ->where('end_date', '>=', $today);
                                    })
                                    ->first();
                            @endphp
                            @if ($current_committee)
                                <li class="list-group-item">
                                    <b>{{ $current_committee->committee->kh_name }}</b>
                                </li>
                                <li class="list-group-item">
                                    <b>អាណត្តិបច្ចុប្បន្ន: {{ $current_committee->branch_term->kh_name }}</b>
                                </li>
                                <li class="list-group-item">
                                    <b>តួនាទី: {{ $current_committee->committee_position->kh_name }}</b>
                                </li>
                            @endif
                        </ul>
                        <div class="row g-4 mb-3">
                            <div class="col-12">
                                <a href="{{ route('honorary-committee-member.edit', $member->id) }}"
                                    class="btn btn-info btn-block">
                                    <i class="fa fa-pen mr-2" aria-hidden="true"></i><b>កែប្រែ</b>
                                </a>
                            </div>
                            {{--                        <div class="col-6"> --}}
                            {{--                            <a href="#" class="btn btn-danger btn-block"><i class="fa fa-trash mr-2" --}}
                            {{--                                                                            aria-hidden="true"></i><b>លុប</b></a> --}}
                            {{--                        </div> --}}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header p-2">
                        <ul class="nav nav-pills">
                            <li class="nav-item nav-item-own"><a class="nav-link active" href="#info"
                                    data-toggle="tab">ព័ត៍មាន</a>
                            </li>
                            <li class="nav-item nav-item-own"><a class="nav-link" href="#timeline"
                                    data-toggle="tab">ប្រវតិ្តអាណត្តិ</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="active tab-pane" id="info">
                                <table class="table table-bordered">
                                    <tr>
                                        <th>ឈ្មោះ</th>
                                        <td>{{ $member->kh_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>ឈ្មោះឡាតាំង</th>
                                        <td>{{ $member->en_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>ភេទ</th>
                                        <td>{{ $member->gender->kh_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>ទីកន្លែងកំណើត</th>
                                        <td>
                                            <dl class="row mb-0">
                                                <dt class="col-sm-4">ភូមិ</dt>
                                                <dd class="col-sm-8">{{ $member->bp_village->kh_name }}</dd>

                                                <dt class="col-sm-4">ឃុំ/សង្កាត់</dt>
                                                <dd class="col-sm-8">{{ $member->bp_commune->kh_name }}</dd>

                                                <dt class="col-sm-4">ក្រុង/ស្រុក/ខណ្ឌ</dt>
                                                <dd class="col-sm-8">{{ $member->bp_district->kh_name }}</dd>

                                                <dt class="col-sm-4">រាជធានី/ខេត្ត</dt>
                                                <dd class="col-sm-8">{{ $member->bp_province->kh_name }}</dd>
                                            </dl>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>អាស័យដ្ឋានបច្ចុប្បន្ន</th>
                                        <td>
                                            <dl class="row mb-0">
                                                <dt class="col-sm-4">ភូមិ</dt>
                                                <dd class="col-sm-8">{{ $member->ad_village->kh_name }}</dd>

                                                <dt class="col-sm-4">ឃុំ/សង្កាត់</dt>
                                                <dd class="col-sm-8">{{ $member->ad_commune->kh_name }}</dd>

                                                <dt class="col-sm-4">ក្រុង/ស្រុក/ខណ្ឌ</dt>
                                                <dd class="col-sm-8">{{ $member->ad_district->kh_name }}</dd>

                                                <dt class="col-sm-4">រាជធានី/ខេត្ត</dt>
                                                <dd class="col-sm-8">{{ $member->ad_province->kh_name }}</dd>
                                            </dl>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="tab-pane" id="timeline">
                                <div class="timeline timeline-inverse">
                                    @php
                                        $terms = $member->committee_members()->where('active', true)->get();
                                    @endphp
                                    @foreach ($terms as $term)
                                        <div class="time-label">
                                            @if ($term->committee->committee_level_id == 1)
                                                <span class="bg-success">
                                                    @if ($term->committee->committee_level_id == 1)
                                                        {{ $term->branch_term->kh_name }}
                                                    @elseif ($term->committee->committee_level_id == 2)
                                                        {{ $term->sub_branch_term->kh_name }}
                                                    @endif
                                                </span>
                                            @endif
                                        </div>
                                        <div>
                                            <i class="fas fa-suitcase bg-success"></i>
                                            <div class="timeline-item">
                                                <h3 class="timeline-header">{{ $term->committee->kh_name }}</h3>
                                                <div class="timeline-body">
                                                    <div>
                                                        រយ:ពេល: {{ $term->branch_term->start_date }} ដល់
                                                        {{ $term->branch_term->end_date }}
                                                    </div>
                                                    <div>
                                                        តួនាទី: {{ $term->committee_position->kh_name }}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                    @if ($terms->count() > 0)
                                        <div>
                                            <i class="far fa-clock bg-gray"></i>
                                        </div>
                                    @endif
                                </div>
                            </div>
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
            $("#honorary-committee>a").addClass("active");
            $("#honorary-committee").addClass("menu-open");
            $("#honorary-committee-member-list>a").addClass("active");
        });
    </script>
@endsection
