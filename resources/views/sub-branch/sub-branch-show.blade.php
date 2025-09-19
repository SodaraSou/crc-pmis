@extends('layouts.app')

@section('title')
    {{ $sub_branch->kh_name }}
@endsection

@section('content')
    {{-- <livewire:group.group-table :sub_branch="$sub_branch"/> --}}
    <section class="container">
        <div class="card card-danger card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
                <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="custom-tabs-four-honor-tab" data-toggle="pill"
                            href="#custom-tabs-four-honor" role="tab" aria-controls="custom-tabs-four-honor"
                            aria-selected="true">គណ:កិត្តិយសអនុសាខា</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-committee-tab" data-toggle="pill"
                            href="#custom-tabs-four-committee" role="tab" aria-controls="custom-tabs-four-committee"
                            aria-selected="false">គណ:កម្មាធិការអនុសាខា</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-term-tab" data-toggle="pill" href="#custom-tabs-four-term"
                            role="tab" aria-controls="custom-tabs-four-term" aria-selected="false">អាណត្តិ</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-employee-tab" data-toggle="pill"
                            href="#custom-tabs-four-employee" role="tab" aria-controls="custom-tabs-four-employee"
                            aria-selected="false">មន្ត្រីប្រតិបត្តិអនុសាខា</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="custom-tabs-four-sub-branch-tab" data-toggle="pill"
                            href="#custom-tabs-four-sub-branch" role="tab" aria-controls="custom-tabs-four-sub-branch"
                            aria-selected="false">ក្រុម </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade active show" id="custom-tabs-four-honor" role="tabpanel"
                        aria-labelledby="custom-tabs-four-honor-tab">
                        <livewire:sub-branch.sub-branch-honorary-committee-member-table :sub_branch="$sub_branch" />
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-committee" role="tabpanel"
                        aria-labelledby="custom-tabs-four-committee-tab">
                        <livewire:sub-branch.sub-branch-committee-member-table :sub_branch="$sub_branch" />
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-term" role="tabpanel"
                        aria-labelledby="custom-tabs-four-term-tab">
                        <livewire:sub-branch.sub-branch-term-table :sub_branch="$sub_branch" />
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-employee" role="tabpanel"
                        aria-labelledby="custom-tabs-four-employee-tab">
                        {{-- <livewire:branch.branch-employee-table :branch="$branch" /> --}}
                    </div>
                    <div class="tab-pane fade" id="custom-tabs-four-sub-branch" role="tabpanel"
                        aria-labelledby="custom-tabs-four-sub-branch-tab">
                        {{-- <livewire:sub-branch.sub-branch-table :branch="$branch" /> --}}
                    </div>
                </div>
            </div>
        </div>
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
