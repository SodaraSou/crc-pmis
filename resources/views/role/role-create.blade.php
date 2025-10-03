@extends('layouts.app')

@section('title')
    បង្កើតតួនាទី
@endsection

@section('content')
    <div class="container">
        <livewire:role.role-create-form />
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#security>a").addClass("active");
            $("#security").addClass("menu-open");
            $("#role>a").addClass("active");
        });
    </script>
@endsection
