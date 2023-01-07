@extends('admin.index')

@section('main')
    <main id="main" class="main">
    <div class="container h-100">
        <div class="container col-12 bg-white p-3">

            {{-- Select colaborator --}}
            <div class="col-2">
                <select class="form-control">
                    <option class="dropdown-item" value="0">Select colaborator</option>
                    @foreach ($colaborators as $key => $colaborator)
                        <option class="dropdown-item" value="{{ $key }}">{{ $colaborator->name }} {{ $colaborator->surname }}</option>                        
                    @endforeach
                </select>
            </div>

            <hr class="mt-3">

            {{-- Student --}}
            <div class="form-group">
                <div class="row pt-3">
                    <label class="col-2 pt-1">Student</label>

                    <div class="col-2">
                        <label class="pt-1">Promotion type</label>
                        <select class="form-control">
                            <option class="dropdown-item" value="0">Select promotion</option>
                            @foreach ($promotions as $key => $promotion)
                                <option class="dropdown-item" value="{{ $key }}">{{ $promotion->name }} {{ $promotion->surname }}</option>                        
                            @endforeach
                        </select>
                    </div>

                    <div class="col-2">
                        <label class="pt-1" for="ab">Nr. of students</label>
                        <input type="text" class="form-control" min="0" step="1" id="ab">
                    </div>

                    <div class="col-2">
                        <label class="pt-1" for="ac">Total time (days)</label>
                        <input type="text" class="form-control" min="0" step="1" id="ac">
                    </div>
                </div>            
            </div>

        </div>
    </div>
    </main>
@endsection
