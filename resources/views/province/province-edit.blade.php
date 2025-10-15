@extends('layouts.app')

@section('title')
    កែប្រែរាជធានី/ខេត្ត
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-6">
                <livewire:province.province-edit-form :province="$province" />
            </div>
            <div class="col-12 col-md-6">
                <livewire:province.branch-edit-form :branch="$branch" :province_id="$province_id" />
            </div>
            <div class="col-12 col-md-6">
                <livewire:province.honorary-committee-edit-form :committee="$honorary_committee" :province_id="$province_id" />
            </div>
            <div class="col-12 col-md-6">
                <livewire:province.committee-edit-form :committee="$committee" :province_id="$province_id" />
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
