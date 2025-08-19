@extends('layouts.app')

@section('title')
    កែប្រែគណៈកម្មាធិការ
@endsection

@section('content')
    <livewire:committee.committee-edit-form :committee="$committee" />
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $("#setting>a").addClass("active");
            $("#setting").addClass("menu-open");
            $("#committee>a").addClass("active");
        })
    </script>
@endsection
