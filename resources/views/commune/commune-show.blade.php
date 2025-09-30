@extends('layouts.app')

@section('title')
    {{ $commune->kh_name }}
@endsection

@section('content')
    <div class="container">
        <livewire:village.village-table :commune="$commune" />
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
