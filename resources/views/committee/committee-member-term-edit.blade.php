@extends('layouts.app')

@section('title')
    កែប្រែអាណត្តិសមាជិក
@endsection

@section('content')
    <div class="container">
        <livewire:committee.admin.committee-member-term-edit-form :committee_member="$committee_member" />
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
