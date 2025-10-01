@extends('layouts.app')

@section('title')
    ទំព័រដើម
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $branch_count }}</h3>

                        <p>សាខា</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-university"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $sub_branch_count }}</h3>

                        <p>អនុសាខា</p>
                    </div>
                    <div class="icon">
                        <i class="fa fa-university"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3 class="text-white">{{ $honorary_committee_count }}</h3>

                        <p class="text-white">គណ:កិត្តិយស</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $committee_count }}</h3>

                        <p>គណ:កម្មាធិការ</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $honorary_committee_member_count }}</h3>

                        <p>សមាជិកគណ:កិត្តិយស</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-4 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $committee_member_count }}</h3>

                        <p>សមាជិកគណ:កម្មាធិការ</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#dashboard > a").addClass("active");
        });
    </script>
@endsection
