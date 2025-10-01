<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">បង្កើតអាណត្តិ</h3>
    </div>
    <form wire:submit.prevent="save">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-md-6 form-group">
                    <label>ឈ្មោះខ្មែរ<span class="text-danger">*</span></label>
                    <input wire:model="kh_name" class="form-control" placeholder="សូមបញ្ចូលឈ្មោះខ្មែរ">
                    @error('kh_name')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 form-group">
                    <label>ឈ្មោះឡាតាំង</label>
                    <input wire:model="en_name" class="form-control" placeholder="សូមបញ្ចូលឈ្មោះឡាតាំង">
                </div>
                @if (!$is_create_from_show)
                    <div class="col-12 col-md-6 form-group">
                        <label>ថ្នាក់អាណត្តិ<span class="text-danger">*</span></label>
                        <select wire:model.live="level_id" class="form-control">
                            <option value="">សូមជ្រើសរើសថ្នាក់អាណត្តិ</option>
                            @foreach ($committee_levels as $committee_level)
                                <option wire:key="{{ $committee_level->id }}" value="{{ $committee_level->id }}">
                                    {{ $committee_level->kh_name }}
                                </option>
                            @endforeach
                        </select>
                        @error('level_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    @if ($level_id)
                        @if ($level_id > 1)
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
                        @if ($level_id == 3)
                            <div class="col-12 col-md-6 form-group">
                                <label>អនុសាខា<span class="text-danger">*</span></label>
                                <select wire:model="sub_branch_id" class="form-control">
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
                    @endif
                @endif
                <div class="col-12 col-md-6 form-group" x-init="$('#term_start_date').datetimepicker({ format: 'YYYY-MM-DD' });
                $('#term_start_date').on('change.datetimepicker', function(e) {
                    if (e.date) {
                        $wire.start_date = e.date.format('YYYY-MM-DD');
                    }
                });">
                    <label>ថ្ងៃចាប់ផ្តើមអាណត្តិ</label>
                    <div>
                        <div class="input-group date" id="term_start_date" data-target-input="nearest">
                            <input id="term_start_date_input" wire:model="start_date" type="text"
                                class="form-control datetimepicker-input" data-target="#term_start_date" />
                            <div class="input-group-append" data-target="#term_start_date" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 form-group" x-init="$('#term_end_date').datetimepicker({ format: 'YYYY-MM-DD' });
                $('#term_end_date').on('change.datetimepicker', function(e) {
                    if (e.date) {
                        $wire.end_date = e.date.format('YYYY-MM-DD');
                    }
                });">
                    <label>ថ្ងៃបញ្ចប់អាណត្តិ</label>
                    <div>
                        <div class="input-group date" id="term_end_date" data-target-input="nearest">
                            <input id="term_end_date_input" wire:model="end_date" type="text"
                                class="form-control datetimepicker-input" data-target="#term_end_date" />
                            <div class="input-group-append" data-target="#term_end_date" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success float-right"><i class="fa fa-save mr-1"></i> រក្សាទុក</button>
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
