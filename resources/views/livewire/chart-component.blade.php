<div class="col-5">
    <div class="card">
        <div class="card-body pb-0">
            <div wire:ignore id="workflowChart" style="min-height: 445px;" class="echart"></div>

            {{-- RESP. PEDAGOGIQUE --}}
            <div class="row pt-3">
                <div class="col-6 small">Resp. Pedagogique</div>
                <div class="col-3 small">{{ $responsable_pedagogique }} jours</div>
                <div class="col-3 small">{{ $responsable_pedagogique * 100 / 210 }} %</div>
            </div>
            <div class="row pt-3 pb-3">
                <div class="col-6 small">Pilote Projet</div>
                <div class="col-3 small">{{ $pilote_projet }} jours</div>
                <div class="col-3 small">{{ $pilote_projet * 100 / 210 }} %</div>
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
                                { value: {{ $responsable_pedagogique / 210 }}, name: 'RESP. PEDAGOGIQUE' },
                                { value: {{ $pilote_projet / 210 }},  name: 'PILOTE PROJET' },
                                { value: 580,  name: 'FACE A FACE' },
                                { value: 484,  name: 'SUIVI ELEVE' },
                                { value: 300,  name: 'CONCEPTION NATIONALE' },
                                { value: 300,  name: 'Activites Campus' },
                                { value: 300,  name: 'Activites Anexes' }
                            ]
                        }]
                    });

                    window.addEventListener('updateChart', event => {
                        window.echart.setOption({
                            series: [{
                                data: event.detail.data
                            }]
                        });
                        // chart.data.datasets[0].data = event.details.data;
                    })
                });

                

                document.addEventListener('updateChart', function(event, newData) {
                    console.log(newData);
                    // chart.data.datasets[0].data = newData;
                    // chart.update();
                });
            </script>
        </div>
    </div>
</div>
