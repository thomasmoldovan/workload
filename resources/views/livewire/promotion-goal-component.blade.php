<div id="student-promotion-component">
    <div class="row col-12 ms-0 me-0">

        {{-- Promotions section label --}}
        <div class="col-2 ps-0 pe-0">
            <table class="table h-100">
                <td class="h-100" style="vertical-align: middle;">
                    <label class="col-2 pt-1">Responsable Pedagogique</label>
                </td>
            </table>
        </div>

        {{-- Promotions list --}}
        <div class="col-10 ps-0 pe-0">        
            <table class="table table-stripped table-responsive h-100" style="border-collapse:collapse; border-bottom-width: 0.8px;">
                <tr class="header-background">
                    <th class="col-3">
                        <label class="pt-1 table-header-font">Promotion</label>
                        <select wire:model="promotion_id" class="form-select">
                            <option class="dropdown-item" value="">Promotion</option>
                            @foreach ($promotions as $key => $promotion)
                                <option class="dropdown-item" value="{{ $key + 1 }}">{{ $promotion->name }}
                                    {{ $promotion->surname }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th class="col-2">
                    </th>
                    <th class="col-2">
                        <label class="pt-1 table-header-font">Jeurs</label>
                        <input wire:model="days" type="text"
                               class="form-control form-end text-end" disabled readonly
                               value="0" />
                    </th>
                    <th class="col-1">
                        <label class="pt-1 table-header-font w-100">&nbsp</label>
                        <div class="d-flex justify-content-end">
                            <button type="button" 
                                    wire:click="addPromotionGoal()"
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

            @forelse ($goals as $key => $goal)
                <tr style="vertical-align: middle; {{ $goal->temporary ? "background: #ffd7c3;" : "" }}">
                    <td><span class="ps-2 ms-1">{{ $goal->promotion->name }} - {{ $goal->promotion->promotion_type->id }}</span></td>
                    <td>
                    </td>
                    <td><span class="d-flex justify-content-end pe-1">{{ $goal->promotion->days }} jours</span></td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <button wire:click="deletePromotionGoal({{ $goal->id }})" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            {{-- <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></button> --}}
                        </div>
                    </td>
                    @if ($key == 0)
                        <td style="vertical-align: middle;" rowspan="0">
                            <input value="{{ $total_hours." jours" }}" type="text" class="form-control" disabled readonly />
                        </td>
                    @endif
                </tr>
                
            @empty
                <tr>
                    <td colspan="5">
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
            console.log("Resetting goals");
            Livewire.emit('refreshComponent')
        });
    </script>
</div>
