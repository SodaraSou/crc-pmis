@extends('layouts.app')

@section('title')
    បន្ថែមអាណត្តិ
@endsection

@section('content')
    <div class="container">
        @if (Auth::user()->hasRole('System Manager'))
            <livewire:honorary-committee.admin.honorary-committee-member-term-form :member="$member" />
        @endif
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#honorary-committee>a").addClass("active");
            $("#honorary-committee").addClass("menu-open");
            $("#honorary-committee-member-list>a").addClass("active");
        });
    </script>
@endsection
