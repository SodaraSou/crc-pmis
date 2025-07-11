@extends('layouts.app')

@section('title')
    {{ $district->kh_name }}
@endsection

@section('content')
    <livewire:commune.commune-table :district="$district" />
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
