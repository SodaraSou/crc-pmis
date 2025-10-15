@extends('layouts.app')

@section('title')
    បង្កើតអ្នកប្រើប្រាស់
@endsection

@section('content')
    <div class="container">
        <livewire:user.user-create-form />
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#security>a").addClass("active");
            $("#security").addClass("menu-open");
            $("#user>a").addClass("active");
        });
    </script>
@endsection
