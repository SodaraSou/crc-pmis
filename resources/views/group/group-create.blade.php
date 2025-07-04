@extends('layouts.app')

@section('title')
    បង្កើតក្រុមអនុសាខា
@endsection

@section('content')
    <livewire:group.group-create-form :sub_branch="$sub_branch"/>
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
