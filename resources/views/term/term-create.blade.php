@extends('layouts.app')

@section('title')
    បង្កើតអាណត្តិ
@endsection

@section('content')
    <livewire:term.term-create-form :committee="$committee" />
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
