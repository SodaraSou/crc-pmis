@extends('layouts.app')

@section('title')
    កែប្រែដំណែងមន្រ្តីប្រតិបត្តិ
@endsection

@section('content')
    <div class="container">
        @if (Auth::user()->hasRole('System Manager'))
            <livewire:employee.admin.employee-position-edit-form :employee="$employee" :employee_position="$employee_position" />
        @endif
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
