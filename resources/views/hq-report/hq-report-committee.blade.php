@extends('layouts.app')

@section('title')
    របាយការណ៌គណ:កម្មាធិការថ្នាក់កណ្តាល
@endsection

@section('content')
    <div class="container">
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#hq-report>a").addClass("active");
            $("#hq-report").addClass("menu-open");
            $("#hq-committee-report>a").addClass("active");
        });
    </script>
@endsection
