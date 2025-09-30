@extends('layouts.app')

@section('title')
    បង្កេីតនាយកដ្ឋាន
@endsection

@section('content')
    <div class="container">
        <livewire:department.department-create-form />
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#setting>a").addClass("active");
            $("#setting").addClass("menu-open");
            $("#department>a").addClass("active");
        });
    </script>
@endsection
