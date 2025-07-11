@extends('layouts.app')

@section('title')
    {{ $department->kh_name }}
@endsection

@section('content')
    <livewire:office.office-table :department="$department"/>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $("#sidebar li a").removeClass("active");
            $("#setting>a").addClass("active");
            $("#setting").addClass("menu-open");
            $("#department>a").addClass("active");
        });
    </script>
@endsection
