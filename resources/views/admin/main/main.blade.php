@extends('admin.index')

@section('main')
    <main id="main" class="main p-2">
        <div class="container-fluid h-100 ps-0 pe-0">
            <div class="col-12 bg-white p-3">

                <div class="row">
                    <div class="col-7">
                        {{-- Select colaborator --}}
                        <livewire:colaborators.colaborators-component />

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
                                            <label class="pt-1">National time</label>
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
                                            <label class="pt-1">Campus activities</label>
                                        </td>
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
                                            <label class="pt-1">%#$@!&$ Projects</label>
                                        </td>
                                    </table>
                                </div>

                                <div class="col-4 ps-0 pe-0">
                                    <table class="table h-100">
                                        <td class="h-100 col-7" style="vertical-align: middle;">
                                            <label class="pt-1">Nr. Weeks</label>
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
                                            <label class="pt-1">Total days</label>
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
                                            <label class="pt-1">Project guidance</label>
                                        </td>
                                    </table>
                                </div>

                                <div class="col-4 ps-0 pe-0">
                                    <table class="table h-100">
                                        <td class="h-100 col-7" style="vertical-align: middle;">
                                            <label class="pt-1">Nr. 1/2 j</label>
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
                                            <label class="pt-1">Total days</label>
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
                    <div class="col-5">
                        <div class="card">
                            <div class="card-body pb-0">
                                <div id="workflowChart" style="min-height: 445px;" class="echart"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        echarts.init(document.querySelector("#workflowChart")).setOption({
                                            tooltip: {
                                                trigger: 'item'
                                            },
                                            legend: {
                                                top: '5%',
                                                orient: 'horizontal',
                                                center: 'right'
                                            },
                                            series: [{
                                                type: 'pie',
                                                top: '100px',
                                                radius: ['0%', '80%'],
                                                avoidLabelOverlap: false,
                                                emphasis: {
                                                    label: {
                                                        show: true,
                                                        fontSize: '14',
                                                        fontWeight: 'bold'
                                                    }
                                                },
                                                labelLine: {
                                                    show: true
                                                },
                                                data: [                                                    
                                                    { value: 1048, name: 'RESP. PEDAGOGIQUE' },
                                                    { value: 735,  name: 'PILOTE PROJET' },
                                                    { value: 580,  name: 'FACE A FACE' },
                                                    { value: 484,  name: 'SUIVI ELEVE' },
                                                    { value: 300,  name: 'CONCEPTION NATIONALE' }
                                                ]
                                            }]
                                        });
                                    });
                                </script>

                            </div>
                        </div>
                    </div>
                </div>
                                
            </div>
        </div>
    </main>
@endsection
