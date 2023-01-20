<div class="col-5">
    <div class="card">
        <div class="card-body pb-0">
            <div wire:ignore id="workflowChart" style="min-height: 445px;" class="echart"></div>

            <hr class="mt-2 mb-2">

            {{-- RESP. PEDAGOGIQUE --}}
            <div class="row pt-3">
                <div class="col-6 small">Resp. Pedagogique</div>
                <div class="col-3 small">{{ $responsable_pedagogique }} jours</div>
                <div class="col-3 small">{{ number_format($responsable_pedagogique * 100 / 210, 2) }} %</div>
            </div>

            {{-- PILOTE PROJET --}}
            <div class="row pt-3 ">
                <div class="col-6 small">Pilote Projet</div>
                <div class="col-3 small">{{ $pilote_projet }} jours</div>
                <div class="col-3 small">{{ number_format($pilote_projet * 100 / 210, 2) }} %</div>
            </div>
            
            {{-- FACE A FACE --}}
            <div class="row pt-3 pb-3">
                <div class="col-6 small">Face a Face</div>
                <div class="col-3 small">{{ $face_a_face }} jours</div>
                <div class="col-3 small">{{ number_format($face_a_face * 100 / 210, 2) }} %</div>
            </div>

            <hr class="mt-2 mb-2">

            <div class="d-flex float-end pb-2">
                <div class="bold">Total:</div>
                <div class="bold ps-2">{{ number_format($responsable_pedagogique * 100 / 210 + $pilote_projet * 100 / 210 + $face_a_face * 100 / 210, 2) }} %</div>
            </div>

            <script>
                document.addEventListener("DOMContentLoaded", () => {
                    window.echart = echarts.init(document.querySelector("#workflowChart"));
                    window.echart.setOption({
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
                                { value: 0, name: 'Responsable Pédagogique' },
                                { value: 0, name: 'Pilote Projet' },
                                { value: 0, name: 'Face à Face' },
                                { value: 0, name: 'Suivi Élève' },
                                { value: 0, name: 'Conception Nationale' },
                                { value: 0, name: 'Activités Campus' },
                                { value: 0, name: 'Activités Annexes' }
                            ]
                        }]
                    });

                    window.addEventListener('updateChart', event => {
                        window.echart.setOption({
                            series: [{
                                data: event.detail.data
                            }]
                        });
                    })
                });
            </script>
        </div>
    </div>
</div>
