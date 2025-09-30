@extends('layouts.app')

@section('title')
    សាខា
@endsection

@section('content')
    <div class="container">
        <livewire:branch.branch-table />
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#branch>a").addClass("active");
        });
    </script>
@endsection
