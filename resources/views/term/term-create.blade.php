@extends('layouts.app')

@section('title')
    បង្កើតអាណត្តិ
@endsection

@section('content')
    <div class="container">
        @if (Auth::user()->hasRole('System Manager'))
            <livewire:term.admin.term-create-form :branch_id="$branch_id" :sub_branch_id="$sub_branch_id" />
        @endif
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#term>a").addClass("active");
            $("#term").addClass("menu-open");
            $("#term-create>a").addClass("active");
        });
    </script>
@endsection
