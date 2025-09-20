<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">បង្កើតអាណត្តិ</h3>
    </div>
    <form wire:submit.prevent="save">
        <div class="card-body">
            <div class="form-group">
                <label>ឈ្មោះខ្មែរ<span class="text-danger">*</span></label>
                <input wire:model="kh_name" class="form-control" placeholder="សូមបញ្ចូលឈ្មោះខ្មែរ">
                @error('kh_name')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label>ឈ្មោះឡាតាំង</label>
                <input wire:model="en_name" class="form-control" placeholder="សូមបញ្ចូលឈ្មោះឡាតាំង">
            </div>
            @if (!$is_create_from_show)
                <div class="form-group">
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
                    <div class="row g-4">
                        <div class="col-12 col-md-6 form-group">
                            <label>សាខា<span class="text-danger">*</span></label>
                            <select wire:model.live="branch_id" class="form-control">
                                <option value="">សូមជ្រើសរើសសាខា</option>
                                @foreach ($branches as $branch)
                                    <option wire:key="{{ $branch->id }}" value="{{ $branch->id }}">
                                        {{ $branch->kh_name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('branch_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        @if ($level_id == 2)
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
                    </div>
                @endif
            @endif
            <div class="row g-4">
                <div class="col-12 col-md-6 form-group">
                    <label>ថ្ងៃចាប់ផ្តើមអាណត្តិ</label>
                    <div>
                        <div class="input-group date" id="start_date_picker" data-target-input="nearest">
                            <input id="start_date_input" wire:model="start_date" type="text"
                                class="form-control datetimepicker-input" data-target="#start_date_picker" />
                            <div class="input-group-append" data-target="#start_date_picker"
                                data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 form-group">
                    <label>ថ្ងៃបញ្ចប់អាណត្តិ</label>
                    <div>
                        <div class="input-group date" id="end_date_picker" data-target-input="nearest">
                            <input id="end_date_input" wire:model="end_date" type="text"
                                class="form-control datetimepicker-input" data-target="#end_date_picker" />
                            <div class="input-group-append" data-target="#end_date_picker" data-toggle="datetimepicker">
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
        $('#start_date_picker').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#start_date_picker').on('change.datetimepicker', function() {
            $wire.set('start_date', $('#start_date_input').val());
        });
        $('#end_date_picker').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#end_date_picker').on('change.datetimepicker', function() {
            $wire.set('end_date', $('#end_date_input').val());
        });
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
