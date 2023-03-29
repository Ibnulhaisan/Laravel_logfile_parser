<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>
<body class="container">

@if (session('success'))
    <div> {{session('success')}}</div>
@endif
{{--{{count($users)}}--}}
<form action="{{route('registration')}}" method="post">

    @csrf
    <div class="container">
        <label for="email"><b>Email</b></label>
        <input type="text" class="form-control" placeholder="Enter Email" name="email"><br>
        @error('email')
        <div>{{ $message }}</div>
        @enderror
        <label for="psw"><b>Password</b></label>
        <input type="password" class="form-control" placeholder="Enter Password" name="password"><br>
        @error('password')
        <div>{{ $message }}</div>
        @enderror
        <button type="submit" style="">Submit</button>

    </div>

    {{--    <div class="container" style="background-color:#f1f1f1">--}}
    {{--        <button type="button" class="cancelbtn">Cancel</button>--}}
    {{--        <span class="psw">Forgot <a href="#">password?</a></span>--}}
    {{--    </div>--}}
</form>

</body>
</html>
