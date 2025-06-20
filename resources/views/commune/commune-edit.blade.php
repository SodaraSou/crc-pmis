@extends('layouts.app')

@section('title')
    កែប្រែឃុំ/សង្កាត់
@endsection

@section('content')
    <livewire:commune.commune-edit-form :commune="$commune" />
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
