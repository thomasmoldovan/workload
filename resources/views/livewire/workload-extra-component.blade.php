<div id="workload-extra">
    <div class="row col-12 ms-0 me-0">
        <div class="col-4 ps-0 pe-0">
            <table class="table h-100">
                <td class="h-100 col-3" style="vertical-align: middle;">
                    <label class="pt-1">Conception Nationale</label>
                </td>
                <td class="h-100 col-2" style="vertical-align: middle;">
                    <input wire:model="national_days" type="number" class="form-control" min="0" step="1"
                        value="0" />
                </td>
            </table>
        </div>                            
        <div class="col-4 ps-0 pe-0">
            <table class="table h-100">
                <td class="h-100 col-3" style="vertical-align: middle;">
                    <label class="pt-1">Activites Campus
                <td class="h-100 col-2" style="vertical-align: middle;">
                    <input wire:model="campus_days" type="number" class="form-control" min="0" step="1"
                        value="0" />
                </td>
            </table>
        </div>
        <div class="col-4 ps-0 pe-0">
            <table class="table h-100">
                <td class="h-100 col-3" style="vertical-align: middle;">
                    <label class="pt-1">Autres Activites
                <td class="h-100 col-2" style="vertical-align: middle;">
                    <input wire:model="delivery_days" type="number" class="form-control" min="0" step="1"
                        value="0" />
                </td>
            </table>
        </div>
    </div>
</div>
