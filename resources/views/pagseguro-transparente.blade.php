<!DOCTYPE html>
<html>
<head>
	<title>Checkout Transparente</title>
</head>
<body>

	{!! Form::open(['id' => 'form']) !!}

	{!! Form::close() !!}

	<a href="#" class="btn-finished">Pagar com boleto!</a>

	<div class="payments-methods"></div>

	<!-- JQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<script src="{{config('pagseguro.url_transparente_js_sandbox')}}"></script>

	<script>
		$(function(){
			$('.btn-finished').click(function(){
				setSessionId();

				return false;
			});
		});

		//FUNÇÃO QUE DEFINI A SESSÃO DE CHECKOUT TRANSPARENTE NA API DO PAGSEGURO
		function setSessionId()
		{	
			var data = $('#form').serialize();
			$.ajax({
				url: "{{route('pagseguro.code.transparente')}}",
				method: "POST",
				data: data
			}).done(function(data){
				PagSeguroDirectPayment.setSessionId(data);
				paymentBillet();
				//getPaymentMethods();
			}).fail(function(){
				alert("Fail request... :(");
			});
		}

		//FUNÇÃO QUE RETORNA OS MÉTODOS DE PAGAMENTO DO PAGSEGURO
		function getPaymentMethods()
		{
			PagSeguroDirectPayment.getPaymentMethods({

				success: function(response){
					if(response.error == false){
						$.each(response.paymentMethods, function(key, value){
							$('.payments-methods').append(key+"<br>");
						});
					}
				},
				error: function(response){
					console.log(response);
				},
				complete: function(response){
					//console.log(response);
				}

			});
		}

		function paymentBillet()
		{
			var sendHash = PagSeguroDirectPayment.getSenderHash();
			var data = $('#form').serialize()+"&sendHash="+sendHash;
			$.ajax({
				url: "{{route('pagseguro.billet')}}",
				method: "POST",
				data: data
			}).done(function(url){
				//console.log(data.paymentLink);

				location.href=url;
			}).fail(function(){
				alert("Fail request... :(");
			});
		}

	</script>

</body>
</html>