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
            $("#setting>a").addClass("active");
            $("#setting").addClass("menu-open");
            $("#term>a").addClass("active");
        });
    </script>
@endsection
