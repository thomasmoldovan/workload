<div>
    <div class="row col-12 ms-0 me-0">
        <div class="col-2 ps-0 pe-0">
            <table class="table h-100">
                <td class="h-100" style="vertical-align: middle;">
                    <label class="col-2 pt-1">Students</label>
                </td>
            </table>
        </div>
        <div class="col-10 ps-0 pe-0">
        
            <table class="table table-hover table-responsive h-100">
                <tr>
                    <th class="col-2">
                        <label class="pt-1">Promotion type</label>
                        <select wire:model="promotion_id" class="form-select" id="promotion_id">
                            <option class="dropdown-item" value="">Select promotion</option>
                            @foreach ($promotions as $key => $promotion)
                                <option class="dropdown-item" value="{{ $key + 1 }}">{{ $promotion->name }}
                                    {{ $promotion->surname }}</option>
                            @endforeach
                        </select>
                    </th>
                    <th class="col-2">
                        <label class="pt-1" for="ab">Nr. of students</label>
                        <input wire:model.debounce.10ms="nr_students" wire:beforeunload="reset" type="number" class="form-control" min="0" step="1" id="nr_students" />
                    </th>
                    <th class="col-2">
                        <label class="pt-1" for="ac">Total time (days)</label>
                        <input wire:model.debounce.10ms="days" wire:beforeunload="reset" type="number" class="form-control" min="0" step="1" id="days" />
                    </th>
                    <th class="col-2">
                        <label class="pt-1 w-100">&nbsp</label>
                        <button type="button" 
                                wire:click="addStudentPromotion()"
                                wire:beforeunload="reset"
                                class="btn {{ $add_enabled ? "btn-success" : "btn-secondary" }} btn-sm" 
                                {{ $add_enabled ? "" : "disabled" }}>
                            <i class="fa fa-plus"></i>
                        </button>
                    </th>
                </tr>

                @forelse ($students as $key => $student)
                    <tr style="vertical-align: middle;">
                        <td><span class="ps-2 ms-1">{{ $student->promotion->name }}</span></td>
                        <td><span class="ps-2 ms-1">{{ $student->nr_students }}</span></td>
                        <td><span class="ps-2 ms-1">{{ $student->days }}</span></td>
                        <td class="text-right">
                            <button wire:click="deleteStudentPromotion()" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>

                            {{-- <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></button> --}}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td  colspan="3">
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
            console.log("Resetting inputs");
            Livewire.emit('refreshComponent')
        });
    </script>
</div>
