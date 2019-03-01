<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Queue</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        table {
            border-collapse: collapse;
        }

        td, th {
            border: 1px solid #2ab27b;
        }

        th {
            background: #b0e0e6;
        }

        .height-20 {
            margin-top: 10vh;
            height: 20vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 40px;
        }

        a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>
<div class="flex-center position-ref ">

    <div class="content">
        <div class="title m-b-md height-20">
            Электронная очередь, действие {{$action}}
        </div>
        <div class="flex-center position-ref">
            <table class="links">
                <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Counter
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($result as $value)
                    <tr>
                        <td>{{$value->id}}</td>
                        <td><a href=action_{{$value->id}}>{{$value->name}}</a></td>
                        <td>{{$value->counter}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div>
            <a href=action_work>Принять в работу</a><br>
        </div>
    </div>
</div>
</body>
</html>