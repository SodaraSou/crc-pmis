@extends('layouts.app')

@section('title')
    បង្កើតបុគ្គលិក
@endsection

@section('content')
    @livewire('employee.employee-create-form')
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $("#sidebar li a").removeClass("active");
            $("#employee>a").addClass("active");
            $("#employee").addClass("menu-open");
            $("#employee-create>a").addClass("active");
        });
    </script>
@endsection
