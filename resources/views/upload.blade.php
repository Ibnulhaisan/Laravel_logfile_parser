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
<div class="custom-file-upload" >
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <form class="col-md-6 p-4 bg-light rounded" method="POST"  action="{{ route('upload') }}" enctype="multipart/form-data" style="box-shadow: 0 0 10px rgb(21,161,215); padding: 20px;">



                @csrf

                <div class="mb-3">
                    <label for="file-upload" class="form-label">Upload File</label>
                    <input id="file-upload" class="form-control" type="file" name="file">
                    @error('file')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-success" style="background-color: #71d9e3; border-color: #28a745;">Upload</button>

            </form>

        </div>
    </div>


</div>
</body>
</html>
