@extends('layouts.app')

@section('title')
    បង្កើតស្រុក/ខណ្ឌ
@endsection

@section('content')
    <livewire:district.district-create-form :province="$province" />
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
