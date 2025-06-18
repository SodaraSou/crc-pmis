@extends('layouts.app')

@section('title')
    កែប្រែតួនាទី
@endsection

@section('content')
    <livewire:role.role-edit-form :role="$role" />
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
