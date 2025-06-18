@extends('layouts.app')

@section('title')
    នាយកដ្ឋាន
@endsection

@section('content')
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
