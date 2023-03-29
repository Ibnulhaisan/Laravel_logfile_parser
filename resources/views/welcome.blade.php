<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

  <form action="{{route('submit-form')}}" class="container w-50 mx-auto"  method="POST">
    @csrf
      @for($i=1;$i<=3;$i++)
          <input class="form-control" type="text" height="10" width="30" style="color: green;
                  background-color: lemonchiffon;" name="question[{{$i}}]"  placeholder="question[{{$i}}]">
                   @error('question.'.$i)
                        <div class="text-danger">{{ $message }}</div>
                     @enderror
          <input class="form-control" type="text" height="10" width="30" style="color: green;
                  background-color: lemonchiffon;" name="mark[{{$i}}]"  placeholder="mark[{{$i}}]">
                 @error('mark.'.$i)
                    <div class="text-danger">{{ $message }}</div>
                 @enderror
          <input class="form-control" type="text" height="10" width="30" style="color: green;
                  background-color: lemonchiffon;" name="correct[{{$i}}]"  placeholder="correct[{{$i}}]">
                  @error('correct.'.$i)
                       <div class="text-danger">{{ $message }}</div>
                   @enderror

          @for($o=1;$o<=4;$o++)
{{--                <input class="form-control" text="text" hidden name="option_num[{{$i}}][{{$o}}]" placeholder="option[{{$i}}][{{$o}}]">--}}
                <input class="form-control" text="text" name="option[{{$i}}][{{$o}}]" placeholder="option[{{$i}}][{{$o}}]">
                      @error('option.'.$i.'.'.$o)
                           <div class="text-danger">{{ $message }}</div>
                       @enderror
                <input class="form-control" text="text" hidden name="option_num[{{$i}}][{{$o}}]" placeholder="option_num[{{$i}}][{{$o}}]">

            @endfor
          <br>
      @endfor

      <button type="submit">Submit</button>

    </form>


