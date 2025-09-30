@extends('layouts.app')

@section('title')
    កែប្រែសមាជិកគណៈកិត្តិយស
@endsection

@section('content')
    <div class="container">
        @if (Auth::user()->hasRole('System Manager'))
            <livewire:honorary-committee.honorary-committee-member-edit-form :member="$member" />
        @endif
        <livewire:honorary-committee.honorary-committee-member-term-table :member="$member" />
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
