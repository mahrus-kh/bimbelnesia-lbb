<script type="text/javascript">
    $(document).ready(function () {
        loadProfil()
    });
    function loadProfil() {
        $("#category").html("")
        $("#sub_category").html("")
        $("#tags-input").val("")
        $.ajax({
            type: "GET",
            url: "{{ env('API_URL') }}/lembaga/" + Cookies.get('token') + "/edit",
            headers: {Authorization: Cookies.get('token-auth')},
            dataType: "JSON",
            success: function (data) {
                $('[name=tutoring_agency]').val(data.data.profil.tutoring_agency)
                $("#logo-image").attr("src", "{{ env('API_BASE_IMAGE') }}/" + data.data.profil.logo_image)
                $.each(data.data.category, function (key, value) {
                    if ($.inArray(value.id.toString(), data.data.profil.category_id) !== -1){
                        checked = "checked"
                    } else {
                        checked = ""
                    }
                    $("#category").html($("#category").html() + '<label><input type="checkbox" name="category_id[]" value="' + value.id + '"' + checked +'>' + value.category + '</label> | ')
                });
                $.each(data.data.sub_category, function (key, value) {
                    if ($.inArray(value.id.toString(), data.data.profil.sub_category_id) !== -1){
                        checked = "checked"
                    } else {
                        checked = ""
                    }
                    $("#sub_category").html($("#sub_category").html() + '<label><input type="checkbox" name="sub_category_id[]" value="' + value.id + '"' + checked +'>' + value.sub_category + '</label> | ')
                });
                if (data.data.profil.verified === "1") {
                    $("#status").html('<label for="" class="label bg-green">Verified</label>')
                } else if (data.data.profil.verified === "0") {
                    $("#status").html(' <label for="" class="label label-warning">Unverified</label>')
                }
                $("#star-rating").html(countStar(data.data.profil.rating))
                $("#rating").html(data.data.profil.rating)
                $("#total_views").html(data.data.profil.total_views)
                $('[name=address]').val(data.data.profil.address)
                $('[name=description]').val(data.data.profil.description)
                $.each(data.data.profil.tags, function (key, value) {
                    $("#tags-input").val($("#tags-input").val() + "," + value)
                });
                $("#tags-input").tagsInput();
            },
            error: function () {
                window.location.replace("{{ route('login') }}")
            }
        });
    }
    $(function () {
        $("#profil-form").validator().on('submit', function (e) {
            if (!e.isDefaultPrevented()){
                $.ajax({
                    type: "POST",
                    url: "{{ env('API_URL') }}/lembaga/" + Cookies.get('token'),
                    headers: {Authorization: Cookies.get('token-auth')},
                    data: new FormData($("#profil-form")[0]),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        loadProfil()
                    },
                    error: function () {
                        alert("Something Wrong !!!")
                    }
                });
                return false
            }
        });
    });
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