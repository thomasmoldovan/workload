@extends('admin.index')

@section('main')
    <main id="main" class="main">
        <div class="container-fluid h-100 ps-0 pe-0">
            <div class="col-12 bg-white p-3">

                {{-- Select colaborator --}}
                <livewire:colaborators-component />

                <hr class="mt-3 mb-3">

                {{-- Student --}}
                <livewire:student-promotion-component />

                {{-- Promotions --}}
                <livewire:promotion-goal-component />

                {{-- Workload extra info --}}
                <div id="workload-extra">                    
                    <div class="row col-8 ms-0 me-0">
                        <div class="col-6 ps-0 pe-0">
                            <table class="table h-100">
                                <td class="h-100 col-7" style="vertical-align: middle;">
                                    <label class="pt-1">National time</label>
                                </td>
                                <td class="h-100 col-5" style="vertical-align: middle;">
                                    <input type="number" class="form-control" id="inputField" min="0" step="1" value="0"/>
                                </td>
                            </table>
                        </div>
                    </div>
                    <div class="row col-8 ms-0 me-0">
                        <div class="col-6 ps-0 pe-0">
                            <table class="table h-100">
                                <td class="h-100 col-7" style="vertical-align: middle;">
                                    <label class="pt-1">Campus activities</label>
                                </td>
                                <td class="h-100 col-5" style="vertical-align: middle;">
                                    <input type="number" class="form-control" id="inputField" min="0" step="1" value="0"/>
                                </td>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Deliveries --}}
                <div id="deliveries">                    
                    <div class="row col-12 ms-0 me-0">
                        <div class="col-3 ps-0 pe-0">
                            <table class="table h-100">
                                <td class="h-100 col-7" style="vertical-align: middle;">
                                    <label class="pt-1">Deliveries</label>
                                </td>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Rejected projects --}}
                <div id="workload-extra">                    
                    <div class="row col-12 ms-0 me-0">
                        <div class="col-2 ps-0 pe-0">
                            <table class="table h-100">
                                <td class="h-100 col-7" style="vertical-align: middle;">
                                    <label class="pt-1">%#$@!&$ Projects</label>
                                </td>
                            </table>
                        </div>

                        <div class="col-3 ps-0 pe-0">
                            <table class="table h-100">
                                <td class="h-100 col-7" style="vertical-align: middle;">
                                    <label class="pt-1">Nr. Weeks</label>
                                </td>
                                <td class="h-100 col-5" style="vertical-align: middle;">
                                    <input type="number" class="form-control" id="inputField" min="0" step="1" value="0"/>
                                </td>
                            </table>
                        </div>

                        <div class="col-2 ps-0 pe-0">
                            <table class="table h-100">
                                <td class="h-100 col-7" style="vertical-align: middle;">
                                    <label class="pt-1">Total days</label>
                                </td>
                                <td class="h-100 col-5" style="vertical-align: middle;">
                                    <input type="number" class="form-control" id="inputField" min="0" step="1" value="0"/>
                                </td>
                            </table>
                        </div>
                    </div>
                </div>

                {{-- Project guidance --}}
                <div id="workload-extra">                    
                    <div class="row col-12 ms-0 me-0">
                        <div class="col-2 ps-0 pe-0">
                            <table class="table h-100">
                                <td class="h-100 col-7" style="vertical-align: middle;">
                                    <label class="pt-1">Project guidance</label>
                                </td>
                            </table>
                        </div>

                        <div class="col-3 ps-0 pe-0">
                            <table class="table h-100">
                                <td class="h-100 col-7" style="vertical-align: middle;">
                                    <label class="pt-1">Nr. 1/2 j</label>
                                </td>
                                <td class="h-100 col-5" style="vertical-align: middle;">
                                    <input type="number" class="form-control" id="inputField" min="0" step="1" value="0"/>
                                </td>
                            </table>
                        </div>

                        <div class="col-2 ps-0 pe-0">
                            <table class="table h-100">
                                <td class="h-100 col-7" style="vertical-align: middle;">
                                    <label class="pt-1">Total days</label>
                                </td>
                                <td class="h-100 col-5" style="vertical-align: middle;">
                                    <input type="number" class="form-control" id="inputField" min="0" step="1" value="0"/>
                                </td>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
