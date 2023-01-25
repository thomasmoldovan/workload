<div id="project-delivery-component">
    <div class="row col-12 ms-0 me-0 pb-3 pt-3">

        {{-- Delivery section label --}}
        <div class="col-2 ps-0 pe-0">
            <table class="table h-100">
                <td class="h-100" style="vertical-align: middle;">
                    <label>Planning</br> face a face</label>
                </td>
            </table>
        </div>

        {{-- Project list --}}
        <div class="col-10 ps-0 pe-0">        
            <table class="table table-stripped table-responsive h-100" style="border-collapse:collapse; border-bottom-width: 0.8px;">
                <tr class="header-background">
                    <th class="col-3">
                        <label class="pt-1 table-header-font">Project</label>
                        <form autocomplete="off">
                            <select wire:model="project_id" class="form-select" id="project_id">
                                <option class="dropdown-item" value="">Select project</option>
                                @foreach ($projects as $key => $project)
                                    <option class="dropdown-item" value="{{ $key + 1 }}">{{ $project->name }}</option>
                                @endforeach
                            </select>
                        </form>
                    </th>
                    <th class="col-2">
                        <label class="pt-1 table-header-font">Nr. hours</label>
                        <form autocomplete="off">
                            <input wire:model="nr_hours" type="number" 
                                class="form-control form-end" min="0" step="1"
                                value="0" />
                        </form>
                    </th>
                    <th class="col-2">
                        <label class="pt-1 table-header-font">Multiply</label>
                        <form autocomplete="off">
                            <input wire:model="multiplier" type="number" 
                                class="form-control form-end" min="0" step="0.5"
                                value="0" />
                        </form>
                    </div>
                    <th class="col-1">
                        <label class="pt-1 table-header-font w-100">&nbsp</label>
                        <div class="d-flex justify-content-end">
                            <button type="button" 
                                    wire:click="addProjectDelivery()"
                                    class="btn {{ $add_enabled ? "btn-success" : "btn-secondary" }} btn-sm" 
                                    {{ $add_enabled ? "" : "disabled" }}>
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>                        
                    </th>
                    <th class="col-2">
                        <label class="pt-1 table-header-font w-100 text-center">Total jours</label>
                        <div class="d-flex justify-content-end">
                            <input class="form-control invisible" disabled readonly/>
                        </div> 
                    </th>
                </tr>

            @forelse ($deliveries as $key => $delivery)
                <tr style="vertical-align: middle; {{ $delivery->temporary ? "background: #ffd7c3;" : "" }}">
                    <td colspan="2"><span class="ps-2 ms-1">{{ $delivery->project->name }}</span></td>
                    <td><span class="d-flex justify-content-end pe-1">{{ $delivery->nr_hours }} heurs x {{ $delivery->multiplier }}</span></td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <button wire:click="deleteProjectDelivery({{ $delivery->id }})" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            {{-- <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></button> --}}
                        </div>
                    </td>
                    @if ($key == 0)
                        <td style="vertical-align: middle;" rowspan="0">
                            <input value="{{ $total_days." jeurs" }}" type="text" class="form-control" disabled readonly />
                        </td>
                    @endif
                </tr>
                
            @empty
                <tr>
                    <td colspan="4">
                        <div class="col-12 pt-3 text-center opacity-50"><h3>aucune entrée</h3></div>
                    </td>
                </tr>
            </table>
            @endforelse

            </table>
        </div>
    </div>
</div>
