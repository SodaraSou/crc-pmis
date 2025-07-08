<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">បង្កើតដំណែងបុគ្គលិក</h3>
    </div>
    <form wire:submit.prevent="save">
        <div class="card-body">
            <div class="row g-4">
                <div class="col-12 col-md-6 form-group">
                    <label>ដំណែង<span class="text-danger">*</span></label>
                    <select wire:model="position_id" class="form-control">
                        <option value="">សូមជ្រើសរើសដំណែង</option>
                        @foreach ($positions as $position)
                            @if($position->id < 4 && Auth::user()->user_level_id != 1)
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
            </div>
            <div class="row g-4">
                <div class="col-12 col-md-6 form-group">
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
                <div class="col-12 col-md-6 form-group">
                    <label>ថ្ងៃបញ្ចប់ដំណែង</label>
                    <div>
                        <div class="input-group date" id="end_date_picker" data-target-input="nearest">
                            <input id="end_date_input" wire:model="end_date" type="text"
                                   class="form-control datetimepicker-input" data-target="#end_date_picker"/>
                            <div class="input-group-append" data-target="#end_date_picker" data-toggle="datetimepicker">
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
    $('#start_date_picker').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#start_date_picker').on('change.datetimepicker', function () {
        $wire.set('start_date', $('#start_date_input').val());
    });
    $('#end_date_picker').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#end_date_picker').on('change.datetimepicker', function () {
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
