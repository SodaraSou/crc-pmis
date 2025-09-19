@extends('layouts.app')

@section('title')
    បន្ថែមអាណត្តិ
@endsection

@section('content')
    <div class="container">
        @if (Auth::user()->hasRole('System Manager'))
            <livewire:committee.admin.committee-member-term-form :member="$member" />
        @endif
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#committee>a").addClass("active");
            $("#committee").addClass("menu-open");
            $("#committee-member-list>a").addClass("active");
        });
    </script>
@endsection
