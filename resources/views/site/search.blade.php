<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="{{asset('assets/admin/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Styles -->
    <style>
        body {
            background-color: black;
            background-image: url({{asset('assets/site/img/background1.jpg')}});
            background-size: cover;
            width: 100%;
        }
        .full-height {
            height: 100vh;
        }
        .m-p {
            margin: 0px;
            padding: 0px;

        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }
        .selectee {
            background-color: #fff;
            overflow: auto;
            height: 450px;
        }
        .selectee li {
            width: 100%;
            display: block;
            padding: 10px;
            border-bottom: 1px solid #e2e2e2;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="col-lg-12">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (session()->has('message'))
            <div class="alert alert-info">
                <h4>{{session()->get('message')}}</h4>
            </div>
        @endif
        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="col-lg-6 col-lg-offset-3">
                <div class="form-group">
                    <label for="clientName">Name</label>
                    <input type="text" name="name" class="form-control" autocomplete="off" id="clientName" placeholder="Mahmoud Mohamed" value="{{old('name')}}" required>
                    <div class="row m-p" id="insertSearchData">

                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-sm-offset-6">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
    $(document).on('keyup','#clientName',function (e) {
        e.preventDefault();
        let name = $(this).val();
        if (!name)
        {
            $('#insertSearchData').html('');
            return;
        }
        $.ajax({
            data:{name:name},
            success:function (result) {
                $('#insertSearchData').html(result);
            },
            error:function (errors) {
                console.log(errors);
            }
        });
    });
    $(document).on('click','.selectLi',function (e) {
        e.preventDefault();
        let name = $(this).text();
        $('#clientName').val(name);
        $('#insertSearchData').html('');
    });
</script>
</html>
