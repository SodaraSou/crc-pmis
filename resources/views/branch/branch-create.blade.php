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
            $("#setting>a").addClass("active");
            $("#setting").addClass("menu-open");
            $("#branch>a").addClass("active");
        });
    </script>
@endsection
