@extends('layouts.app')

@section('title')
    {{ $province->kh_name }}
@endsection

@section('content')
    <livewire:district.district-table :province="$province" />
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
