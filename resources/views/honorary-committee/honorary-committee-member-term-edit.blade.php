@extends('layouts.app')

@section('title')
    កែប្រែអាណត្តិសមាជិក
@endsection

@section('content')
    <div class="container">
        <livewire:honorary-committee.admin.honorary-committee-member-term-edit-form :committee_member="$committee_member" />
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
