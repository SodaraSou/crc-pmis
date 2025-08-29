@extends('layouts.app')

@section('title')
    {{ $branch->kh_name }}
@endsection

@section('content')
    <section class="container">
        <livewire:branch.branch-employee-table :branch="$branch" />
        <livewire:sub-branch.sub-branch-table :branch="$branch" />
    </section>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#branch>a").addClass("active");
        });
    </script>
@endsection
