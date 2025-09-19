@extends('layouts.app')

@section('title')
    កែប្រែសមាជិកគណៈកម្មាធិការ
@endsection

@section('content')
    <div class="container">
        @if (Auth::user()->hasRole('System Manager'))
            <livewire:committee.admin.committee-member-edit-form :member="$member" />
        @endif
        <livewire:committee.committee-member-term-table :member="$member" />
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
