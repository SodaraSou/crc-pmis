@extends('layouts.app')

@section('title')
    កែប្រែក្រុមអនុសាខា
@endsection

@section('content')
    <livewire:group.group-edit-form :group="$group"/>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $("#sidebar li a").removeClass("active");
            $("#setting>a").addClass("active");
            $("#setting").addClass("menu-open");
            $("#branch>a").addClass("active");
        });
    </script>
@endsection
