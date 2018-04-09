@extends('templates.default')
@section('content')
    <div class="row">
        <div class="col-md-10 col-sm-10 col-xs-12">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Tutoring Agency</h2>
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
                                <input type="text" name="tutoring_agency" value="{{ $profil->tutoring_agency }}" class="form-control" required="required">
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
                                    @foreach($category as $row)
                                        <label><input type="checkbox" name="category_id[]" value="{{ $row->id }}" {{ in_array($row->id , $profil->category_id) ? 'checked' : '' }}>{{ $row->category }} </label> |
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Sub Kategori<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <div class="checkbox">
                                    @foreach($sub_category as $row)
                                        <label><input type="checkbox" name="sub_category_id[]" value="{{ $row->id }}" {{ in_array($row->id , $profil->sub_category_id) ? 'checked' : '' }}>{{ $row->sub_category }} </label> |
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Status</label>
                            <div class="col-md-3 col-sm-3 col-xs-12">
                                <input type="text" class="form-control" value="{{ $profil->verified == 1 ? 'Verifikasi' : 'Belum Verifikasi' }}" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Rating</label>
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <input type="text" value="{{ $profil->rating }}" class="form-control" readonly="readonly">
                            </div>
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Total Views</label>
                            <div class="col-md-2 col-sm-2 col-xs-12">
                                <input type="text" value="{{ $profil->total_views }}" class="form-control" readonly="readonly">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Alamat<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea name="address" class="form-control" rows="4" maxlength="255" placeholder="Type here . . . (Max 255 character)" required="required">{{ $profil->address }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Deskripsi<span class="required">*</span></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea name="description" class="form-control" rows="6" maxlength="500" placeholder="Type here . . . (Max 500 character)" required="required">{{ $profil->description }}</textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12">Tags</label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <textarea name="tags" id="tags-input" class="form-control tags" rows="3" maxlength="255">
                                    @forelse($profil->tags as $tag)
                                        {{ $tag }},
                                    @empty
                                    @endforelse

                                </textarea>
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <label class="control-label col-md-2 col-sm-2 col-xs-12"></label>
                            <div class="col-md-9 col-sm-9 col-xs-12">
                                <button type="submit" class="btn btn-success">UPDATE</button>
                                <button class="btn btn-default" type="reset">Reset</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-2 col-sm-3 col-xs-12">
            <div class="x_panel">
                <div class="x_content">
                    <img src="{{ env('API_BASE_IMAGE') }}/{{ $profil->logo_image }}" alt="logo-image" class="img-responsive">
                </div>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript">
        $(document).ready(function () {
            $("#tags-input").tagsInput();
        });
        $(function () {
            $("#profil-form").validator().on('submit', function (e) {
                if (!e.isDefaultPrevented()){
                    $.ajax({
                        type: "POST",
                        url: "{{ env('API_URL') }}/lembaga/{{ $profil->id }}",
                        // data: $("#profil-form").serialize(),
                        data: new FormData($("#profil-form")[0]),
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            window.location.reload()
                        }
                    });
                    return false
                }
            });
        });
    </script>
@endsection