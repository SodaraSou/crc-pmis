@extends('layouts.app')

@section('title')
    បង្កើតរាជធានី/ខេត្ត
@endsection

@section('content')
    <div class="container">
        <livewire:province.province-create-form />
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
