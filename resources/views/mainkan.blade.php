@include('templates.partials.script')


<button type="button" class="btn btn-primary" onclick="mainkan()">Mantap</button>
<div class="tampil"></div>
<div class="profilnya"></div>

<script type="text/javascript">
            {{--var token = "Bearer " + "{{ $token }}";--}}
    var token = "Bearer " + "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9hcGkvdjEvbGJiL2xvZ2luIiwiaWF0IjoxNTIzNDQwNjE0LCJleHAiOjE1MjM0NDQyMTQsIm5iZiI6MTUyMzQ0MDYxNCwianRpIjoibWZobGs5RFBpUHRJY1VBYSJ9.5W5i_7TSM2S--dNvae8cPvDsnvUYUGl0E4iUjPsLyMk";
    $(document).ready(function () {
        $('.tampil').html(token)
    });
    function mainkan() {
        $.ajax({
            type: "GET",
            url: "http://localhost:8000/api/v1/lbb/bermain/1",
            headers: {Authorization: token},
            success: function (data, textStatus, header) {
                alert(data.msg)
                alert(header.getAllResponseHeaders())
                $('.tampil').html(token)
                $('.profilnya').html(data.usernya.name)
            },
            error: function (error) {
                alert("HADEH")
            }
        });
    }
</script>