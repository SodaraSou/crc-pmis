@extends('layouts.app')

@section('title')
    កែប្រែលំដាប់អ្នកប្រើប្រាស់
@endsection

@section('content')
    <livewire:user-level.user-level-edit-form :user_level="$user_level" />
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#security>a").addClass("active");
            $("#security").addClass("menu-open");
            $("#user-level>a").addClass("active");
        });
    </script>
@endsection
