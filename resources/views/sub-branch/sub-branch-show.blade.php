@extends('layouts.app')

@section('title')
    {{ $sub_branch->kh_name }}
@endsection

@section('content')
    <livewire:group.group-table :sub_branch="$sub_branch"/>
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
