@extends('layouts.dashmaster')

@section('body')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Faculties</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <button type="button" class="btn bg-theme text-white me-2"><i class="fa fa-plus"> </i> New</button>
        </div>
    </div>

    <section class="containter-fluid my-5">
        <div class="row">
            <div class="col-md-12 px-2">
                <div class="card shadow-sm border-0">
                    <h4 class="card-header bg-light">Faculties</h4>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">Name</th>
                                        <th scope="col">Departments</th>
                                        <th scope="col">Dean of Faculty</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($faculties as $faculty)
                                        <tr>
                                            <td>{{ $faculty->name }}</td>
                                            <td>{{ $faculty->departments->count() }}</td>
                                            <td>{{ fake()->name() }}</td>
                                            <td>
                                                <a href="javascript:void(0)" id="' + data.id + '" role="button"
                                                    class="ml-1 editPack"><i class="text-success fa fa-eye"> <span
                                                            class="d-none d-md-inline-block"> </span></i></a>
                                                <a href="javascript:void(0)" id="' + data.id + '" role="button"
                                                    class="ml-1 editPack"><i class="text-primary fa fa-edit"> <span
                                                            class="d-none d-md-inline-block"> </span></i></a>
                                                <a href="javascript:void(0)" class="delPack" id="' + data.id + '"><i
                                                        class="text-danger fa fa-trash"> <span
                                                            class="d-none d-md-inline-block"> </span></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
