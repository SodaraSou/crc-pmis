@extends('layouts.app')

@section('title')
    មុខងារប្រព័ន្ធ
@endsection

@section('content')
    @livewire('permission.permission-table')
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#security>a").addClass("active");
            $("#security").addClass("menu-open");
            $("#permission>a").addClass("active");
        });
    </script>
@endsection
