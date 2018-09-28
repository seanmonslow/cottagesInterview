<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
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
        <div class="flex-center position-ref full-height">
            <div class="content">
                <h1>Sykes Search</h1>
                <form action="/search" method="get">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="location">Location</label>
                        <input id="location" name="location" value="{{request()->input('location')}}">
                    </div>
                    <div class="form-group">
                        <label for="accuracy">Location Accuracy</label>
                        <select id="accuracy" name="accuracy">
                            @if (request()->input('accuracy') == "exact")
                            <option value="exact" selected>Exact</option>
                            @else
                            <option value="exact">Exact</option>
                            @endif
                            @if (request()->input('accuracy') == "like")
                            <option value="like" selected>Like</option>
                            @else
                            <option value="like">Like</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="accept_pets">Does it accept pets?</label>
                        <select id="accept_pets" name="accept_pets">
                            @if (request()->input('accept_pets') == "1")
                            <option value="1" selected>Yes</option>
                            <option value="0">No/Doesn't matter</option>
                            @else
                            <option value="1">Yes</option>
                            <option value="0" selected>No/Doesn't matter</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="sleeps">How many sleeps?</label>
                        <input id="sleeps" name="sleeps" value="{{request()->input('sleeps')}}">
                    </div>
                    <div class="form-group">
                        <label for="beds">How many beds?</label>
                        <input id="beds" name="beds" value="{{request()->input('beds')}}">
                    </div>
                    <div class="form-group">
                        <label for="date">Date?</label>
                        <input type="date" id="date" name="date" value="{{request()->input('date')}}">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                Results:<br>
                @foreach ($properties as $property)
                    {{ $property->property_name }}
                    <br>
                @endforeach
                <div style="padding-left:25%; text-align:center">
                {{ $properties->appends(request()->input())->links() }}
                </div>
            </div>
        </div>
    </body>
</html>
