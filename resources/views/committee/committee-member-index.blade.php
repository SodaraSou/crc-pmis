@extends('layouts.app')

@section('title')
    តារាងសមាជិកគណៈកម្មាធិការ
@endsection

@section('content')
    <div class="container">
        <livewire:committee.committee-member-table />
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#committee>a").addClass("active");
            $("#committee").addClass("menu-open");
            $("#committee-member-list>a").addClass("active");
        });
    </script>
@endsection
