@extends('layouts.app')

@section('title')
    {{ $commune->kh_name }}
@endsection

@section('content')
    <livewire:village.village-table :commune="$commune" />
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
