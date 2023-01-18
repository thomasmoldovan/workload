@extends('admin.index')

@section('main')
    <main id="main" class="main p-2">
        <div class="container-fluid h-100 ps-0 pe-0">
            <div class="col-12 bg-white p-3">

                <div class="row">
                    <div class="col-7">
                        {{-- Select colaborator --}}
                        <livewire:colaborators-component />

                        <hr class="mt-3 mb-3">

                        {{-- Student --}}
                        <livewire:student-promotion-component />

                        {{-- Promotions --}}
                        <livewire:promotion-goal-component />

                        {{-- Workload extra info --}}
                        <div id="workload-extra">
                            <div class="row col-12 ms-0 me-0">
                                <div class="col-6 ps-0 pe-0">
                                    <table class="table h-100">
                                        <td class="h-100 col-3" style="vertical-align: middle;">
                                            <label class="pt-1">Concaption Nationale</label>
                                        </td>
                                        <td class="h-100 col-2" style="vertical-align: middle;">
                                            <input type="number" class="form-control" id="inputField" min="0" step="1"
                                                value="0" />
                                        </td>
                                    </table>
                                </div>                            
                                <div class="col-6 ps-0 pe-0">
                                    <table class="table h-100">
                                        <td class="h-100 col-3" style="vertical-align: middle;">
                                            <label class="pt-1">Activites Campus
                                        <td class="h-100 col-2" style="vertical-align: middle;">
                                            <input type="number" class="form-control" id="inputField" min="0" step="1"
                                                value="0" />
                                        </td>
                                    </table>
                                </div>
                            </div>
                        </div>

                        {{-- Deliveries --}}
                        <livewire:project-delivery-component>

                        {{-- Rejected projects --}}
                        <div id="workload-extra">
                            <div class="row col-12 ms-0 me-0">
                                <div class="col-4 ps-0 pe-0">
                                    <table class="table h-100">
                                        <td class="h-100 col-7" style="vertical-align: middle;">
                                            <label class="pt-1">Responsable Projets</label>
                                        </td>
                                    </table>
                                </div>

                                <div class="col-4 ps-0 pe-0">
                                    <table class="table h-100">
                                        <td class="h-100 col-7" style="vertical-align: middle;">
                                            <label class="pt-1">N° Semaines</label>
                                        </td>
                                        <td class="h-100 col-5" style="vertical-align: middle;">
                                            <input type="number" class="form-control" id="inputField" min="0" step="1"
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
                                            <input type="number" class="form-control" id="inputField" min="0" step="1"
                                                value="0" />
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
                                            <input type="number" class="form-control" id="inputField" min="0"
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
                                            <input type="number" class="form-control" id="inputField" min="0"
                                                step="1" value="0" />
                                        </td>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Pie chart --}}
                    <livewire:chart-component>
                </div>
                                
            </div>
        </div>
    </main>
@endsection
