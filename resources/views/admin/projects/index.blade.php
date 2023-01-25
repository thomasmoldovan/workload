@extends('admin.index')

@section('main')    
    <main id="main" class="main p-2">        
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-9 p-3 bg-white">
                    <livewire:projects.projects-grid />
                </div>
                <div class="col-lg-3 p-0 ps-2">
                    <livewire:projects.project-form />
                </div>
            </div>            
        </div>        
    </main>
@endsection
