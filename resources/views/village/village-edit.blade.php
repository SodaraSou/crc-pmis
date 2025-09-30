@extends('layouts.app')

@section('title')
    កែប្រែភូមិ
@endsection

@section('content')
    <div class="container">
        <livewire:village.village-edit-form :village="$village" />
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#setting>a").addClass("active");
            $("#setting").addClass("menu-open");
            $("#province>a").addClass("active");
        });
    </script>
@endsection
