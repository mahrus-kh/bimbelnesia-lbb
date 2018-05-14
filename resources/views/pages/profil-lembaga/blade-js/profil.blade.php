<script type="text/javascript">
    $(document).ready(function () {
        accountLoad()
        loadProfil()
    });

    function loadProfil() {
        $.ajax({
            type: "GET",
            url: "{{ env('API_URL') }}/lembaga/" + Cookies.get('token'),
            headers: {Authorization: Cookies.get('token-auth')},
            dataType: "JSON",
            success: function (data) {
                $("#tutoring_agency").html(data.data.profil.tutoring_agency)
                if (data.data.profil.verified === "1") {
                    $("#verified").html('<label for="" class="label bg-green">Verified</label>')
                } else if (data.data.profil.verified === "0") {
                    $("#verified").html(' <label for="" class="label label-warning">Unverified</label>')
                }
                $("#logo-image").attr("src", "{{ env('API_BASE_IMAGE') }}/" + data.data.profil.logo_image)
                $.each(data.data.profil.category_id, function (key, value) {
                    $("#category").html($("#category").html() + ' <label for="" class="label label-default">' + value + '</label>')
                });
                $("#star-rating").html(countStar(data.data.profil.rating))
                $("#rating").html(data.data.profil.rating)
                $("#total_views").html(data.data.profil.total_views)
                $("#address").html(data.data.profil.address)
                $("#description").html(data.data.profil.description)
                $.each(data.data.profil.sub_category_id, function (key, value) {
                    $("#sub_cateogry").html($("#sub_cateogry").html() + ' <label for="" class="label label-default">' + value + '</label>')
                });
                $.each(data.data.profil.tags, function (key, value) {
                    $("#tags").html($("#tags").html() + ' <label for="" class="label label-default">#' + value + '</label>')
                });
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
    function countStar(rating) {
        var starRating = ""
        for (var i=0; i<5; i++) {
            if (rating >= 1){
                starRating = starRating + ' <i class="fa fa-star"></i>'
            } else if (rating >= 0.5 && rating < 1 ) {
                starRating = starRating + ' <i class="fa fa-star-half-o"></i>'
            } else if (rating < 0.5) {
                starRating = starRating + ' <i class="fa fa-star-o"></i>'
            }
            rating = rating - 1
        }
        return starRating
    }
</script>