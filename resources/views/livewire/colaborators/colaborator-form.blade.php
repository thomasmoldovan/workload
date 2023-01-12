<div class="card">
    <div class="card-body mt-3">
        <div class="card-title">
            {{-- {{ $edit ? "Edit" : "Add" }} category --}}
            Add colaborator
        </div>
        <form wire:submit.prevent="submit">
            @csrf
            <input type="hidden" id="id" name="id" wire:model.defer="colaborator.id">
            <div class="col-md-12">
                <label for="name" class="form-label">Name <b class="text-danger">*</b></label>
                <input type="text" id="name" name="name" class="form-control"
                    placeholder="Name"
                    wire:model.defer="category.name">

                <div class="validation-message">
                    {{ $errors->first('colaborator.name') }}
                </div>

                {{-- @if ($success)
                    <script>
                        $('#name').addClass('is-valid').change();
                    </script>
                    <div class="valid-feedback">{{ $success }}</div>
                @endif --}}
            </div>

            <div class="col-md-12 pt-2">
                <label for="name" class="form-label">Surname <b class="text-danger">*</b></label>
                <input type="text" id="surname" name="surname" class="form-control"
                    placeholder="Surame"
                    wire:model.defer="category.surname">

                <div class="validation-message">
                    {{ $errors->first('colaborator.surname') }}
                </div>

                {{-- @if ($success)
                    <script>
                        $('#name').addClass('is-valid').change();
                    </script>
                    <div class="valid-feedback">{{ $success }}</div>
                @endif --}}
            </div>

            <div class="text-end pt-3">
                {{-- @if ($edit)
                    <button wire:click="cancel()" type="button" id="cancel_button" class="btn btn-secondary">Cancel</button>
                @endif --}}
                <button type="submit" id="add_colaborator" class="btn btn-primary">
                    {{-- {{ $edit ? "Update" : "Add" }} --}}
                    Add
                </button>
            </div>
        </form>
    </div>
</div>
