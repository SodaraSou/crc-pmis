@extends('layouts.app')

@section('title')
    បង្កើតលំដាប់អ្នកប្រើប្រាស់
@endsection

@section('content')
    @livewire('user-level.user-level-create-form')
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
