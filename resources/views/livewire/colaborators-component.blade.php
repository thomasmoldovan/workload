<div id="colaborators-component">
        <div class="row ps-0 pe-0">
            <div class="col-4">
                <select wire:model="colaborator_id" class="form-select" id="colaborator_id">
                    <option class="dropdown-item" value="-1">Select colaborator</option>
                    @foreach ($colaborators as $key => $colaborator)
                        <option class="dropdown-item" value="{{ $key + 1 }}">{{ $colaborator->name }}
                            {{ $colaborator->surname }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-8 d-flex justify-content-end">
                <button wire:click="saveWorkload({{ $colaborator_id }})" 
                        class="btn {{ $save_enabled ? "btn-success" : "btn-secondary" }} btn-sm ">
                    Save
                </button>
            </div>
        </div>

    <script>
        $().ready(function() {
            console.log("Resetting colaborators");
            Livewire.emit('refreshComponent')
        });
    </script>
</div>
