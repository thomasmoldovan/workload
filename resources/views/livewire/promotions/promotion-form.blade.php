<div class="card rounded-0">
    <div class="card-body mt-2">
        <div class="card-title">
            {{ $edit ? "Edit" : "Add" }} promotion
        </div>
        <form wire:submit.prevent="submit">
            @csrf
            <input type="hidden" id="id" name="id" wire:model.defer="promotion.id">
            <div class="col-md-12">
                <label for="name" class="form-label">Name <b class="text-danger">*</b></label>
                <input type="text" id="name" name="name" class="form-control"
                    placeholder="Name"
                    wire:model.lazy="promotion.name">

                <div class="validation-message">
                    {{ $errors->first('promotion.name') }}
                </div>

                {{-- @if ($success)
                    <script>
                        $('#name').addClass('is-valid').change();
                    </script>
                    <div class="valid-feedback">{{ $success }}</div>
                @endif --}}
            </div>

            <div class="col-md-12 pt-2">
                <label for="type" class="form-label">Type <b class="text-danger">*</b></label>
                <select id="type" name="type" class="form-select"
                    wire:model.lazy="promotion.promotion_type_id">
                    <option selected value="">Select type</option>
                    @foreach ($promotionTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>

                <div class="validation-message">
                    {{ $errors->first('promotion.trigramme') }}
                </div>

                {{-- @if ($success)
                    <script>
                        $('#name').addClass('is-valid').change();
                    </script>
                    <div class="valid-feedback">{{ $success }}</div>
                @endif --}}
            </div>

            <div class="text-end pt-3">
                @if ($edit)
                    <button wire:click="cancel()" type="button" id="cancel_button" class="btn btn-secondary">Cancel</button>
                @endif
                <button type="submit" id="add_promotion" class="btn btn-primary">
                    {{ $edit ? "Update" : "Add" }}
                </button>
            </div>
        </form>
    </div>
</div>
