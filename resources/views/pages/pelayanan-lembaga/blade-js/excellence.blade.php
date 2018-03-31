<script type="text/javascript">
    $(document).ready(function () {
        $("#excellence-datatables").dataTable({
            searching: false,
        });
    });
    function edit_excellence(id) {
        alert(id)
    }
    function destroy_excellence(id) {
        if (confirm("Yakin Hapus ?")){
            $.ajax({
                type: "POST",
                url : "{{ env('API_URL') }}/excellence/" + id,
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