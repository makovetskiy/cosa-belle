@extends('layouts.app')


@section('page')
<div class="wrapper">
	<h2 class="center">
        <strong>Оформление заказа</strong>
    </h2>
    <hr class="small">
<form method="post" action="{{ route('order.create') }}">
	{{ csrf_field() }}
	<input type="hidden" name="goods_list" id='goods_list' value="">
	
    <div class="row">
    	<div class="col-md-12">
	    	<div class="card">
				<div class="card-header">
				    Заполните форму заказа
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-12">
							@if(Session::has('error_msg')) 
					         <div class="alert alert-danger">{{ Session::get('error_msg') }}</div> 
					        @endif
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
				                <div class="col-md-12"><strong>Телефон:</strong></div>
				                <div class="col-md-12">
				                    <input type="text" class="form-control @if($errors->has('phone')) is-invalid @endif" name="phone"  value="{{ old('phone') }}"/>
				                    <div class="invalid-feedback">
								        Телефон не может быть пустым полем
								     </div>
				                </div>
				            </div>

				            <div class="form-group" id='pickup_points'>
				            	<div class="col-md-12"><strong>Тип доставки:</strong></div>
				            	<div class="col-md-12">
					            	<select class="form-control" id="delivery_type_id" name="delivery_type_id">
					            		<option selected="selected" value="1">Самовывоз</option>
										<option  value="2">Курьерская доставка</option>
										<option  value="3">Почта России</option>
									</select>
								</div>
				            </div>

				            <div class="form-group" id='address_block_id'>
				            	<div class="col-md-12">
				            		<p style="font-size: 11px;" id="pochta_text">
				            			* Почта России.  При заказе на сумму более 1000 рублей доставка бесплатная. Стоимость доставки при заказе менее 1000 руб - 200 руб. Почта России берет комиссию за перевод наложенного платежа в размере 2%, но не менее 50 рублей. Когда заказ будет передан Почте России, вы получите письмо на электронную почту с почтовым идентификатором, чтобы вы могли отслеживать вашу посылку на сайте www.pochta.ru. Как только заказ будет доставлен в отделение связи, на ваш адрес отправят извещение. Срок хранения посылки 21 день. График работы вашего отделения Почты России можно уточнить на сайте www.pochta.ru или с помощью мобильного приложения Почты России.
				            		</p>
					            	<p style="font-size: 14px;" id="delivery_text">
					            		*В пределах МКАД<br>
					            		*Доставка <strong>300р.</strong><br>
					            		*При заказе Более <strong>1000р.</strong> доставка бесплатно.
					            	</p>
					            </div>
				            	<div class="col-md-12">
				                    <strong>Адрес:</strong>
				                    <input type="text" name="full_address" id="full_address" class="form-control" value="{{ old('full_address') }}" />
				                </div>
				                <div class="col-md-12">
				                	<div class="row">
							            <div class="col-md-6 col-xs-12">
								            <strong>Дом:</strong>
								            <input type="text" name="home" class="form-control" value="{{ old('home') }}"/>
								        </div>
								        <div class="col-md-6 col-xs-12">
								            <strong>Квартира:</strong>
								            <input type="text" name="flat" class="form-control" value="{{ old('flat') }}" />
								        </div>
								    </div>
							    </div>
				            </div>

				            <div class="form-group" id='pickup_point_block_id'>
				            	<div class="col-md-12">
				                    <p><input name="pickup_point" type="radio" value="1" checked>
				                     <a target='_blank'  href='https://yandex.ru/maps/print/?text="Москва, Багратионовский проезд д. 5"'><i class='fa fa-map-marker'></i></a> 
				                     Багратионовский проезд д. 5
															ТРЦ ФИЛИОН первый этаж магазин COSE BELLE</p>
								    <p><input name="pickup_point" type="radio" value="2"> <a target='_blank'  href='https://yandex.ru/maps/print/?text="Москва, Адмирала Макарова дом 2 склад №33-1-2 АМА ГРУПП"'><i class='fa fa-map-marker'></i></a>
								    Адмирала Макарова дом 2 склад №33-1-2 АМА ГРУПП</p>
				                </div>
				            </div>

						</div>
						<div class="col-md-6">
							<div class="form-group">
				                <div class="col-md-12"><strong>Имя:</strong></div>
				                <div class="col-md-12">
				                     	<input type="text" name="firstname" class="form-control @if($errors->has('firstname')) is-invalid @endif" value="{{ old('firstname') }}" />
				                     	@if($errors->firstname) 
				                     		<div class="invalid-feedback">
										       Имя не может быть пустым полем
										    </div>
				                     	@endif
				                </div>
				            </div>
				            <div class="form-group">
				                <div class="col-md-12"><strong>Фамилия:</strong></div>
				                    <div class="col-md-12">
				                     	<input type="text" name="lastname" class="form-control @if($errors->has('lastname')) is-invalid @endif" value="{{ old('lastname') }}" />
				                     	@if($errors->firstname) 
				                     		<div class="invalid-feedback">
										       Фамилия не может быть пустым полем
										    </div>
				                     	@endif
				                </div>
				            </div>
				            <div class="form-group">
				                <div class="col-md-12"><strong>Email:</strong></div>
				                    <div class="col-md-12">
				                     	<input type="text" name="email" class="form-control @if($errors->has('email')) is-invalid @endif" value="{{ old('email') }}" />
				                     	@if($errors->Email) 
				                     		<div class="invalid-feedback">
										       Email не может быть пустым полем
										    </div>
				                     	@endif
				                </div>
				            </div>
				            <div class="form-group">
				                <div class="col-md-12"><strong>Коментарий:</strong></div>
				                    <div class="col-md-12">
				                     	<textarea  id="id_customer_notes" class="form-control" name="comment" placeholder="Коментарий к заказу" rows="3"></textarea>
				                </div>
				            </div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    <hr class="small">
	<div class="row">
		<div class="col-md-4">
			<a href="{{ url('/catalog') }}" class="btn btn-lg btn-block btn-outline-warning"><i class="fa fa-angle-left"></i> Вернуться в каталог</a>
		</div>
		<div class="col-md-4">
			
		</div>
		<div class="col-md-4">
			<button id="submit_btn" type="submit" class="btn btn-lg btn-outline-success btn-block">Отправить заказ <i class="fa fa-paper-plane"></i></button>
		</div>
	</div>	
</form>			
</div>
@endsection