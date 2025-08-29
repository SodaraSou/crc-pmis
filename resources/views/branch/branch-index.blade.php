@extends('layouts.app')

@section('title')
    សាខា
@endsection

@section('content')
    @livewire('branch.branch-table')
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#branch>a").addClass("active");
        });
    </script>
@endsection
