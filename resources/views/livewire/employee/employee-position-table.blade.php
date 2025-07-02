<div class="card card-primary">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-center">
            <h3 class="card-title">ដំណែងបុគ្គលិក</h3>
            <a href="{{ route('employee.position.create', Crypt::encrypt($employee->id)) }}" class="btn btn-success"><i
                    class="fa fa-plus mr-1"></i>
                បង្កើត</a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-hover text-nowrap">
            <thead>
            <tr>
                <th>
                    ឈ្មោះដំណែង
                </th>
                <th>
                    កាលបរិចេ្ឆទចាប់ផ្តើម
                </th>
                <th class="text-center">សកម្មភាព</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($employee->positions as $position)
                <tr wire:key='{{ $position->id }}'>
                    <td>{{ $position->kh_name }}</td>
                    <td>{{ $position->pivot->start_date }}</td>
                    <td>
                        {{--                        <div class="d-flex justify-content-center align-items-center">--}}
                        {{--                            <a href="{{ route('employee.show', Crypt::encrypt($employee->id)) }}"--}}
                        {{--                               class="btn btn-sm btn-primary mr-2">--}}
                        {{--                                <i class="fa fa-eye" aria-hidden="true"></i>--}}
                        {{--                            </a>--}}
                        {{--                            <a href="{{ route('employee.edit', Crypt::encrypt($employee->id)) }}"--}}
                        {{--                               class="btn btn-sm btn-info mr-2">--}}
                        {{--                                <i class="fa fa-pen" aria-hidden="true"></i>--}}
                        {{--                            </a>--}}
                        {{--                        </div>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

