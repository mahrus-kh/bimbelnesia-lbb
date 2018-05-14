<script type="text/javascript">
    $(document).ready(function () {
        accountLoad()
        shortProfile()
    });
    function shortProfile() {
        $.ajax({
            type: "GET",
            url: "{{ env('API_URL') }}/lembaga/short-profile/" + Cookies.get('token'),
            headers: {Authorization: Cookies.get('token-auth')},
            dataType: "JSON",
            success: function (data) {
                $("#tutoring_agency").html(data.data.profil.tutoring_agency)
                if (data.data.profil.verified === "1") {
                    $("#verified").html('<label for="" class="label bg-green">Verified</label>')
                } else if (data.data.profil.verified === "0") {
                    $("#verified").html(' <label for="" class="label label-warning">Unverified</label>')
                }
            },
            error: function () {
                window.location.replace("{{ route('login') }}")
            }
        });
    }
    function accountLoad() {
        $.ajax({
            type: "GET",
            url : "{{ env('API_URL') }}/setup/account-login/" + Cookies.get('token'),
            dataType: "JSON",
            headers: {Authorization: Cookies.get('token-auth')},
            success: function (data) {
                $("#account-name-top-nav").html(data.account.name)
                $("#account-name-sidebar").html(data.account.name)
            },
            error:function () {
                window.location.replace("{{ route('login') }}")
            }
        });
    }
</script>