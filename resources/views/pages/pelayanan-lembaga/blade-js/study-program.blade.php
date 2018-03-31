<script type="text/javascript">
    $(document).ready(function () {
        $("#study-program-datatables").dataTable({
            searching: false,
        });
    });
    function edit_study_program(id) {
        alert(id)
    }
    function destroy_study_program(id) {
        if (confirm("Yakin Hapus ?")){
            $.ajax({
                type: "POST",
                url : "{{ env('API_URL') }}/study-program/" + id,
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