@extends('layouts.app')

@section('title')
    រាជធានី/ខេត្ត
@endsection

@section('content')
    @livewire('province.province-table')
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#setting>a").addClass("active");
            $("#setting").addClass("menu-open");
            $("#province>a").addClass("active");
        });
    </script>
@endsection
