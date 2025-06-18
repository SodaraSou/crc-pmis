@extends('layouts.app')

@section('title')
    បង្កើតតួនាទី
@endsection

@section('content')
    @livewire('role.role-create-form')
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#security>a").addClass("active");
            $("#security").addClass("menu-open");
            $("#role>a").addClass("active");
        });
    </script>
@endsection
