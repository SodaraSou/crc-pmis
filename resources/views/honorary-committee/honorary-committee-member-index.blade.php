@extends('layouts.app')

@section('title')
    តារាងសមាជិកគណៈកិត្តិយស
@endsection

@section('content')
    <div class="container">
        <livewire:honorary-committee.honorary-committee-member-table />
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#honorary-committee>a").addClass("active");
            $("#honorary-committee").addClass("menu-open");
            $("#honorary-committee-member-list>a").addClass("active");
        });
    </script>
@endsection
