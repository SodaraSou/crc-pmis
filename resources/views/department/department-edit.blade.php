@extends('layouts.app')

@section('title')
    កែប្រែនាយកដ្ឋាន
@endsection

@section('content')
    <livewire:department.department-edit-form :department="$department" />
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#setting>a").addClass("active");
            $("#setting").addClass("menu-open");
            $("#department>a").addClass("active");
        });
    </script>
@endsection
