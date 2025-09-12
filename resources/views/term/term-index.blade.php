@extends('layouts.app')

@section('title')
    អាណត្តិ
@endsection

@section('content')
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#term>a").addClass("active");
            $("#term").addClass("menu-open");
            $("#term-list>a").addClass("active");
        });
    </script>
@endsection
