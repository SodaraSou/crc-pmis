@extends('layouts.app')

@section('title')
    កែប្រែភូមិ
@endsection

@section('content')
    <livewire:village.village-edit-form :village="$village" />
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#setting>a").addClass("active");
            $("#setting").addClass("menu-open");
            $("#province>a").addClass("active");
        });
    </script>
@endsection
