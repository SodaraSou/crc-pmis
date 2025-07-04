@extends('layouts.app')

@section('title')
    បង្កេីតការិយាល័យ
@endsection

@section('content')
    <livewire:office.office-create-form :department="$department"/>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $("#sidebar li a").removeClass("active");
            $("#setting>a").addClass("active");
            $("#setting").addClass("menu-open");
            $("#department>a").addClass("active");
        });
    </script>
@endsection
