<script type="text/javascript">
    $(document).ready(function () {
        $("#facility-datatables").dataTable({
            searching: false,
        });
    });
    function edit_facility(id) {
        alert(id)
    }
    function destroy_facility(id) {
        if (confirm("Yakin Hapus ?")){
            $.ajax({
                type: "POST",
                url : "{{ env('API_URL') }}/facility/" + id,
                data: {_method: "DELETE", _token: "{{ csrf_token() }}"},
                success: function (data) {
                    window.location.reload()
                },
                error: function () {
                    alert("Something Wrong !")
                }
            })
        }
    }
</script>