<div>
    <div class="card mb-4">
        <div class="card-header">
            <div class="row">
                <div class="col-12 col-md-4 form-group">
                    <label>ស្វែងរក</label>
                    <input wire:model.live.debounce.500ms="search" type="text" class="form-control"
                        placeholder="ស្វែងរក" />
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label>នាយកដ្ឋាន</label>
                    <select wire:model.live="department_id" class="form-control">
                        <option value="">ជ្រើសរើសនាយកដ្ឋាន</option>
                        @foreach ($departments as $branch)
                            <option wire:key="{{ $branch->id }}" value="{{ $branch->id }}">
                                {{ $branch->kh_name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label>ចំនួនមួយទំព័រ</label>
                    <select wire:model.live='per_page' class="form-control">
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="75">75</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($employees as $employee)
            <div wire:key="{{ $employee->id }}" class="col-12 col-md-6 col-xl-4 d-flex align-items-stretch flex-column">
                <div class="card bg-light d-flex flex-fill">
                    <div class="card-header text-muted border-bottom-0">
                        #{{ $employee->id }}
                    </div>
                    <div class="card-body pt-0">
                        <div class="row">
                            <div class="col-7">
                                <h2 class="lead"><b>{{ $employee->kh_name }}</b></h2>
                                @foreach ($employee->positions as $position)
                                    @if ($position->pivot->end_date)
                                        @continue
                                    @endif
                                    <p class="text-muted text-sm mb-0"><b>នាយកដ្ឋាន:
                                        </b>{{ $position->pivot->department->kh_name }}
                                    </p>
                                    <p class="text-muted text-sm"><b>តួនាទី:
                                        </b>{{ $position->pivot->position->kh_name }}
                                    </p>
                                @endforeach
                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                    <li class="small mb-2"><span class="fa-li"><i
                                                class="fas fa-lg fa-building"></i></span>
                                        {{ $employee->ad_village->kh_name }}, {{ $employee->ad_commune->kh_name }},
                                        {{ $employee->ad_district->kh_name }}, {{ $employee->ad_province->kh_name }}
                                    </li>
                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>
                                        {{ $employee->phone_number }}
                                    </li>
                                </ul>
                            </div>
                            <div class="col-5 text-center">
                                <img src="{{ asset('Cambodian_Red_Cross_Logo.png') }}" class="img-circle img-fluid"
                                    style="width: 120px; height: 120px;">
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="text-right">
                            <a href="{{ route('employee.show', Crypt::encrypt($employee->id)) }}"
                                class="btn btn-sm btn-primary">
                                <i class="fa fa-eye" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div>{{ $employees->links() }}</div>
</div>
