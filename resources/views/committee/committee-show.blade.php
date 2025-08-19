@extends('layouts.app')

@section('title')
    បញ្ជីអាណត្តិ
@endsection

@section('content')
    <livewire:term.term-table :committee="$committee"/>
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
