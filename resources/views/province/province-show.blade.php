@extends('layouts.app')

@section('title')
    {{ $province->kh_name }}
@endsection

@section('content')
    <div class="container">
        <livewire:district.district-table :province="$province" />
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
