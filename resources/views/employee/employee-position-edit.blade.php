@extends('layouts.app')

@section('title')
    កែប្រែដំណែងបុគ្គលិក
@endsection

@section('content')
    <livewire:employee.employee-position-edit :employee="$employee" :employee_position="$employee_position"/>
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
