@extends('layouts.app')

@section('title')
    របាយការណ៌
@endsection

@section('content')
    <div class="container">
        <livewire:report.employee-report />
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#report>a").addClass("active");
            $("#report").addClass("menu-open");
            $("#employee-report>a").addClass("active");

            $(document).ready(function() {
                $('#btn-print').click(function() {
                    window.print();
                })
            });
        });
    </script>
@endsection
