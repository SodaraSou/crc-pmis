<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">ផ្លាស់តួនាទីបុគ្គលិក</h3>
    </div>
    <form wire:submit.prevent="save">
        <div class="card-body">
            <div class="row g-4">
                <div class="col-12 col-md-6 form-group">
                    <label>ថ្នាក់បុគ្គលិក<span class="text-danger">*</span></label>
                    <select wire:model.live="employee_level_id" class="form-control">
                        <option value="">សូមជ្រើសរើសថ្នាក់បុគ្គលិក</option>
                        @foreach ($user_levels as $user_level)
                            @if($user_level->id == 1 && Auth::user()->user_level_id > 1
                                || $user_level->id < 2 && Auth::user()->user_level_id > 2
                                || $user_level->id < 3 && Auth::user()->user_level_id == 3)
                                @continue
                            @endif
                            <option wire:key="{{ $user_level->id }}" value="{{ $user_level->id }}">
                                {{ $user_level->kh_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('employee_level_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                @if($employee_level_id > 1)
                    <div class="col-12 col-md-6 form-group">
                        @if(Auth::user()->user_level_id == 2 || Auth::user()->user_level_id == 3)
                            <label>សាខា<span class="text-danger">*</span></label>
                            <select wire:model.live="branch_id" class="form-control" disabled>
                                <option value="">សូមជ្រើសរើសសាខា</option>
                                @foreach ($branches as $branch)
                                    @if($branch->id == 0)
                                        @continue
                                    @endif
                                    <option wire:key="{{ $branch->id }}" value="{{ $branch->id }}">
                                        {{ $branch->kh_name }}
                                    </option>
                                @endforeach
                            </select>
                        @else
                            <label>សាខា<span class="text-danger">*</span></label>
                            <select wire:model.live="branch_id" class="form-control">
                                <option value="">សូមជ្រើសរើសសាខា</option>
                                @foreach ($branches as $branch)
                                    @if($branch->id == 0)
                                        @continue
                                    @endif
                                    <option wire:key="{{ $branch->id }}" value="{{ $branch->id }}">
                                        {{ $branch->kh_name }}
                                    </option>
                                @endforeach
                            </select>
                        @endif
                        @error('branch_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
                @if($branch_id && $employee_level_id > 2)
                    <div class="col-12 col-md-6 form-group">
                        @if(Auth::user()->user_level_id == 3)
                            <label>អនុសាសា<span class="text-danger">*</span></label>
                            <select wire:model.live="sub_branch_id" class="form-control" disabled>
                                <option value="">សូមជ្រើសរើសអនុសាខា</option>
                                @foreach ($sub_branches as $sub_branch)
                                    <option wire:key="{{ $sub_branch->id }}" value="{{ $sub_branch->id }}">
                                        {{ $sub_branch->kh_name }}
                                    </option>
                                @endforeach
                            </select>
                        @else
                            <label>អនុសាសា<span class="text-danger">*</span></label>
                            <select wire:model.live="sub_branch_id" class="form-control">
                                <option value="">សូមជ្រើសរើសអនុសាខា</option>
                                @foreach ($sub_branches as $sub_branch)
                                    <option wire:key="{{ $sub_branch->id }}" value="{{ $sub_branch->id }}">
                                        {{ $sub_branch->kh_name }}
                                    </option>
                                @endforeach
                            </select>
                        @endif
                        @error('sub_branch_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
                @if($sub_branch_id && $employee_level_id == 4)
                    <div class="col-12 col-md-6 form-group">
                        <label>ក្រុមអនុសាខា</label>
                        <select wire:model="group_id" class="form-control">
                            <option value="">សូមជ្រើសរើសក្រុមអនុសាខា</option>
                            @foreach ($groups as $sub_branch)
                                <option wire:key="{{ $sub_branch->id }}" value="{{ $sub_branch->id }}">
                                    {{ $sub_branch->kh_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('group_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
                <div class="col-12 col-md-6 form-group">
                    <label>នាយកដ្ឋាន<span class="text-danger">*</span></label>
                    <select wire:model.live="department_id" class="form-control">
                        <option value="">សូមជ្រើសរើសនាយកដ្ឋាន</option>
                        @foreach ($departments as $department)
                            <option wire:key="{{ $department->id }}" value="{{ $department->id }}">
                                {{ $department->kh_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('department_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                @if($department_id != 1)
                    <div class="col-12 col-md-6 form-group">
                        <label>ការិយាល័យ</label>
                        <select wire:model="office_id" class="form-control">
                            <option value="">សូមជ្រើសរើសការិយាល័យ</option>
                            @foreach ($offices as $office)
                                <option wire:key="{{ $office->id }}" value="{{ $office->id }}">
                                    {{ $office->kh_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('office_id')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
            </div>
            <div class="row g-4">
                <div class="col-12 col-md-4 form-group">
                    <label>តួនាទី<span class="text-danger">*</span></label>
                    <select wire:model="position_id" class="form-control">
                        <option value="">សូមជ្រើសរើសដំណែង</option>
                        @foreach ($positions as $position)
                            @if($position->id < 4 && Auth::user()->user_level_id > 1
                                || $position->id < 6 && Auth::user()->user_level_id == 3)
                                @continue
                            @endif
                            <option wire:key="{{ $position->id }}" value="{{ $position->id }}">
                                {{ $position->kh_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('position_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label>ឈ្មោះតួនាទី (Optional)</label>
                    <input wire:model="opt_position_name" class="form-control" placeholder="សូមបញ្ចូលឈ្មោះតួនាទី">
                </div>
                <div class="col-12 col-md-4 form-group">
                    <label>ថ្ងៃចាប់ផ្តើមដំណែង<span class="text-danger">*</span></label>
                    <div>
                        <div class="input-group date" id="start_date_picker" data-target-input="nearest">
                            <input id="start_date_input" wire:model="start_date" type="text"
                                   class="form-control datetimepicker-input" data-target="#start_date_picker"/>
                            <div class="input-group-append" data-target="#start_date_picker"
                                 data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    @error('start_date')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-success"><i class="fa fa-save mr-1"></i> រក្សាទុក</button>
        </div>
    </form>
</div>

@script
<script>
    $('#start_date_picker').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#start_date_picker').on('change.datetimepicker', function () {
        $wire.set('start_date', $('#start_date_input').val());
    });
    $wire.on('swap_fail', (event) => {
        Swal.fire({
            title: "មានបញ្ហា!",
            text: event.message,
            icon: "error",
            confirmButtonText: "អូខេ",
            confirmButtonColor: "#dc3545"
        });
    });
</script>
@endscript
