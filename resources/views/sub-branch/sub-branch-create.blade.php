@extends('layouts.app')

@section('title')
    បង្កើតអនុសាខា
@endsection

@section('content')
    <livewire:sub-branch.sub-branch-create-form :branch="$branch" />
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
