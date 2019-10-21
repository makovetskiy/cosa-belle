@extends('layouts.app')


@section('page')
<div class="wrapper">
	<h2 class="center">
        <strong>Корзина товаров</strong>
    </h2>
    <hr class="small">
	<table id="cart" class="table table-hover table-condensed">
    	<thead>
			<tr>
				<th style="width:5%">id</th>
				<th style="width:80%">Товары</th>
				<th style="width:10%">Цена</th>
				<th style="width:5%"></th>
			</tr>
		</thead>
		<tbody>

		</tbody>
	</table>

	<h3><strong>Итого: <span id='goods_summ'>0</span> <i class="fa fa-rub" aria-hidden="true"></i></strong></h3>
	<div class="row">
		<div class="col-md-4">
			<a href="{{ url('/catalog') }}" class="btn btn-lg btn-block btn-outline-warning"><i class="fa fa-angle-left"></i> Продолжить покупки</a>
		</div>
		<div class="col-md-4">
			
		</div>
		<div class="col-md-4">
			<form method="post" action="{{ url('/order') }}">
		      {{ csrf_field() }}
			  <button type="submit" class="btn btn-lg btn-outline-success btn-block">Оформить заказ <i class="fa fa-angle-right"></i></button>
			</form>
		</div>
	</div>				
</div>
@endsection