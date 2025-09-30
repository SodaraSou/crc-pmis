<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">បង្កើតដំណែងមន្រ្តីប្រតិបត្តិ</h3>
    </div>
    <form wire:submit.prevent="save">
        <div class="card-body">
            <div class="row g-4">
                <div class="col-12 col-md-6 form-group">
                    <label>ថ្នាក់មន្ត្រីប្រតិបត្តិ<span class="text-danger">*</span></label>
                    <select wire:model.live="employee_level_id" class="form-control">
                        <option value="">សូមជ្រើសរើសថ្នាក់មន្ត្រីប្រតិបត្តិ</option>
                        @foreach ($user_levels as $user_level)
                            <option wire:key="{{ $user_level->id }}" value="{{ $user_level->id }}">
                                {{ $user_level->kh_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('employee_level_id')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                @if ($employee_level_id > 1)
                    <div class="col-12 col-md-6 form-group">
                        <label>សាខា<span class="text-danger">*</span></label>
                        <select wire:model.live="branch_id" class="form-control">
                            <option value="">សូមជ្រើសរើសសាខា</option>
                            @foreach ($branches as $branch)
                                @if ($branch->id == 0)
                                    @continue
                                @endif
                                <option wire:key="{{ $branch->id }}" value="{{ $branch->id }}">
                                    {{ $branch->kh_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('branch_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
                @if ($employee_level_id > 2)
                    <div class="col-12 col-md-6 form-group">
                        <label>អនុសាសា<span class="text-danger">*</span></label>
                        <select wire:model.live="sub_branch_id" class="form-control">
                            <option value="">សូមជ្រើសរើសអនុសាខា</option>
                            @foreach ($sub_branches as $sub_branch)
                                <option wire:key="{{ $sub_branch->id }}" value="{{ $sub_branch->id }}">
                                    {{ $sub_branch->kh_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('sub_branch_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                @endif
                @if ($employee_level_id == 4)
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
                @if ($department_id && $department_id != 1)
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
                <div class="col-12 col-md-6 form-group">
                    <label>ដំណែង<span class="text-danger">*</span></label>
                    <select wire:model="position_id" class="form-control">
                        <option value="">សូមជ្រើសរើសដំណែង</option>
                        @foreach ($positions as $position)
                            @if (($position->id < 4 && Auth::user()->user_level_id > 1) || ($position->id < 6 && Auth::user()->user_level_id == 3))
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
                <div class="col-12 col-md-6 form-group">
                    <label>ឈ្មោះដំណែង (Optional)</label>
                    <input wire:model="opt_position_name" class="form-control" placeholder="សូមបញ្ចូលឈ្មោះដំណែង">
                </div>
                <div class="col-12 col-md-6 form-group" x-init="$('#position_start_date').datetimepicker({ format: 'YYYY-MM-DD' });
                $('#position_start_date').on('change.datetimepicker', function(e) {
                    if (e.date) {
                        $wire.start_date = e.date.format('YYYY-MM-DD');
                    }
                });">
                    <label>ថ្ងៃចាប់ផ្តើមដំណែង<span class="text-danger">*</span></label>
                    <div>
                        <div class="input-group date" id="position_start_date" data-target-input="nearest">
                            <input id="position_start_date_input" wire:model='start_date' type="text"
                                class="form-control datetimepicker-input" data-target="#position_start_date" />
                            <div class="input-group-append" data-target="#position_start_date"
                                data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    @error('start_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 form-group" x-init="$('#position_end_date').datetimepicker({ format: 'YYYY-MM-DD' });
                $('#position_end_date').on('change.datetimepicker', function(e) {
                    if (e.date) {
                        $wire.end_date = e.date.format('YYYY-MM-DD');
                    }
                });">
                    <label>ថ្ងៃបញ្ចប់ដំណែង</label>
                    <div>
                        <div class="input-group date" id="position_end_date" data-target-input="nearest">
                            <input id="position_end_date_input" wire:model='end_date' type="text"
                                class="form-control datetimepicker-input" data-target="#position_end_date" />
                            <div class="input-group-append" data-target="#position_end_date"
                                data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
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
        $wire.on('create_fail', (event) => {
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
