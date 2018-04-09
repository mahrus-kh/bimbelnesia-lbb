<script type="text/javascript">
    var facility_dt;
    var url_facility;
    $(document).ready(function () {
        facility_dt = $("#facility-datatables").DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            bLengthChange: false,
            ajax: "{{ env('API_URL') }}/facility/1/datatables",
            columns: [
                {data: 'facility', name: 'facility'},
                {data: 'actions', name: 'actions', class: 'text-center', orderable: false}
            ]
        });;
    });
    function create_facility() {
        $('[name=_method]').val("POST")
        url_facility = "{{ env('API_URL') }}/facility/1"
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
            dataType: "JSON",
            success: function (data) {
                $('[name=facility]').val(data.facility)
                $('.facility-modal').modal("show")
            },
            error: function () {
                alert("Not Found")
            }
        });
    }
    $(function () {
        $('.facility-modal form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                $.ajax({
                    type: "POST",
                    url: url_facility,
                    data: $('.facility-modal form').serialize(),
                    success: function (data) {
                        $('.facility-modal').modal("hide")
                        $('.facility-modal form')[0].reset()
                        facility_dt.ajax.reload();
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