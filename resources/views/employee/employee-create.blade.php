@extends('layouts.app')

@section('title')
    បង្កើតមន្រ្តីប្រតិបត្តិ
@endsection

@section('content')
    <div class="container">
        @if (Auth::user()->hasRole('System Manager'))
            <livewire:employee.admin.employee-create-form />
        @endif
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#employee>a").addClass("active");
            $("#employee").addClass("menu-open");
            $("#employee-create>a").addClass("active");
        });
    </script>
@endsection
