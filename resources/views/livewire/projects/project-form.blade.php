<div class="card rounded-0">
    <div class="card-body mt-2">
        <div class="card-title">
            {{ $edit ? "Edit" : "Add" }} project
        </div>
        <form wire:submit.prevent="submit">
            @csrf
            <input type="hidden" id="id" name="id" wire:model.defer="project.id">
            <div class="col-md-12">
                <label for="name" class="form-label">Nom <b class="text-danger">*</b></label>
                <input wire:model="project.name" type="text" class="form-control"
                    placeholder="Project Name">

                <div class="validation-message">
                    {{ $errors->first('project.name') }}
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
