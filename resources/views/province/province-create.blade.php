@extends('layouts.app')

@section('title')
    បង្កើតរាជធានី/ខេត្ត
@endsection

@section('content')
    @livewire('province.province-create-form')
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
