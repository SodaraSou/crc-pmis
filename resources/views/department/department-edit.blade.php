@extends('layouts.app')

@section('title')
    កែប្រែនាយកដ្ឋាន
@endsection

@section('content')
    <div class="container">
        <livewire:department.department-edit-form :department="$department" />
    </div>
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
