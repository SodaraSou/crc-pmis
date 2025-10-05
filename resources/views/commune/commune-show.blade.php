@extends('layouts.app')

@section('title')
    {{ $commune->kh_name }}
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-danger card-outline">
                    <div class="card-body box-profile">
                        <h3 class="profile-username text-center">{{ $commune->kh_name }}</h3>
                        <p class="text-muted text-center">{{ $commune->en_name }}</p>
                        <div class="row">
                            <div class="col-12">
                                <a href="{{ route('commune.edit', $commune->id) }}" class="btn btn-info btn-block">
                                    <i class="fa fa-pen mr-2" aria-hidden="true"></i><b>កែប្រែ</b>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <livewire:village.village-table :commune="$commune" />
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
