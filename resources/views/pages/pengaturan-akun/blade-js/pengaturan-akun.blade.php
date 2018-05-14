<script type="text/javascript">
    $(document).ready(function () {
        accountLoad()
    });
    function accountLoad() {
       $.ajax({
           type: "GET",
           url : "{{ env('API_URL') }}/setup/account-login/" + Cookies.get('token'),
           dataType: "JSON",
           headers: {Authorization: Cookies.get('token-auth')},
           success: function (data) {
               $("#account-name-top-nav").html(data.account.name)
               $("#account-name-sidebar").html(data.account.name)
               $('[name=name]').val(data.account.name)
               $('[name=phone]').val(data.account.phone)
               $('[name=address]').val(data.account.address)
               $('[name=email]').val(data.account.email)
               $('[name=password]').val("")
           },
           error:function () {
               window.location.replace("{{ route('login') }}")
           }
       });
    }
    $(function () {
        $("#account-form").validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                $.ajax({
                    type: 'POST',
                    url: '{{ env('API_URL') }}/setup/account-login/' + Cookies.get('token'),
                    headers: {Authorization: Cookies.get('token-auth')},
                    data: $("#account-form").serialize(),
                    success: function (data) {
                        alert(data.msg)
                        accountLoad()
                    },
                    error: function () {
                        alert("Something Wrong !")
                    }
                });
                return false
            }
        });
    });
</script>