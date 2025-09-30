@extends('layouts.app')

@section('title')
    បង្កើតដំណែងបុគ្គលិក
@endsection

@section('content')
    <div class="container">
        <livewire:employee.admin.employee-positon-create-form :employee="$employee" />
        {{-- <livewire:employee.employee-position-swap-form :employee="$employee" /> --}}
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
