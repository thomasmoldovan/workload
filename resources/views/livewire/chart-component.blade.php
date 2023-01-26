<div class="col-5">
    <div class="<?= $chart_colaborator_name != "" ? "d-none" : "alert alert-info text-center"; ?>">
        No colaborator selected
    </div>
    
    <div class="<?= $chart_colaborator_name == "" ? "d-none" : "card rounded-0"; ?>">
        <h5 class="m-0 ps-3 pt-3 <?= $chart_colaborator_name == "" ? "d-none" : ""; ?>">
            {{ $chart_colaborator_name }}
            <hr>
        </h5>
        <div class="card-body pb-0 <?= $chart_colaborator_name == "" ? "d-none" : ""; ?>">
            <div wire:ignore id="workflowChart" style="min-height: 445px;" class="echart"></div>

            <hr class="mt-2 mb-2">

            {{-- RESP. PEDAGOGIQUE --}}
            <div class="row pt-3">
                <div class="col-6 small bold">Resp. Pedagogique</div>
                <div class="col-3 small">{{ $responsable_pedagogique }} jours</div>
                <div class="col-3 small text-end">{{ number_format($responsable_pedagogique * 100 / $settings["TOTAL_DAYS"], 2) }} %</div>
            </div>

            {{-- PLANIFICATION PROJETS --}}
            <div class="row pt-3 ">
                <div class="col-6 small bold">Planification Projets</div>
                <div class="col-3 small">{{ $pilote_projet }} semaines</div>
                <div class="col-3 small text-end">{{ number_format($pilote_projet * 100 / $settings["TOTAL_DAYS"], 2) }} %</div>
            </div>
            
            {{-- FACE A FACE --}}
            <div class="row pt-3">
                <div class="col-6 small bold">Face a Face</div>
                <div class="col-3 small">{{ $face_a_face }} jours</div>
                <div class="col-3 small text-end">{{ number_format($face_a_face * 100 / $settings["TOTAL_DAYS"], 2) }} %</div>
            </div>
            
            {{-- SUIVI ELEVE --}}
            <div class="row pt-3">
                <div class="col-6 small bold">Suivi Élèves</div>
                <div class="col-3 small">{{ $suivi_eleve }} jours</div>
                <div class="col-3 small text-end">{{ number_format($suivi_eleve * 100 / $settings["TOTAL_DAYS"], 2) }} %</div>
            </div>

            {{-- SUIVI ELEVE --}}
            <div class="row pt-3">
                <div class="col-6 small bold">Conception Nationale</div>
                <div class="col-3 small">{{ $conception_nationale }} jours</div>
                <div class="col-3 small text-end">{{ number_format($conception_nationale * 100 / $settings["TOTAL_DAYS"], 2) }} %</div>
            </div>

            {{-- SUIVI ELEVE --}}
            <div class="row pt-3">
                <div class="col-6 small bold">Activites Campus</div>
                <div class="col-3 small">{{ $activites_campus }} jours</div>
                <div class="col-3 small text-end">{{ number_format($activites_campus * 100 / $settings["TOTAL_DAYS"], 2) }} %</div>
            </div>

            {{-- SUIVI ELEVE --}}
            <div class="row pt-3 pb-3">
                <div class="col-6 small bold">Autres Activites</div>
                <div class="col-3 small">{{ $activites_anexe }} jours</div>
                <div class="col-3 small text-end">{{ number_format($activites_anexe * 100 / $settings["TOTAL_DAYS"], 2) }} %</div>
            </div>

            <hr class="mt-2 mb-2">

            <div class="d-flex float-end pb-2">
                <div class="bold">Total:</div>
                <div class="bold ps-2">
                    <?php 
                        $total_percentage = (float) number_format(
                            $responsable_pedagogique * 100 / $settings["TOTAL_DAYS"] +
                            $pilote_projet * 100 / $settings["TOTAL_DAYS"] +
                            $face_a_face * 100 / $settings["TOTAL_DAYS"] + 
                            $suivi_eleve * 100 / $settings["TOTAL_DAYS"] +
                            $conception_nationale * 100 / $settings["TOTAL_DAYS"] +
                            $activites_campus * 100 / $settings["TOTAL_DAYS"] +
                            $activites_anexe * 100 / $settings["TOTAL_DAYS"], 2);


                            $total_overload = $total_percentage - 100;
                    ?>
                    <div class="{{ $total_percentage <= 100 ? 'text-success' : 'text-danger' }}">{{ $total_percentage }} %</div>
                </div>
            </div>

            <div class="pb-4">
                <div class="d-flex progress w-100">
                    @if ($total_percentage > 100)
                        <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="{{ $total_percentage }}" aria-valuemin="0" aria-valuemax="{{ $total_percentage }}">100 %</div>
                        <div class="progress-bar bg-danger"  role="progressbar" style="width: {{ $total_overload }}%" aria-valuenow="{{ $total_overload }}" aria-valuemin="0" aria-valuemax="{{ $total_percentage }}">{{ $total_overload }} %</div>
                    @else
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $total_percentage }}%" aria-valuenow="{{ $total_percentage }}" aria-valuemin="0" aria-valuemax="{{ $total_percentage }}">{{ $total_percentage }} %</div>
                    @endif
                </div>
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
                                { value: 0, name: 'Planification Projets' },
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
