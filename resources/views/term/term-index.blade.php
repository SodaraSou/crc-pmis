@extends('layouts.app')

@section('title')
    អាណត្តិ
@endsection

@section('content')
    <div class="container">
        <div class="card card-danger card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-branch-term-tab" data-toggle="pill"
                            href="#custom-tabs-four-branch-term" role="tab" aria-controls="custom-tabs-four-branch-term"
                            aria-selected="true">អាណត្តិសាខា</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-sub-branch-term-tab" data-toggle="pill"
                            href="#custom-tabs-four-sub-branch-term" role="tab" aria-controls="custom-tabs-four-sub-branch-term"
                            aria-selected="false">អាណត្តិអនុសាខា</a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade active show" id="custom-tabs-four-branch-term" role="tabpanel"
                        aria-labelledby="custom-tabs-four-branch-term-tab">
                        <livewire:term.branch-term-table />
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-sub-branch-term" role="tabpanel"
                        aria-labelledby="custom-tabs-four-sub-branch-term-tab">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#term>a").addClass("active");
            $("#term").addClass("menu-open");
            $("#term-list>a").addClass("active");
        });
    </script>
@endsection
