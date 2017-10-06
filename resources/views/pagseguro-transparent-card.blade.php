<!DOCTYPE html>
<html>
<head>
	<title>Transparent Card</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>

	<div class="container">
		<h1>Pagar com cartão de crédito</h1>
		{!! Form::open([]) !!}
		<div class="form-group">
			<label>Número do cartão</label>
			{!! Form::text('cardNumber', null, ['class' => 'form-control', 'Placeholder' => 'Número do cartão']) !!}
		</div>

		<div class="form-group">
			<label>Mês de expiração</label>
			{!! Form::text('cardExpiryMonth', null, ['class' => 'form-control', 'Placeholder' => 'Mês de expiração']) !!}
		</div>

		<div class="form-group">
			<label>Ano de expiração</label>
			{!! Form::text('cardExpiryYear', null, ['class' => 'form-control', 'Placeholder' => 'Ano de expiração']) !!}
		</div>

		<div class="form-group">
			<label>Código de segurança</label>
			{!! Form::text('cardCVC', null, ['class' => 'form-control', 'Placeholder' => 'Código de segurança (3 dígitos)']) !!}
		</div>

		<div class="form-group">
			<button type="submit" class="btn btn-default">Enviar agora</button>
		</div>

	{!! Form::close() !!}
	</div>

</body>
</html>