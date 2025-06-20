@extends('layouts.app')

@section('title')
    បង្កើតភូមិ
@endsection

@section('content')
    <livewire:village.village-create-form :commune="$commune" />
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
