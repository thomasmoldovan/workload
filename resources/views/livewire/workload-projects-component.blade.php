<div>
    {{-- Rejected projects --}}
    <div id="workload-extra">
        <div class="row col-12 ms-0 me-0">
            <div class="col-4 ps-0 pe-0">
                <table class="table h-100">
                    <td class="h-100 col-7" style="vertical-align: middle;">
                        <label class="pt-1">Planification Projets</label>
                    </td>
                </table>
            </div>

            <div class="col-4 ps-0 pe-0">
                <table class="table h-100">
                    <td class="h-100 col-7" style="vertical-align: middle;">
                        <label class="pt-1">N° Semaines</label>
                    </td>
                    <td class="h-100 col-5" style="vertical-align: middle;">
                        <input wire:model="project_weeks" type="number" class="form-control" id="inputField" min="0" step="0.5"
                            value="0" />
                    </td>
                </table>
            </div>

            <div class="col-4 ps-0 pe-0">
                <table class="table h-100">
                    <td class="h-100 col-7" style="vertical-align: middle;">
                        <label class="pt-1">Total jours</label>
                    </td>
                    <td class="h-100 col-5" style="vertical-align: middle;">
                        <input wire:model="project_total" type="number" class="form-control" id="inputField" value="0" disabled readonly/>
                    </td>
                </table>
            </div>
        </div>
    </div>

    {{-- Project guidance --}}
    <div id="workload-extra">
        <div class="row col-12 ms-0 me-0">
            <div class="col-4 ps-0 pe-0">
                <table class="table h-100">
                    <td class="h-100 col-7" style="vertical-align: middle;">
                        <label class="pt-1">Tuteur Projet</label>
                    </td>
                </table>
            </div>

            <div class="col-4 ps-0 pe-0">
                <table class="table h-100">
                    <td class="h-100 col-7" style="vertical-align: middle;">
                        <label class="pt-1">N° 1/2 j</label>
                    </td>
                    <td class="h-100 col-5" style="vertical-align: middle;">
                        <input wire:model="project_guidance" type="number" class="form-control" id="inputField" min="0"
                            step="1" value="0" />
                    </td>
                </table>
            </div>

            <div class="col-4 ps-0 pe-0">
                <table class="table h-100">
                    <td class="h-100 col-7" style="vertical-align: middle;">
                        <label class="pt-1">Total jours</label>
                    </td>
                    <td class="h-100 col-5" style="vertical-align: middle;">
                        <input wire:model="project_days" type="number" class="form-control" id="inputField" value="0" disabled readonly/>
                    </td>
                </table>
            </div>
        </div>
    </div>
</div>
