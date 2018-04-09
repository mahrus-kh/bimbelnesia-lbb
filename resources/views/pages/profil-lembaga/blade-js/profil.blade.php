<script type="text/javascript">
    var token;
    var id_tutoring_agency;
    $(document).ready(function () {
        token = getUrlParamenter('token')
        id_tutoring_agency = getUrlParamenter('id')
        @php
        $token ='<script type="text/javascript">token</script>';
        @endphp

        alert({{ $token }})
    });
    function getUrlParamenter(sParam) {
        var sPageURL = decodeURIComponent(window.location.search.substring(1)),
            sURLVariables = sPageURL.split('&'), sParameterName, i;
        for (i = 0; i < sURLVariables.length; i++) {
            sParameterName = sURLVariables[i].split('=');
            if (sParameterName[0] === sParam) {
                return sParameterName[1] === undefined ? true : sParameterName[1];
            }
        }
    }
</script>