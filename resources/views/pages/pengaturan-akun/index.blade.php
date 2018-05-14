@extends('templates.default')
@section('content')
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Pengaturan Akun</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <form method="post" class="form-horizontal form-label-left" enctype="multipart/form-data" id="account-form">
                        {{ csrf_field() }}
                        {{ method_field('PATCH') }}
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Pengelola<span class="required">*</span></label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                                <input type="text" name="name" value="" class="form-control" required="required" minlength="5" maxlength="25">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Telepon<span class="required">*</span></label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                                <input type="number" name="phone" value="" class="form-control" maxlength="13" required="required">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Alamat<span class="required">*</span></label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                                <textarea name="address" rows="2" class="form-control" maxlength="255" required="required"></textarea>
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Email<span class="required">*</span></label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                                <input type="email" name="email" value="" class="form-control" required="required" minlength="5" maxlength="255">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Password<span class="required">*</span></label>
                            <div class="col-md-8 col-sm-9 col-xs-12">
                                <input type="password" name="password" value="" class="form-control" required="required" minlength="8" max="255 ">
                                <span class="help-block with-errors"></span>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <button type="submit" class="btn btn-success">UPDATE</button>
                                <button type="button" class="btn btn-default" onclick="accountLoad()">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-4 col-xs-12">
        </div>
    </div>

@endsection

@section('javascript')

    @include('pages.pengaturan-akun.blade-js.pengaturan-akun')

@endsection