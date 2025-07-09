<div class="card card-success">
    <div class="card-header">
        <h3 class="card-title">បង្កើតប្រវត្តិសិក្សាបុគ្គលិក</h3>
    </div>
    <form wire:submit.prevent="save">
        <div class="card-body">
            <div class="row g-4">
                <div class="col-12 col-md-6 form-group">
                    <label>ឈ្មោះស្ថាប័នអប់រំ<span class="text-danger">*</span></label>
                    <input wire:model="form.institution" class="form-control" placeholder="សូមបញ្ចូលឈ្មោះស្ថាប័នអប់រំ">
                    @error('form.institution')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 form-group">
                    <label>ប្រភេទសញ្ញាបត្រ<span class="text-danger">*</span></label>
                    <select wire:model="form.degree_type_id" class="form-control">
                        <option value="">សូមជ្រើសរើសប្រភេទសញ្ញាបត្រ</option>
                        @foreach ($degree_types as $degree_type)
                            <option wire:key="{{ $degree_type->id }}" value="{{ $degree_type->id }}">
                                {{ $degree_type->kh_name }}
                            </option>
                        @endforeach
                    </select>
                    @error('form.degree_type_id')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row g-4">
                <div class="col-12 col-md-6 form-group">
                    <label>ឈ្មោះជំនាញសិក្សា<span class="text-danger">*</span></label>
                    <input wire:model="form.field_of_study" class="form-control"
                           placeholder="សូមបញ្ចូលឈ្មោះជំនាញសិក្សា">
                    @error('form.field_of_study')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div class="row g-4">
                <div class="col-12 col-md-6 form-group">
                    <label>ឆ្នាំចាប់ផ្តើម<span class="text-danger">*</span></label>
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
                    @error('form.start_year')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-12 col-md-6 form-group">
                    <label>ឆ្នាំបញ្ចប់<span class="text-danger">*</span></label>
                    <div>
                        <div class="input-group date" id="end_date_picker" data-target-input="nearest">
                            <input id="end_date_input" wire:model="end_date" type="text"
                                   class="form-control datetimepicker-input" data-target="#end_date_picker"/>
                            <div class="input-group-append" data-target="#end_date_picker" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                    @error('form.end_year')
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
        format: 'YYYY'
    });
    $('#start_date_picker').on('change.datetimepicker', function () {
        $wire.set('form.start_year', $('#start_date_input').val());
    });
    $('#end_date_picker').datetimepicker({
        format: 'YYYY'
    });
    $('#end_date_picker').on('change.datetimepicker', function () {
        $wire.set('form.end_year', $('#end_date_input').val());
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
