<div wire:ignore class="col-5">
    <div class="card">
        <div class="card-body pb-0">
            <div id="workflowChart" style="min-height: 445px;" class="echart"></div>

            {{-- RESP. PEDAGOGIQUE --}}
            <div class="row pt-3 pb-3">
                <div class="col-4 small bold">Resp. Pedagogique</div>
                <div class="col-8 small bold">{{ $responsable_pedagogique }}</div>
            </div>

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
                                { value: 300,  name: 'CONCEPTION NATIONALE' },
                                { value: 300,  name: 'Activites Campus' },
                                { value: 300,  name: 'Activites Anexes' }
                            ]
                        }]
                    });
                });
            </script>
        </div>
    </div>
</div>
