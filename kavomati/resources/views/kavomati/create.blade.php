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
                font-family: 'Arial', sans-serif;
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
                <div class="panel panel-primary">
					<div class="panel-heading">
						<h2>Novi kavomat</h2>
					</div>
					<div class="panel-body">
						<form method="POST" action="{{ route('kavomati.store') }}">
							{{ csrf_field()}}
							<div class="form-group {{ ($errors->has('naziv')) ? 'has-error': ''}}">
								<label for="naziv"> Naziv kavomata</label>
								<input type="text" name="naziv" id="naziv" class="form-control" placeholder="Upišite naziv kavomata">
								{!! ($errors->has('naziv')) ? '<p class="text-danger">'.$errors->first('naziv').'</p>': '' !!}
							</div>
							<div class="form-group {{ ($errors->has('naziv')) ? 'has-error': ''}}">
								<label for="lokacija">Lokacija</label>
								<select name="lokacija" id="lokacija" class="form-control">
									<option disabled selected="true">Odaberite lokaciju</option>
									@foreach($lokacije as $lokacija)
									<option value="{{ $lokacija->id }}">{{ $lokacija->ulica.', '.$lokacija->kc_broj.', '.$lokacija->mjesto}}</option>
									@endforeach
								</select>
								{!! ($errors->has('lokacija')) ? '<p class="text-danger">'.$errors->first('lokacija').'</p>': '' !!}
							</div>
							<div class="form-group">
								<button class="btn btn-primary btn-lg">Dodaj kavomat</button>
								<a href="{{ route('kavomati.index') }}" class="btn btn-danger btn-lg" role="button">Odustani</a>
							</div>
						</form>
					</div>
				</div>
            </div>
        </div>
    </body>
</html>
