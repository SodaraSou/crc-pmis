@extends('layouts.app')

@section('title')
    បង្កើតគណៈកម្មាធិការ
@endsection

@section('content')
    <h1>Create Committee</h1>
@endsection

@section('js')
    <script>
        $(document).ready(function () {
            $("#sidebar li a").removeClass("active");
            $("#setting>a").addClass("active");
            $("#setting").addClass("menu-open");
            $("#committee>a").addClass("active");
        });
    </script>
@endsection
