<div class="card rounded-0">
    <div class="card-body mt-2">
        <div class="card-title">
            {{ $edit ? "Edit" : "Add" }} promotion
        </div>
        <form wire:submit.prevent="submit">
            @csrf
            <input type="hidden" id="id" name="id" wire:model.defer.defer="promotiontype.id">
            <div class="col-md-12">
                <label for="name" class="form-label">Nom <b class="text-danger">*</b></label>
                <input type="text" class="form-control"
                    placeholder="Nom"
                    wire:model.defer="promotiontype.name">

                <div class="validation-message">
                    {{ $errors->first('promotiontype.name') }}
                </div>
            </div>

            <div class="col-md-12 pt-2">
                <label for="name" class="form-label">VE Present <b class="text-danger">*</b></label>
                <input type="number" class="form-control"
                    placeholder="Nom"
                    wire:model.defer="promotiontype.ve_present">

                <div class="validation-message">
                    {{ $errors->first('promotiontype.ve_present') }}
                </div>
            </div>

            <div class="col-md-12 pt-2">
                <label for="name" class="form-label">VE Enterprise <b class="text-danger">*</b></label>
                <input type="number" class="form-control"
                    placeholder="Nom"
                    wire:model.defer="promotiontype.ve_distance">

                <div class="validation-message">
                    {{ $errors->first('promotiontype.ve_distance') }}
                </div>
            </div>

            <div class="col-md-12 pt-2">
                <label for="name" class="form-label">EI <b class="text-danger">*</b></label>
                <input type="number" class="form-control"
                    placeholder="Nom"
                    wire:model.defer="promotiontype.ei">

                <div class="validation-message">
                    {{ $errors->first('promotiontype.ei') }}
                </div>
            </div>

            <div class="col-md-12 pt-2">
                <label for="name" class="form-label">SS Present <b class="text-danger">*</b></label>
                <input type="number" class="form-control"
                    placeholder="Nom"
                    wire:model.defer="promotiontype.ss_present">

                <div class="validation-message">
                    {{ $errors->first('promotiontype.ss_present') }}
                </div>
            </div>

            <div class="col-md-12 pt-2">
                <label for="name" class="form-label">SS Enterprise <b class="text-danger">*</b></label>
                <input type="number" class="form-control"
                    placeholder="Nom"
                    wire:model.defer="promotiontype.ss_distance">

                <div class="validation-message">
                    {{ $errors->first('promotiontype.ss_distance') }}
                </div>
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
