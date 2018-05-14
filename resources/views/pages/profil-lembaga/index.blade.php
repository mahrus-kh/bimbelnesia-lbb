@extends('templates.default')
@section('content')
    <div class="row">
        <div class="col-md-8 col-sm-8 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Profil Lembaga</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="{{ route('profil.edit') }}"><i class="fa fa-edit"></i> Edit Profil</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-3 profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <img class="img-responsive avatar-view" id="logo-image" src="" alt="Avatar">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-9">
                            <h3>
                                <text id="tutoring_agency"></text>
                                <small id="verified"></small>
                            </h3>
                            <ul class="list-unstyled user_data">
                                <li>Kategori : <text id="category"></text></li>
                                <li>Rating :
                                    <text id="star-rating"></text>
                                    (<text id="rating"></text>)
                                </li>
                                <li>Total Views : <text id="total_views"></text></li>
                            </ul>
                        </div>
                    </div>
                    <div class="ln_solid"></div>
                    <b>Alamat : </b> <text id="address"></text>
                    <div class="ln_solid"></div>
                    <b>Deskripsi : </b> <text id="description"></text>
                    <div class="ln_solid"></div>
                    <b>Sub Kategori : </b> <text id="sub_cateogry"></text>
                    <div class="ln_solid"></div>
                    <b>Tags : </b> <text id="tags"></text>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Kontak</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a onclick="edit_contact()" class="dropdown-toggle"><i class="fa fa-edit"></i> Edit Kontak</a></li>
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <a target="_blank"class="btn btn-default btn-sm"><i class="fa fa-globe"></i> <text id="website"></text></a>
                    <a target="_blank"class="btn btn-default btn-sm"><i class="fa fa-phone"></i> <text id="office_phone"></text></a>
                    <a target="_blank"class="btn btn-default btn-sm"><i class="fa fa-mobile"></i> <text id="mobile_phone"></text></a>
                    <a target="_blank"class="btn btn-default btn-sm"><i class="fa fa-envelope"></i> <text id="email"></text></a>
                    <a target="_blank"class="btn btn-default btn-sm"><i class="fa fa-facebook"></i> <text id="facebook"></text></a>
                    <a target="_blank"class="btn btn-default btn-sm"><i class="fa fa-instagram"></i> <text id="instagram"></text></a>
                    <br>
                    <label for="">Other Contact : </label> <text id="other_contacts"></text>
                </div>
            </div>
        </div>
    </div>

    {{--Modal Contact--}}
    @include('pages.profil-lembaga.modal.modal-contact')
    {{--End Contact--}}

@endsection

@section('javascript')

    @include('pages.profil-lembaga.blade-js.profil')

    @include('pages.profil-lembaga.blade-js.contact')

@endsection