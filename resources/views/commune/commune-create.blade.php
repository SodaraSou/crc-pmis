@extends('layouts.app')

@section('title')
    បង្កើតឃុំ/សង្កាត់
@endsection

@section('content')
    <livewire:commune.commune-create-form :district="$district" />
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
