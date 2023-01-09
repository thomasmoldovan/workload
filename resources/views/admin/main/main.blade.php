@extends('admin.index')

@section('main')
    <main id="main" class="main">
        <div class="container-fluid h-100 ps-0 pe-0">
            <div class="col-12 bg-white p-3">

                {{-- Select colaborator --}}
                <livewire:colaborators-component />

                <hr class="mt-3 mb-0">

                {{-- Student --}}
                <livewire:student-promotion-component />

                {{-- Promotions --}}
                <livewire:promotion-goal-component />

            </div>
        </div>
    </main>
@endsection
