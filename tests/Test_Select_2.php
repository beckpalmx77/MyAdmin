<!doctype html>
<html>
<head>
    <title>Dynamically load data in Select2 with AJAX PDO and PHP</title>

    <meta charset="UTF-8">
    <!-- jQuery -->
    <!--script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script-->

    <!-- select2 css -->
    <!--link href='select2/dist/css/select2.min.css' rel='stylesheet' type='text/css'-->

    <!-- select2 script -->
    <!--script src='select2/dist/js/select2.min.js'></script-->

    <!-- CDN -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/css/select2.min.css" rel="stylesheet"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.10/js/select2.min.js"></script>

</head>
<body>

<select id='selUnit' style='width: 200px;'>
    <option value='0'>- Search Unit -</option>
</select>


<script type="text/javascript">

    $(document).ready(function () {

        $("#selUnit").select2({
            ajax: {
                url: "find_data_2.php",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        searchTerm: params.term // search term
                    };
                },
                processResults: function (response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
    });

</script>


</body>
</html>
