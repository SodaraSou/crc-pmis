@extends('layouts.app')

@section('title')
    {{ $province->kh_name }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-danger card-outline">
                    <div class="card-body box-profile">
                        <h3 class="profile-username text-center">{{ $province->kh_name }}</h3>
                        <p class="text-muted text-center">{{ $province->en_name }}</p>
                        <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                                <b>{{ $province->branch->kh_name }}</b>
                            </li>
                            <li class="list-group-item">
                                <b>
                                    {{ $province->branch->committees()->where('committee_type_id', 1)->first()->kh_name }}
                                </b>
                            </li>
                            <li class="list-group-item">
                                <b>
                                    {{ $province->branch->committees()->where('committee_type_id', 2)->first()->kh_name }}
                                </b>
                            </li>
                        </ul>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('province.edit', $province->id) }}" class="btn btn-info btn-block">
                                    <i class="fa fa-pen mr-2" aria-hidden="true"></i><b>កែប្រែ</b>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <livewire:district.district-table :province="$province" />
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#setting>a").addClass("active");
            $("#setting").addClass("menu-open");
            $("#province>a").addClass("active");
        });
    </script>
@endsection
