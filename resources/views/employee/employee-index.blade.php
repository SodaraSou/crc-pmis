@extends('layouts.app')

@section('title')
    តារាងមន្រ្តីប្រតិបត្តិ
@endsection

@section('content')
    <div class="container">
        <livewire:employee.employee-table />
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
