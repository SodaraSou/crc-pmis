@extends('layouts.app')

@section('title')
    កែប្រែមុខងារប្រព័ន្ធ
@endsection

@section('content')
    <div class="container">
        <livewire:permission.permission-edit-form :permission="$permission" />
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#security>a").addClass("active");
            $("#security").addClass("menu-open");
            $("#permission>a").addClass("active");
        });
    </script>
@endsection
