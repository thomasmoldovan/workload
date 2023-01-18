<div class="card rounded-0">
    <div class="card-body mt-2">
        <div class="card-title">
            {{ $edit ? "Edit" : "Add" }} colaborator
        </div>
        <form wire:submit.prevent="submit">
            @csrf
            <input type="hidden" id="id" name="id" wire:model.defer="colaborator.id">
            <div wire:ignore class="col-md-12">
                <label for="surname" class="form-label">Nom de famille <b class="text-danger">*</b></label>
                <input type="text" id="surname" name="surname" class="form-control"
                    placeholder="Nom de famille"
                    wire:model.debounce.50ms="colaborator.surname">

                <div class="validation-message">
                    {{ $errors->first('colaborator.surname') }}
                </div>

                {{-- @if ($success)
                    <script>
                        $('#surname').addClass('is-valid').change();
                    </script>
                    <div class="valid-feedback">{{ $success }}</div>
                @endif --}}
            </div>

            <div wire:ignore class="col-md-12 pt-2">
                <label for="name" class="form-label">Prénom <b class="text-danger">*</b></label>
                <input type="text" id="lastname" name="lastname" class="form-control"
                    placeholder="Prénom"
                    wire:model.debounce.50ms="colaborator.lastname">

                <div class="validation-message">
                    {{ $errors->first('colaborator.lastname') }}
                </div>

                {{-- @if ($success)
                    <script>
                        $('#lastname').addClass('is-valid').change();
                    </script>
                    <div class="valid-feedback">{{ $success }}</div>
                @endif --}}
            </div>

            <div class="col-md-12 pt-2">
                <label for="name" class="form-label">Trigramme <b class="text-danger">*</b></label>
                <input type="text" id="trigramme" name="trigramme" class="form-control"
                    placeholder="Surame"
                    wire:model="colaborator.trigramme" disabled>

                <div class="validation-message">
                    {{ $errors->first('colaborator.trigramme') }}
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
                <button type="submit" id="add_colaborator" class="btn btn-primary">
                    {{ $edit ? "Update" : "Add" }}
                </button>
            </div>
        </form>
    </div>
</div>
