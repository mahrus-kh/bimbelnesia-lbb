<script type="text/javascript">
    $(document).ready(function () {
    });
    $(function () {
        $("#login-form").validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                $.ajax({
                    type: "POST",
                    url: "{{ env('API_URL') }}/login",
                    data: $("#login-form").serialize(),
                    success: function (data) {
                        window.location.replace("{{ route('profil.index') }}?id="+ data.id + "&token=" + data.token)
                    },
                    error: function () {

                    }
                });
                return false
            }
        });
    });

</script>