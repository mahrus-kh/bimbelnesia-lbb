@extends('templates.default')
@section('content')
    <div class="row">
        <div class="col-md-9 col-sm-10 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Edit Profil Lembaga</h2>
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a href="{{ route('profil.index') }}" class="dropdown-toggle"><i class="fa fa-backward"></i> Kembali</a></li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form method="post" class="form-horizontal form-label-left" enctype="multipart/form-data" id="profil-form">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Nama Lembaga<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" name="tutoring_agency" value="" class="form-control" required="required">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Logo</label>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                <input type="file" name="logo_image" class="form-control">
                            </div>
                            <div class="col-md-4 col-sm-4 col-xs-12">
                                (File: *.jpeg/jpg/png Max. 500 Kb)
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Kategori<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="checkbox">
                                    <text id="category"></text>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Sub Kategori<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="checkbox">
                                    <text id="sub_category"></text>
                                </div>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Alamat<span class="required">*</span></label>
                            <div class="col-md-10 col-sm-9 col-xs-12">
                                <textarea name="address" class="form-control" rows="4" maxlength="255" placeholder="Type here . . . (Max 255 character)" required="required"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Deskripsi<span class="required">*</span></label>
                            <div class="col-md-10 col-sm-9 col-xs-12">
                                <textarea name="description" class="form-control" rows="6" maxlength="500" placeholder="Type here . . . (Max 500 character)" required="required"></textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Tags</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <input type="text" name="tags" id="tags-input" class="form-control" data-role="tagsinput">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12"></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <button type="submit" class="btn btn-success">UPDATE</button>
                                <button type="button" class="btn btn-default" onclick="loadProfil()">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-12">
            <div class="x_panel">
                <div class="x_content"><label>Logo Lembaga</label>
                    <div class="x_panel">
                        <div class="x_content">
                            <img id="logo-image" alt="logo-image" class="img-responsive">
                        </div>
                    </div>
                    <label for="">Status</label> : <text id="status"></text><br>
                    <label for="">Rating</label> : <text id="star-rating"></text> (<text id="rating"></text>)<br>
                    <label for="">Total Views</label> : <text id="total_views"></text>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('javascript')

    @include('pages.profil-lembaga.blade-js.edit')

@endsection