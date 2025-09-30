@extends('layouts.app')

@section('title')
    កែប្រែការិយាល័យ
@endsection

@section('content')
    <div class="container">
        <livewire:office.office-edit-form :office="$office" />
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
