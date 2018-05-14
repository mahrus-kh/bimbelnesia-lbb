<script type="text/javascript">
    var facility_dt;
    var url_facility;
    $(document).ready(function () {
        facility_dt = $("#facility-datatables").DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            bLengthChange: false,
            ajax: {
                headers: {Authorization: Cookies.get('token-auth')},
                url: "{{ env('API_URL') }}/facility/" + Cookies.get('token') + "/datatables",
                error: function () {
                    window.location.replace("{{ route('login') }}")
                }
            },
            columns: [
                {data: 'facility', name: 'facility'},
                {data: 'actions', name: 'actions', class: 'text-center', orderable: false}
            ]
        });;
    });
    function reloadFacility() {
        facility_dt.ajax.reload()
    }
    function create_facility() {
        $('[name=_method]').val("POST")
        url_facility = "{{ env('API_URL') }}/facility/" + Cookies.get('token')
        $("#facility-modal-label").html("Tambah Fasilitas Lembaga")
        $("#facility-modal-btn").attr("class", "btn btn-success")
        $("#facility-modal-btn").html("SAVE")
        $('.facility-modal form')[0].reset()
        $('.facility-modal').modal("show")
    }
    function edit_facility(id) {
        $('[name=_method]').val("PATCH")
        url_facility = "{{ env('API_URL') }}/facility/" + id
        $("#facility-modal-label").html("Update Fasilitas Lembaga")
        $("#facility-modal-btn").attr("class", "btn btn-info")
        $("#facility-modal-btn").html("UPDATE")

        $.ajax({
            type: "GET",
            url: "{{ env('API_URL') }}/facility/" + id + '/edit',
            headers: {Authorization: Cookies.get('token-auth')},
            dataType: "JSON",
            success: function (data) {
                $('[name=facility]').val(data.facility)
                $('.facility-modal').modal("show")
            },
            error: function () {
                alert("Something Wrong !")
            }
        });
    }
    $(function () {
        $('.facility-modal form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                $.ajax({
                    type: "POST",
                    url: url_facility,
                    headers: {Authorization: Cookies.get('token-auth')},
                    data: $('.facility-modal form').serialize(),
                    success: function (data) {
                        $('.facility-modal').modal("hide")
                        $('.facility-modal form')[0].reset()
                        facility_dt.ajax.reload()
                    },
                    error: function () {
                        alert("Something Wrong !")
                    }
                });
                return false
            }
        });
    });
    function destroy_facility(id) {
        if (confirm("Yakin Hapus ?")){
            $.ajax({
                type: "POST",
                url : "{{ env('API_URL') }}/facility/" + id,
                headers: {Authorization: Cookies.get('token-auth')},
                data: {_method: "DELETE", _token: "{{ csrf_token() }}"},
                success: function (data) {
                    facility_dt.ajax.reload();
                },
                error: function () {
                    alert("Something Wrong !")
                }
            })
        }
    }
</script>