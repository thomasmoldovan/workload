@extends('admin.index')

@section('main')
    <main id="main" class="main p-2">
        <div class="container-fluid h-100 ps-0 pe-0">
            <div class="col-12 bg-white p-3">

                <div class="row">
                    <div class="col-7">
                        {{-- Select colaborator --}}
                        <livewire:colaborators-component :colaborators="$colaborators" />

                        <hr class="mt-3 mb-3">

                        {{-- Student --}}
                        <livewire:student-promotion-component :promotions="$promotions" />

                        {{-- Promotions --}}
                        <livewire:promotion-goal-component :promotions="$promotions"/>

                        {{-- Workload extra info --}}
                        <livewire:workload-extra-component />

                        {{-- Deliveries --}}
                        <livewire:project-delivery-component :projects="$projects" />

                        {{-- Workload projects --}}
                        <livewire:workload-projects-component>

                    </div>

                    {{-- Pie chart --}}
                    <livewire:chart-component>
                </div>
                                
            </div>
        </div>
    </main>
@endsection
