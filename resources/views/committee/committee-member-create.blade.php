@extends('layouts.app')

@section('title')
    បង្កើតសមាជិកគណៈកម្មាធិការ
@endsection

@section('content')
    <div class="container">
        @if (Auth::user()->hasRole('System Manager'))
            <livewire:committee.admin-committee-member-create-form />
        @elseif (Auth::user()->hasRole('Branch System Operator'))
        @endif
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#committee>a").addClass("active");
            $("#committee").addClass("menu-open");
            $("#committee-member-create>a").addClass("active");
        });
    </script>
@endsection
