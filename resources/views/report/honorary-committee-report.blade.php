@extends('layouts.app')

@section('title')
    របាយការណ៌
@endsection

@section('content')
    <div class="container">
        <livewire:report.honorary-committee-member-report />
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#report>a").addClass("active");
            $("#report").addClass("menu-open");
            $("#honorary-committee-report>a").addClass("active");

            $('#btn-print').click(function() {
                window.print();
            })
        });
    </script>
@endsection
