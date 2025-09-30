@extends('layouts.app')

@section('title')
    កែប្រែរាជធានី/ខេត្ត
@endsection

@section('content')
    <div class="container">
        <livewire:province.province-edit-form :province="$province" />
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
