<script type="text/javascript">
    $(document).ready(function () {
        checkCookies()
    });
    $(function () {
        $("#login-form").validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                $.ajax({
                    type: "POST",
                    url: "{{ env('API_URL') }}/login",
                    data: $("#login-form").serialize(),
                    success: function (data) {
                        Cookies.set('token-auth', "Bearer " + data.token, { expires: 1})
                        Cookies.set('token', data.token, { expires: 1})
                        window.location.replace("{{ url('data-lembaga/profil') }}")
                    },
                    error: function () {
                        $('[name=password]').val("")
                        var error = new PNotify({
                            title: 'Something Wrong !!!',
                            text: 'Email or password an incorrect',
                            type: 'success',
                            styling: 'bootstrap3'
                        });
                    }
                });
                return false
            }
        });
    });
    function checkCookies() {
        if (Cookies.get('token-auth') && Cookies.get('token')){
            $.ajax({
                type: "POST",
                url: "{{ env('API_URL') }}/check-cookies/" + Cookies.get('token'),
                headers: {Authorization: Cookies.get('token-auth')},
                success: function (data) {
                    window.location.replace("{{ url('data-lembaga/profil') }}")
                },
                error: function () {
                    Cookies.remove('token-auth')
                    Cookies.remove('token')
                    var error = new PNotify({
                        title: 'You are logout !!!',
                        text: 'You are logout, login please !',
                        type: 'success',
                        styling: 'bootstrap3'
                    });
                }

            });

        } else {
            Cookies.remove('token-auth')
            Cookies.remove('token')
        }
    }
</script>