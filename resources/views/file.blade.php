<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>



{{--{{count($users)}}--}}
<form action="{{route('file_submit')}}" method="post">

    @csrf
    <div class="container">
        <label for="ip"><b>ip</b></label>
           <input type="text" class="form-control" placeholder="Enter ip" name="ip"><br>

        <label for="user_identity"><b>user_identity</b></label>
            <input type="text" class="form-control" placeholder="Enter user_identity" name="user_identity"><br>

        <label for="username_client"><b>username_client</b></label>
            <input type="text" class="form-control" placeholder="Enter username_client" name="username_client"><br>

        <label for="date_time"><b>date_time</b></label>
            <input type="text" class="form-control" placeholder="Enter date_time" name="date_time"><br>

        <label for="http_request"><b>http_request</b></label>
            <input type="text" class="form-control" placeholder="Enter http_request" name="http_request"><br>

        <label for="url_request"><b>url_request</b></label>
            <input type="text" class="form-control" placeholder="Enter url_request" name="url_request"><br>


        <label for="protocol_version"><b>protocol_version</b></label>
            <input type="text" class="form-control" placeholder="Enter protocol_version" name="protocol_version"><br>

        <label for="status_code"><b>status_code</b></label>
            <input type="text" class="form-control" placeholder="Enter status_code" name="status_code"><br>

        <label for="byte_size"><b>byte_size</b></label>
            <input type="text" class="form-control" placeholder="Enter byte_size" name="byte_size"><br>


        <label for="referrer_req"><b>referrer_req</b></label>
            <input type="text" class="form-control" placeholder="Enter referrer_req" name="referrer_req"><br>

        <label for="user_agent"><b>user_agent</b></label>
            <input type="text" class="form-control" placeholder="Enter user_agent" name="user_agent"><br>

        <label for="cookies_value"><b>cookies_value</b></label>
            <input type="text" class="form-control" placeholder="Enter cookies_value" name="cookies_value"><br>


             <button type="submit" style="">Submit</button>

    </div>


</form>
</body>
</html>
