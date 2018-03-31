@extends('templates.default')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <h2>
                        Bimbingan Belajar Terpadu Forum Guru Malang
                        <small><label for="" class="label bg-green">Verified</label></small>
                    </h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Keunggulan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a onclick="create_excellence()" class="dropdown-toggle"><i class="fa fa-plus"></i> Add New</a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="table-responsive">
                        <table id="excellence-datatables" class="table table-striped table-hover">
                            <thead>
                            <tr>
                                <th>Keunggulan</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($api_request->excellence as $row)
                                <tr>
                                    <td>{{ $row->excellence }}</td>
                                    <td>
                                        <a onclick="edit_excellence({{ $row->id }})" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                        <a onclick="destroy_excellence({{ $row->id }})" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Fasilitas</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a onclick="create_facility()" class="dropdown-toggle"><i class="fa fa-plus"></i> Add New</a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="facility-datatables" class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Fasilitas</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($api_request->facility as $row)
                            <tr>
                                <td>{{ $row->facility }}</td>
                                <td>
                                    <a onclick="edit_facility({{ $row->id }})" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a onclick="destroy_facility({{ $row->id }})" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Paket Program Belajar</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a onclick="create_study_program()" class="dropdown-toggle"><i class="fa fa-plus"></i> Add New</a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <table id="study-program-datatables" class="table table-striped table-hover">
                        <thead>
                        <tr>
                            <th>Program Belajar</th>
                            <th>Biaya</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($api_request->study_program as $row)
                            <tr>
                                <td>{{ $row->study_program }}</td>
                                <td>
                                    <a onclick="edit_study_program({{ $row->id }})" class="btn btn-info btn-xs"><i class="fa fa-pencil"></i></a>
                                    <a onclick="destroy_study_program({{ $row->id }})" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')

    @include('pages.pelayanan-lembaga.blade-js.excellence')

    @include('pages.pelayanan-lembaga.blade-js.facility')

    @include('pages.pelayanan-lembaga.blade-js.study-program')


@endsection