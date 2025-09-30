@extends('layouts.app')

@section('title')
    កែប្រែមន្រ្តីប្រតិបត្តិ
@endsection

@section('content')
    <div class="container">
        <livewire:employee.employee-edit-form :employee="$employee" />
        <livewire:employee.employee-position-table :employee="$employee" />
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#employee>a").addClass("active");
            $("#employee").addClass("menu-open");
            $("#employee-list>a").addClass("active");
        });
    </script>
@endsection
