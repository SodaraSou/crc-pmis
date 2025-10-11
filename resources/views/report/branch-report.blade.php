@extends('layouts.app')

@section('title')
    របាយការណ៌
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
                    <div class="row my-4">
                        <div class="col-12 text-center">
                            <div class="khm">របាយការណ៌សមាជិកគណ:កិត្តិយសសមាជិកគណ:កម្មាធិការមន្រ្តីប្រតិបត្តិ ២៥
                                សាខារាជធានី/ខេត្ត</div>
                        </div>
                    </div>
                </div>
                <table class="table table-sm table-bordered cell-center">
                    <thead>
                        <tr>
                            <th class="khm text-center font-weight-normal">ល.រ</th>
                            <th class="khm text-center font-weight-normal" colspan="4">អង្គភាព</th>
                            <th class="khm text-center font-weight-normal" colspan="2">សមាជិកគណ:កិត្តិយស</th>
                            <th class="khm text-center font-weight-normal" colspan="2">សមាជិកគណ:កម្មាធិការ</th>
                            <th class="khm text-center font-weight-normal" colspan="2">មន្រ្តីប្រតិបត្តិ</th>
                            <th class="khm text-center font-weight-normal" colspan="2">អាណត្តិបច្ចុប្បន្ន</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($branches as $branch)
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="khs text-center" colspan="4">{{ $branch['branch_name'] }}</td>
                                <td class="text-center" colspan="2">{{ $branch['total_honorary_member'] }}</td>
                                <td class="text-center" colspan="2">{{ $branch['total_member'] }}</td>
                                <td class="text-center" colspan="2">{{ $branch['total_employee'] }}</td>
                                <td class="khs text-center" colspan="2">{{ $branch['current_term']->kh_name ?? 'N/A' }}
                                </td>
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
            $("#report>a").addClass("active");
            $("#report").addClass("menu-open");
            $("#branch-report>a").addClass("active");

            $('#btn-print').click(function() {
                window.print();
            })
        });
    </script>
@endsection
