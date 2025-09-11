@extends('layouts.app')

@section('title')
    បង្កើតសមាជិកគណៈកិត្តិយស
@endsection

@section('content')
    @if (Auth::user()->hasRole('System Manager'))
        <livewire:honorary-committee.admin-honorary-committee-member-create-form />
    @elseif (Auth::user()->hasRole('Branch System Operator'))
    @endif
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#honorary-committee>a").addClass("active");
            $("#honorary-committee").addClass("menu-open");
            $("#honorary-committee-member-create>a").addClass("active");
        });
    </script>
@endsection
