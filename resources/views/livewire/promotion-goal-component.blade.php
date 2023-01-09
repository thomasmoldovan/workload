<div id="student-promotion-component">
    <div class="row col-12 ms-0 me-0">

        {{-- Promotions section label --}}
        <div class="col-1 ps-0 pe-0">
            <table class="table h-100">
                <td class="h-100" style="vertical-align: middle;">
                    <label class="col-2 pt-1">Promotions</label>
                </td>
            </table>
        </div>

        {{-- Promotions list --}}
        <div class="col-6 ps-0 pe-0">        
            <table class="table table-stripped table-responsive h-100" style="border-collapse:collapse; border-bottom-width: 0.8px;">
                <tr>
                    <th class="col-4">
                        <label class="pt-1">Promotion type</label>
                        <select wire:model="promotion_id" class="form-select" id="promotion_id">
                            <option class="dropdown-item" value="">Select promotion</option>
                            @foreach ($promotions as $key => $promotion)
                                <option class="dropdown-item" value="{{ $key + 1 }}">{{ $promotion->name }}
                                    {{ $promotion->surname }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th class="col-3">
                        <label class="pt-1" for="ab">Nr. of students</label>
                        <input wire:model.debounce.10ms="nr_students" type="number" 
                               class="form-control" min="0" step="1" id="nr_students"
                               value="{{ random_int(1, 100) }}" />
                    </th>
                    <th class="col-2">
                        <label class="pt-1 w-100">&nbsp</label>
                        <div class="d-flex justify-content-end">
                            <button type="button" 
                                    wire:click="addPromotionGoal()"
                                    wire:beforeunload="reset"
                                    class="btn {{ $add_enabled ? "btn-success" : "btn-secondary" }} btn-sm" 
                                    {{ $add_enabled ? "" : "disabled" }}>
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>                        
                    </th>
                    <th class="col-3">
                        <label class="pt-1 w-100 text-center">Total days</label>
                        <div class="d-flex justify-content-end">
                            <input class="form-control invisible" disabled readonly/>
                        </div> 
                    </th>
                </tr>

            @forelse ($goals as $key => $goal)
                <tr style="vertical-align: middle; {{ $goal->temporary ? "background: #ffd7c3;" : "" }}">
                    <td><span class="ps-2 ms-1">{{ $goal->promotion->name }}</span></td>
                    <td><span class="ps-2 ms-1">{{ $goal->nr_students }}</span></td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <button wire:click="deletePromotionGoal({{ $goal->id }})" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
                        <div class="col-12 pt-3 text-center"><h3>Nothing here</h3></div>
                    </td>
                </tr>
            </table>
            @endforelse

            </table>
        </div>
    </div>

    <script>
        $().ready(function() {
            console.log("Resetting goals");
            Livewire.emit('refreshComponent')
        });
    </script>
</div>
