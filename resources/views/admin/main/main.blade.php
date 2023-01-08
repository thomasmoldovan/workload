@extends('admin.index')

@section('main')
    <main id="main" class="main">
        <div class="container-fluid h-100 ps-0 pe-0">
            <div class="col-12 bg-white p-3">

                {{-- Select colaborator --}}
                <div class="col-2">
                    <select class="form-select">
                        <option class="dropdown-item" value="0">Select colaborator</option>
                        @foreach ($colaborators as $key => $colaborator)
                            <option class="dropdown-item" value="{{ $key }}">{{ $colaborator->name }}
                                {{ $colaborator->surname }}</option>
                        @endforeach
                    </select>
                </div>

                <hr class="mt-3 mb-0">

                {{-- Student --}}
                <div class="row col-12 ms-0 me-0">
                    <div class="col-2 ps-0 pe-0">
                        <table class="table h-100">
                            <td class="h-100" style="vertical-align: middle;">
                                <label class="col-2 pt-1">Students</label>
                            </td>
                        </table>
                    </div>
                    <div class="col-10 ps-0 pe-0">
                        <table class="table table-hover table-responsive h-100">
                            <tr>
                                <th class="col-2">
                                    <label class="pt-1">Promotion type</label>
                                    <select class="form-select">
                                        <option class="dropdown-item" value="0">Select promotion</option>
                                        @foreach ($promotions as $key => $promotion)
                                            <option class="dropdown-item" value="{{ $key }}">{{ $promotion->name }}
                                                {{ $promotion->surname }}</option>
                                        @endforeach
                                    </select>
                                </th>
                                <th class="col-2">
                                    <label class="pt-1" for="ab">Nr. of students</label>
                                    <input type="number" class="form-control" min="0" step="1" id="ab" value="0">
                                </th>
                                <th class="col-2">
                                    <label class="pt-1" for="ac">Total time (days)</label>
                                    <input type="number" class="form-control" min="0" step="1" id="ac" value="0">
                                </th>
                                <th class="col-2">
                                    <label class="pt-1 w-100">&nbsp</label>
                                    <button type="submit" class="btn btn-secondary btn-sm" disabled><i class="fa fa-plus"></i></button>
                                </th>
                            </tr>

                            <tr style="vertical-align: middle;">
                                <td><span class="ps-2 ms-1">FISA</span></td>
                                <td><span class="ps-2 ms-1">12</span></td>
                                <td><span class="ps-2 ms-1">24</span></td>
                                <td class="text-right">
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></button>
                                </td>
                            </tr>

                            <tr style="vertical-align: middle;">
                                <td><span class="ps-2 ms-1">FISA</span></td>
                                <td><span class="ps-2 ms-1">12</span></td>
                                <td><span class="ps-2 ms-1">24</span></td>
                                <td class="text-right">
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></button>
                                </td>
                            </tr>

                            <tr style="vertical-align: middle;">
                                <td><span class="ps-2 ms-1">FISA</span></td>
                                <td><span class="ps-2 ms-1">12</span></td>
                                <td><span class="ps-2 ms-1">24</span></td>
                                <td>
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                    <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-pen"></i></button>
                                </td>
                            </tr>
                        </table>
                    </div>                
                </div>

            </div>
        </div>
    </main>
@endsection
