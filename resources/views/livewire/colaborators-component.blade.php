<div id="colaborators-component">
        <div class="row ps-0 pe-0">
            <div class="col-2">
                <select wire:model="colaborator_id" class="form-select">
                    <option class="dropdown-item" value="">Select colaborator</option>
                    @foreach ($colaborators as $key => $colaborator)
                        <option class="dropdown-item" value="{{ $key + 1 }}">{{ $colaborator->name }}
                            {{ $colaborator->surname }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-10 d-flex justify-content-end">
                <button wire:click="saveWorkload({{ $colaborator_id }})" class="btn btn-success btn-sm">Save</button>
            </div>
        </div>

    <script>
        $().ready(function() {
            console.log("Resetting colaborators");
            Livewire.emit('refreshComponent')
        });
    </script>
</div>
