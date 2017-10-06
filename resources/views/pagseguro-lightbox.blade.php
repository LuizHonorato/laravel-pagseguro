<!DOCTYPE html>
	<html>
		<head>
		<title>Lightbox</title>
		</head>
		<body>
			<a href="#" class="btn-buy">Finalizar compra!</a>
			{!! csrf_field() !!}

			<div class="msg-return"></div>
			<div class="preloader" style="display: none;">Carregando...</div>

			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

			<script>
				$(function(){
					$('.btn-buy').click(function(){
						$.ajax({
							url: "{{route('pagseguro.lightbox.code')}}",
							method: "POST",
							data: {_token: $('input[name=_token]').val()},
							beforeSend: startPreloader()
						}).done(function(code){
							lightbox(code);
						}).fail(function(){
							alert("Erro inesperado, tente comprar novamente!");
						}).always(function(){
							stopPreloader();
						});
						return false;
					});
				});

				function lightbox(code)
				{
					PagSeguroLightbox({
						code: code

					}, {
						success: function(transactionCode){
							alert("Pedido realizado com sucesso: " + transactionCode);
							$('msg-return').html("Pedido realizado com sucesso: "+transactionCode);
						},
						abort: function(){
							alert("A compra foi cancelada!");
						}
					});
				}

				function startPreloader()
				{
					$('.preloader').show();
				}
				function stopPreloader()
				{
					$('.preloader').hide();
				}

			</script>

			<script src="{{config('pagseguro.url_lightbox_sandbox')}}"></script>

		</body>
	</html>