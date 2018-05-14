<script type="text/javascript">
    $(document).ready(function () {
        contact_load()
    });
    function contact_load() {
        $.ajax({
            type: "GET",
            url : "{{ env('API_URL') }}/contact/" + Cookies.get('token'),
            dataType: "JSON",
            headers: {Authorization: Cookies.get('token-auth')},
            success: function (data, textStatus, header) {
                // Cookies.set('token-auth', header.getResponseHeader('Authorization'))
                // alert(header.getResponseHeader('Authorization'))
                id_contact = data.id
                $("#website").html(data.website)
                $("#office_phone").html(data.office_phone)
                $("#mobile_phone").html(data.mobile_phone)
                $("#email").html(data.email)
                $("#facebook").html(data.facebook)
                $("#instagram").html(data.instagram)
                $("#other_contacts").html(data.other_contacts)
            },
            error: function () {
                window.location.replace("{{ route('login') }}")
            }
        });
    }
    function edit_contact() {
        $.ajax({
            type: "GET",
            url : "{{ env('API_URL') }}/contact/" + Cookies.get('token') ,
            headers: {Authorization: Cookies.get('token-auth')},
            dataType: "JSON",
            success: function (data) {
                $('[name=website]').val(data.website)
                $('[name=office_phone]').val(data.office_phone)
                $('[name=mobile_phone]').val(data.mobile_phone)
                $('[name=email]').val(data.email)
                $('[name=facebook]').val(data.facebook)
                $('[name=instagram]').val(data.instagram)
                $('[name=other_contacts]').val(data.other_contacts)
                $('.contact-modal').modal("show")
            },
            error: function () {
                alert("Something Wrong !")
            }
        });
   }
    $(function () {
        $('.contact-modal form').validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                $.ajax({
                    type: "POST",
                    url: "{{ env('API_URL') }}/contact/" + id_contact,
                    headers: {Authorization: Cookies.get('token-auth')},
                    data: $('.contact-modal form').serialize(),
                    success: function (data) {
                        $('.contact-modal').modal("hide")
                        contact_load()
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