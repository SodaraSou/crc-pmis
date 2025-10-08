@extends('layouts.app')

@section('title')
    របាយការណ៌ថ្នាក់កណ្តាល
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <button id="btn-print" class="btn btn-primary float-right"><i class="fa fa-print"></i> បោះពុម្ភ</button>
        </div>
    </div>
    <div class="container">
        <div class="card" id="printable-area">
            <div class="card-body">
                <div>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col-4 text-center">
                            <img src="{{ asset('Cambodian_Red_Cross_Logo.png') }}" alt="crc-logo"
                                style="width: 120px; height: 120px;" class="mb-3">
                            <div class="khm">កាកបាទក្រហមកម្ពុជា</div>
                        </div>
                        <div class="col-4"></div>
                    </div>
                    <div class="row my-3">
                        <div class="col-12 text-center">
                            <div class="khm">
                                បញ្ជីររាយនាមមន្រ្តីប្រតិបត្តិស្នាក់ការកណ្តាលកាកបាទក្រហមកម្ពុជា</div>
                        </div>
                    </div>
                </div>
                <table class="table table-sm table-bordered cell-center">
                    <thead>
                        <tr>
                            <th class="khm text-center font-weight-normal" colspan="4"></th>
                            <th class="khm text-center font-weight-normal" colspan="2">សមាជិកគណ:កិត្តិយស</th>
                            <th class="khm text-center font-weight-normal" colspan="2">សមាជិកគណ:កម្មាធិការ</th>
                            <th class="khm text-center font-weight-normal" colspan="2">មន្រ្តីប្រតិបត្តិ</th>
                            <th class="khm text-center font-weight-normal" colspan="2">អាណត្តិបច្ចុប្បន្ន</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($committees as $committee)
                            <tr>
                                <td class="khm" colspan="4">{{ $committee->kh_name }}</td>
                                <td colspan="2" class="text-center">{{ $committee->total_honorary_member }}</td>
                                <td colspan="2"></td>
                                <td colspan="2"></td>
                                <td colspan="2"></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            $("#sidebar li a").removeClass("active");
            $("#hq-report>a").addClass("active");
            $("#hq-report").addClass("menu-open");
            $("#hq-report-index>a").addClass("active");

            $('#btn-print').click(function() {
                window.print();
            })
        });
    </script>
@endsection
