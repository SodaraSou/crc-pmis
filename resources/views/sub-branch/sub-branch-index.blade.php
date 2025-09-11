@extends('layouts.app')

@section('title')
    អនុសាខា
@endsection

@section('content')
    <div class="container">
        <livewire:sub-branch.sub-branch-table />
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#sub-branch>a").addClass("active");
        });
    </script>
@endsection
