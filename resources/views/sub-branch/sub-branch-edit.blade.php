@extends('layouts.app')

@section('title')
    កែប្រែអនុសាខា
@endsection

@section('content')
    <livewire:sub-branch.sub-branch-edit-form :sub_branch="$sub_branch" />
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
