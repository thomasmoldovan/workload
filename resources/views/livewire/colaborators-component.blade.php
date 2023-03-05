<div id="colaborators-component">
        <div class="row ps-0 pe-0">
            <div class="col-4">
                <form autocomplete="off">
                    <select wire:model="colaborator_id" class="form-select" id="colaborator_id">
                        <option class="dropdown-item" value="-1">Select colaborator</option>
                        @foreach ($colaborators as $key => $colaborator)
                            <option class="dropdown-item" value="{{ $colaborator->id }}">{{ $colaborator->surname }}
                                {{ $colaborator->lastname }}</option>
                        @endforeach
                    </select>
                </form>
            </div>
            
            {{-- <div class="col-8 d-flex justify-content-end">
                <button wire:click="exportPDF({{ $colaborator_id }})" 
                        class="btn {{ $save_enabled ? "btn-success" : "btn-secondary" }} btn-sm ">
                    Export PDF
                </button>
            </div> --}}

            <div class="col-8 d-flex justify-content-end">
                <button wire:click="saveWorkload({{ $colaborator_id }})" 
                        class="btn {{ $save_enabled ? "btn-success" : "d-none" }} btn-sm ">
                    Save
                </button>
            </div>
        </div>
</div>
