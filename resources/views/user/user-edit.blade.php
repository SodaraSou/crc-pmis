@extends('layouts.app')

@section('title')
    កែប្រែអ្នកប្រើប្រាស់
@endsection

@section('content')
    <livewire:user.user-edit-form :user="$user" />
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#security>a").addClass("active");
            $("#security").addClass("menu-open");
            $("#user>a").addClass("active");
        });
    </script>
@endsection
