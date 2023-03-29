<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>data table</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/datatables.min.css" rel="stylesheet"/>

</head>
<body>

<div class="container my-5">
    <table id="dataTable" style="width:100%" >
        <thead style="background-color: cornflowerblue">
        <tr >
            <th>Id</th>
            <th>Ip</th>
            <th>user_identity</th>
            <th>username_client</th>
            <th>date_time</th>
            <th>http_request</th>
{{--            <th>url_request</th>--}}
            <th>protocol_version</th>
            <th>status_code</th>
            <th>byte_size</th>
            <th>referrer_req</th>
            <th>user_agent</th>
            <th>cookies_value</th>
        </tr>
        </thead>
    </table>
</div>
<script src="https://cdn.datatables.net/v/dt/jq-3.6.0/dt-1.13.4/datatables.min.js"></script>
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable({

            // paging: false,
            // searching: false,
            // ordering: false,


            ajax: '{{ route('ajax') }}',
            processing: true,
            serverSide:true,
            columns: [
                {  data: 'id' },
                {  data: 'ip'},
                {  data: 'user_identity' },
                { data: 'username_client' },
                { data: 'date_time' },
                { data: 'http_request' },
                 // { data: 'url_request' },
                { data: 'protocol_version' },
                { data: 'status_code'  },
                { data: 'byte_size' },
                { data: 'referrer_req' },
                { data: 'user_agent' },
                { data: 'cookies_value' },

            ],
        });
    });


</script>

</body>
</html>

