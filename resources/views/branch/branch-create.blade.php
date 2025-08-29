@extends('layouts.app')

@section('title')
    បង្កើតសាខា
@endsection

@section('content')
    @livewire('branch.branch-create-form')
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#branch>a").addClass("active");
        });
    </script>
@endsection
