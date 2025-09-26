<div class="card card-info">
    <div class="card-header">
        <h3 class="card-title">កែប្រែអាណត្តិ</h3>
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
            <button type="submit" class="btn btn-info float-right"><i class="fa fa-save mr-1"></i> កែប្រែ</button>
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
        $wire.on('update_fail', (event) => {
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
