<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
		
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 700;
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
                <div class="top-right links">
                        <a href="{{ route('home') }}">Home</a>
                </div>

            <div class="content">
				@if(session()->exists('success'))
					<div class="alert alert-success" role="alert">
					{{ session()->get('success') }}
					</div>
				@elseif(session()->exists('danger'))
					<div class="alert alert-danger" role="alert">
					{{ session()->get('danger') }}
					</div>
				@endif
                <div class="panel panel-primary">
					<div class="panel-heading"><a href="{{ route('lokacije.create') }}" class="btn btn-default btn-lg" role="button">Dodaj novu lokaciju</a></div>
					<div class="panel-body">
						<table class="table table-hover">
							<tr>
								<th>ID</th>
								<th>Adresa</th>
								<th>Grad</th>
							</tr>
							@foreach($lokacije as $lokacija)
								<tr>
									<td>{{ $lokacija->id }}</td>
									<td>{{ $lokacija->ulica.', '.$lokacija->kc_broj }}</td>
									<td>{{ $lokacija->mjesto }}</td>
									<td><a href="" class="btn btn-primary btn-sm" role="button">Uredi</a> <a href="" class="btn btn-danger btn-sm" role="button">Izbriši</a></td>
								</tr>
							@endforeach
						</table>
					</div>
				</div>
            </div>
        </div>
    </body>
</html>