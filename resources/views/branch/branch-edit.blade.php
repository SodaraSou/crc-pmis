@extends('layouts.app')

@section('title')
    កែប្រែសាខា
@endsection

@section('content')
    <livewire:branch.branch-edit-form :branch="$branch" />
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#setting>a").addClass("active");
            $("#setting").addClass("menu-open");
            $("#branch>a").addClass("active");
        });
    </script>
@endsection
