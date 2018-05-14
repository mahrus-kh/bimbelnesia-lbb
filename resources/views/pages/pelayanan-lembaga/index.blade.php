@extends('templates.default')
@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <h2>
                        <text id="tutoring_agency"></text>
                        <small id="verified"></small>
                    </h2>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Keunggulan</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a onclick="create_excellence()" class="dropdown-toggle"><i class="fa fa-plus"></i></a></li>
                        <li><a onclick="reloadExcellence()" class="dropdown-toggle"><i class="fa fa-refresh"></i></a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
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
                        <li><a onclick="create_facility()" class="dropdown-toggle"><i class="fa fa-plus"></i></a></li>
                        <li><a onclick="reloadFacility()" class="dropdown-toggle"><i class="fa fa-refresh"></i></a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
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
                        <li><a onclick="create_study_program()" class="dropdown-toggle"><i class="fa fa-plus"></i></a></li>
                        <li><a onclick="reloadStudyProgram()" class="dropdown-toggle"><i class="fa fa-refresh"></i></a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{--Modal Excellence--}}
    @include('pages.pelayanan-lembaga.modal.modal-excellence')
    {{--End Modal Excellence--}}

    {{--Modal Facility--}}
    @include('pages.pelayanan-lembaga.modal.modal-facility')
    {{--End Modal Facility--}}

    {{--Modal Facility--}}
    @include('pages.pelayanan-lembaga.modal.modal-study-program')
    {{--End Modal Facility--}}

@endsection

@section('javascript')

    @include('pages.pelayanan-lembaga.blade-js.profil-singkat')

    @include('pages.pelayanan-lembaga.blade-js.excellence')

    @include('pages.pelayanan-lembaga.blade-js.facility')

    @include('pages.pelayanan-lembaga.blade-js.study-program')

@endsection