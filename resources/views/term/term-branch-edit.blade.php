@extends('layouts.app')

@section('title')
    កែប្រែអាណត្តិ
@endsection

@section('content')
    <div class="container">
        <livewire:term.term-edit-form />
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#term>a").addClass("active");
            $("#term").addClass("menu-open");
            $("#term-list>a").addClass("active");
        });
    </script>
@endsection
