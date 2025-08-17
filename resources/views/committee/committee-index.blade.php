@extends('layouts.app')

@section('title')
    បញ្ជីគណៈកម្មាធិការ
@endsection

@section('content')
    @livewire('committee.committee-table')
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $("#sidebar li a").removeClass("active");
            $("#setting>a").addClass("active");
            $("#setting").addClass("menu-open");
            $("#committee>a").addClass("active");
        });
    </script>
@endsection
