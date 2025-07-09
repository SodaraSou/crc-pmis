@extends('layouts.app')

@section('title')
    បង្កើតប្រវត្តិសិក្សាបុគ្គលិក
@endsection

@section('content')
    <livewire:employee.employee-education-create-form :employee="$employee"/>
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
