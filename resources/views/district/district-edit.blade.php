@extends('layouts.app')

@section('title')
    កែប្រែស្រុក/ខណ្ឌ
@endsection

@section('content')
    <livewire:district.district-edit-form :district="$district" />
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
