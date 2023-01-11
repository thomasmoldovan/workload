<div id="project-delivery-component">
    <div class="row col-12 ms-0 me-0 pb-3 pt-3">

        {{-- Delivery section label --}}
        <div class="col-2 ps-0 pe-0">
            <table class="table h-100">
                <td class="h-100" style="vertical-align: middle;">
                    <label class="col-2 pt-1">Deliveries</label>
                </td>
            </table>
        </div>

        {{-- Project list --}}
        <div class="col-10 ps-0 pe-0">        
            <table class="table table-stripped table-responsive h-100" style="border-collapse:collapse; border-bottom-width: 0.8px;">
                <tr class="header-background">
                    <th class="col-4">
                        <label class="pt-1 table-header-font">Project</label>
                        <select wire:model="project_id" class="form-select" id="project_id">
                            <option class="dropdown-item" value="">Select project</option>
                            @foreach ($projects as $key => $project)
                                <option class="dropdown-item" value="{{ $key + 1 }}">{{ $project->name }}
                                    {{ $project->surname }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th class="col-3">
                        <label class="pt-1 table-header-font" for="ab">Nr. hours</label>
                        <input wire:model.debounce.10ms="nr_hours" type="number" 
                               class="form-control" min="0" step="1"
                               value="0" />
                    </th>
                    <th class="col-2">
                        <label class="pt-1 table-header-font w-100">&nbsp</label>
                        <div class="d-flex justify-content-end">
                            <button type="button" 
                                    wire:click="addProjectDelivery()"
                                    wire:beforeunload="reset"
                                    class="btn {{ $add_enabled ? "btn-success" : "btn-secondary" }} btn-sm" 
                                    {{ $add_enabled ? "" : "disabled" }}>
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>                        
                    </th>
                    <th class="col-3">
                        <label class="pt-1 table-header-font w-100 text-center">Total days</label>
                        <div class="d-flex justify-content-end">
                            <input class="form-control invisible" disabled readonly/>
                        </div> 
                    </th>
                </tr>

            @forelse ($deliveries as $key => $delivery)
                <tr style="vertical-align: middle; {{ $delivery->temporary ? "background: #ffd7c3;" : "" }}">
                    <td><span class="ps-2 ms-1">{{ $delivery->project->name }}</span></td>
                    <td><span class="ps-2 ms-1">{{ $delivery->nr_students }}</span></td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <button wire:click="deleteProjectDelivery({{ $delivery->id }})" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            {{-- <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></button> --}}
                        </div>
                    </td>
                    @if ($key == 0)
                        <td style="vertical-align: middle;" rowspan="0">
                            <input wire:model.debounce.10ms="days" type="number" class="form-control" min="0" step="1" id="days" />
                        </td>
                    @endif
                </tr>
                
            @empty
                <tr>
                    <td colspan="4">
                        <div class="col-12 pt-3 text-center opacity-50"><h3>Empty</h3></div>
                    </td>
                </tr>
            </table>
            @endforelse

            </table>
        </div>
    </div>

    <script>
        $().ready(function() {
            console.log("Resetting deliveries");
            Livewire.emit('refreshComponent')
        });
    </script>
</div>
