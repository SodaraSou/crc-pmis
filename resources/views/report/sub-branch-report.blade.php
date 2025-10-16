@extends('layouts.app')

@section('title')
    របាយការណ៌
@endsection

@section('content')
    <div class="container">
        <livewire:report.sub-branch-report />
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#report>a").addClass("active");
            $("#report").addClass("menu-open");
            $("#sub-branch-report>a").addClass("active");

            $('#btn-print').click(function() {
                window.print();
            })
        });
    </script>
@endsection
