@extends('layouts.app')

@section('title')
    {{ $branch->kh_name }}
@endsection

@section('content')
    <livewire:sub-branch.sub-branch-table :branch="$branch" />
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#setting>a").addClass("active");
            $("#setting").addClass("menu-open");
            $("#branch>a").addClass("active");
        });
    </script>
@endsection
