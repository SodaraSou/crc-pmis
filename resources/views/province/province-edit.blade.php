@extends('layouts.app')

@section('title')
    កែប្រែរាជធានី/ខេត្ត
@endsection

@section('content')
    <livewire:province.province-edit-form :province="$province" />
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
