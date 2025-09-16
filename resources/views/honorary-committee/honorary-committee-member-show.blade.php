@extends('layouts.app')

@section('title')
    {{ $member->kh_name }}
@endsection

@section('content')
    <div class="container">
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
