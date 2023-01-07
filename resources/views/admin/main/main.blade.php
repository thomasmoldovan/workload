@extends('admin.index')

@section('main')
    <main id="main" class="main">

        <div class="container col-12 bg-white p-3">
            <div class="btn-group col-2">
                <button class="btn dropdown-toggle mb-2 btn-primary col-2" type="button" data-bs-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">Primary
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Separated link</a>
                </div>
            </div>
        </div>

    </main>
@endsection
