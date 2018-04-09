<script type="text/javascript">
    var excellence_dt;
    var url_excellence;
    $(document).ready(function () {
        excellence_dt = $("#excellence-datatables").DataTable({
            processing: true,
            serverSide: true,
            searching: false,
            bLengthChange: false,
            ajax: "{{ env('API_URL') }}/excellence/1/datatables",
            columns: [
                {data: 'excellence', name: 'excellence'},
                {data: 'actions', name: 'actions', class: 'text-center', orderable: false}
            ]
        });
    });
    function create_excellence() {
        $('[name=_method]').val("POST")
        url_excellence = "{{ env('API_URL') }}/excellence/1"
        $("#excellence-modal-label").html("Tambah Keunggulan Lembaga")
        $("#excellence-modal-btn").attr("class", "btn btn-success")
        $("#excellence-modal-btn").html("SAVE")
        $('.excellence-modal form')[0].reset()
        $('.excellence-modal').modal("show")
    }
    function edit_excellence(id) {
        $('[name=_method]').val("PATCH")
        url_excellence = "{{ env('API_URL') }}/excellence/" + id
        $("#excellence-modal-label").html("Update Keunggulan Lembaga")
        $("#excellence-modal-btn").attr("class", "btn btn-info")
        $("#excellence-modal-btn").html("UPDATE")

        $.ajax({
            type: "GET",
            url: "{{ env('API_URL') }}/excellence/" + id + '/edit',
            dataType: "JSON",
            success: function (data) {
                $('[name=excellence]').val(data.excellence)
                $('.excellence-modal').modal("show")
            },
            error: function () {
                alert("Not Found")
            }
        });
    }
    $(function () {
        $('.excellence-modal form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                $.ajax({
                    type: "POST",
                    url: url_excellence,
                    data: $('.excellence-modal form').serialize(),
                    success: function (data) {
                        $('.excellence-modal').modal("hide")
                        $('.excellence-modal form')[0].reset()
                        excellence_dt.ajax.reload();
                    },
                    error: function () {
                        alert("Something Wrong !")
                    }
                });
                return false
            }
        });
    });
    function destroy_excellence(id) {
        if (confirm("Yakin Hapus ?")){
            $.ajax({
                type: "POST",
                url : "{{ env('API_URL') }}/excellence/" + id,
                data: {_method: "DELETE", _token: "{{ csrf_token() }}"},
                success: function (data) {
                    excellence_dt.ajax.reload();
                },
                error: function () {
                    alert("Something Wrong !")
                }
            })
        }
    }
</script>