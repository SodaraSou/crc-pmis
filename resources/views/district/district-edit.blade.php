@extends('layouts.app')

@section('title')
    កែប្រែស្រុក/ខណ្ឌ
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <livewire:district.district-edit-form :district="$district" />
            </div>
            <div class="col-12 col-md-6">
                <livewire:district.sub-branch-edit-form :sub_branch="$sub_branch" :district_id="$district_id" />
            </div>
            <div class="col-12 col-md-6">
                <livewire:district.honorary-committee-edit-form :committee="$honorary_committee" :district_id="$district_id" />
            </div>
            <div class="col-12 col-md-6">
                <livewire:district.committee-edit-form :committee="$committee" :district_id="$district_id" />
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
