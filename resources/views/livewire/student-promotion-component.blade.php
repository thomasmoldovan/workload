<div id="student-promotion-component">
    <div class="row col-12 ms-0 me-0 pb-3">

        {{-- Student section label --}}
        <div class="col-2 ps-0 pe-0">
            <table class="table h-100">
                <td class="h-100" style="vertical-align: middle;">
                    <label class="col-2 pt-1">Suivi Élèves</label>
                </td>
            </table>
        </div>

        {{-- Promotions list --}}
        <div class="col-10 ps-0 pe-0">
            <table class="table table-responsive h-100" style="border-collapse:collapse; border-bottom-width: 0.8px;">
                <tr class="header-background">
                    <th class="col-3">
                        <label class="pt-1 table-header-font">Promotion</label>
                        <form onkeydown="return event.key != 'Enter';" autocomplete="off">
                            <select wire:model="promotion_id" class="form-select" id="student-promotion-id">
                                <option class="dropdown-item" value="-1">Promotion</option>
                                @foreach ($promotions as $key => $promotion)
                                    <option class="dropdown-item" value="{{ $promotion->id }}">{{ $promotion->name }}</option>
                                @endforeach
                            </select>
                        </form>
                    </th>
                    <th class="col-2">
                        <label class="pt-1 table-header-font">N° Apprenants</label>
                        <form onkeydown="return event.key != 'Enter';" autocomplete="off">
                                <input wire:model="nr_students" type="number" 
                                    class="form-control" min="0" step="1" id="nr_students"
                                    value="0" />
                        </form>
                    </th>
                    <th class="col-2">
                        <label class="pt-1 table-header-font">Heurs</label>
                        <input wire:model="days" type="text" 
                               class="form-control form-end text-end" disabled readonly
                               value="0" />
                    </th>
                    <th class="col-1">
                        <label class="pt-1 table-header-font w-100">&nbsp</label>
                        <div class="d-flex justify-content-end">
                            <button type="button" 
                                    wire:click="addStudentPromotion()"
                                    class="btn {{ $add_enabled ? "btn-success" : "btn-secondary" }} btn-sm" 
                                    {{ $add_enabled ? "" : "disabled" }}>
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>                        
                    </th>
                    <th class="col-2">
                        <label class="pt-1 table-header-font w-100 text-center">Total jours</label>
                        <div class="d-flex justify-content-end">
                            <input type="text" class="form-control invisible" disabled readonly />
                        </div> 
                    </th>
                </tr>

            @forelse ($students as $key => $student)
                <tr style="vertical-align: middle; {{ $student->temporary ? "background: #ffd7c3;" : "" }}">
                    <td>
                        <span>
                            <span class="badge rounded-pill bg-primary" 
                                data-bs-toggle="tooltip" 
                                data-bs-original-title="{{ $student->promotion_type->name }}">
                                {{ $student->promotion_type->id }}
                            </span>
                            &nbsp;&nbsp;{{ $student->promotion->name }}
                        </span>
                    </td>
                    <td><span class="ps-2 ms-1">{{ $student->nr_students }}</span></td>
                    <td><span class="d-flex justify-content-end pe-1">{{ $student->days }} heurs</span></td>
                    <td>
                        <div class="d-flex justify-content-end">
                            <button wire:click="deleteStudentPromotion({{ $student->id }})" type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                        </div>
                    </td>
                    @if ($key == 0)
                        <td style="vertical-align: middle; background: #FFFFFF !important;" rowspan="0" class="bg-info">
                            <input value="{{ $total_hours." jours" }}" type="text" class="form-control" disabled readonly />
                        </td>
                    @endif
                </tr>
                
            @empty
                <tr>
                    <td colspan="5">
                        <div class="col-12 pt-3 text-center opacity-50"><h3>aucune entrée</h3></div>
                    </td>
                </tr>
            </table>
            @endforelse

            </table>
        </div>
    </div>
</div>
