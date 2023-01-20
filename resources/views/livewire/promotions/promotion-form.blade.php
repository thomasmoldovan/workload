<div class="card rounded-0">
    <div class="card-body mt-2">
        <div class="card-title">
            {{ $edit ? "Edit" : "Add" }} promotion
        </div>
        <form wire:submit.prevent="submit">
            @csrf
            <input type="hidden" id="id" name="id" wire:model.defer="promotion.id">

            {{-- Promotion name --}}
            <div class="col-md-12">
                <label for="name" class="form-label">Nom <b class="text-danger">*</b></label>
                <input type="text" id="name" name="name" class="form-control"
                    placeholder="Nom"
                    wire:model.defer="promotion.name">

                <div class="validation-message">
                    {{ $errors->first('promotion.name') }}
                </div>
            </div>

            {{-- Promotion type --}}
            <div class="col-md-12 pt-2">
                <label for="promotion_type_id" class="form-label">Taper <b class="text-danger">*</b></label>
                <select id="promotion_type_id" name="promotion_type_id" class="form-select"
                    wire:model.defer="promotion.promotion_type_id">
                    <option value="" selected>Taper</option>
                    @foreach ($promotionTypes as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>

                <div class="validation-message">
                    {{ $errors->first('promotion.promotion_type_id') }}
                </div>
            </div>

            {{-- Presence weeks --}}
            <div class="col-md-12 pt-2">
                <label for="presence_weeks" class="form-label">Présence semaines <b class="text-danger">*</b></label>
                <input type="number" min="0" 
                    id="presence_weeks" name="presence_weeks" class="form-control"
                    placeholder="Présence semaines"
                    wire:model.defer="promotion.presence_weeks">

                <div class="validation-message">
                    {{ $errors->first('promotion.presence_weeks') }}
                </div>
            </div>

            {{-- Presence days --}}
            <div class="col-md-12 pt-2">
                <label for="presence_days" class="form-label">Présence jours <b class="text-danger">*</b></label>
                <input type="number" min="0" 
                    id="presence_days" name="presence_days" class="form-control"
                    placeholder="Présence jours"
                    wire:model.defer="promotion.presence_days">

                <div class="validation-message">
                    {{ $errors->first('promotion.presence_days') }}
                </div>
            </div>

            {{-- Enterprise weeks --}}
            <div class="col-md-12 pt-2">
                <label for="enterprise_weeks" class="form-label">Enterprise semaines <b class="text-danger">*</b></label>
                <input type="number" min="0" 
                    id="enterprise_weeks" name="enterprise_weeks" class="form-control"
                    placeholder="Enterprise semaines"
                    wire:model.defer="promotion.enterprise_weeks">

                <div class="validation-message">
                    {{ $errors->first('promotion.enterprise_weeks') }}
                </div>
            </div>

            {{-- Enterprise days --}}
            <div class="col-md-12 pt-2">
                <label for="enterprise_days" class="form-label">Enterprise jours <b class="text-danger">*</b></label>
                <input type="number" min="0" 
                    id="enterprise_days" name="enterprise_days" class="form-control"
                    placeholder="Enterprise jours"
                    wire:model.defer="promotion.enterprise_days">

                <div class="validation-message">
                    {{ $errors->first('promotion.presence_days') }}
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
