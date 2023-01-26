@extends('admin.index')

@section('main')    
    <main id="main" class="main p-2">        
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 p-3 bg-white">
                    <livewire:overview.overview-grid />
                </div>
            </div>            
        </div>        
    </main>
@endsection
