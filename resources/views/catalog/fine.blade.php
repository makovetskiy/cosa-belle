@extends('layouts.app')

@section('page')
<div class="wrapper">
	<script type="text/javascript">
		localStorage.removeItem("cart");
	</script>
	<h1>Ваш заказ успешно принят в обработку!</h1>

	<hr class="small">
	<div class="row">
		<div class="col-md-12">
			<a href="{{ url('/catalog') }}" class="btn btn-lg btn-block btn-success"><i class="fa fa-angle-left"></i> Вернуться в каталог</a>
		</div>
	</div>	
</div>


@endsection