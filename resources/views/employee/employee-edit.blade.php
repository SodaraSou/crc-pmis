@extends('layouts.app')

@section('title')
    កែប្រែបុគ្គលិក
@endsection

@section('content')
    <livewire:employee.employee-edit-form :employee="$employee"/>
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
