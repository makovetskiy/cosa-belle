@extends('layouts.app')


@section('page')


<div class="wrapper">

	<header>
		<div class="layout-buttons">
			
			<span class="active"><i class="fa fa-th" aria-hidden="true"></i></span>
		    <span class=""><i class="fa fa-th-list" aria-hidden="true"></i></span>
		</div>
		<ul class="nav navbar-nav menu-catalog">
    		<li class="dropdown mega-dropdown active">
			 <a href="#" class="dropdown-toggle d-menu" data-toggle="dropdown" aria-expanded="false">Категории товаров <span class="caret"></span></a>	   			
				<div class="dropdown-menu mega-dropdown-menu">
                    <div class="container-fluid">
    				    <!-- Tab panes -->
                        <div class="tab-content">
                          <div class="tab-pane active" id="men">
                            <ul class="nav-list list-inline">
                            	<li>
                            		<a href="{{ route('catalog.index', ['category' => 0]) }}">
                            			<span>ВСЕ</span>
                            		</a>
                            	</li>
                            	@foreach($categories as $cat)
                            		<li>
                            			<a href="{{ route('catalog.index', ['category' => $cat->id]) }}">
                            				<span>{{$cat->c_name}}</span>
                            			</a>
                            		</li>
                            	@endforeach
                            </ul>
                          </div>
                        </div>
                    </div> 
                    <!-- Nav tabs -->

				</div>				
			</li>
        </ul>
		<h2>Список товаров</h2>
	</header>
	<ul class="products clearfix">
		@foreach($goods as $good)
		 <li class="product-wrapper">
			<div class="product">
				<div class="product-main">
					<div class="product-photo">
								<img src="img/catalog/{{$good->img}}.jpg" alt="">
								<div class="product-preview">
									<span class="button to-cart" onclick="addToCart({{$good->id}})"><i class="fa fa-cart-plus" aria-hidden="true"></i> В корзину</span>
								</div>
							</div>
							<div class="product-text">
								<h2 class="produсt-name">{{$good->g_name}}</h2>
								<p>{{$good->description}}</p>
							</div>
						</div>
						<div class="product-details-wrap">						
							<div class="product-details">
								<div class="product-availability"><i class="fa fa-check" aria-hidden="true"></i>В наличии</div>
								<span class="product-price product-price-old">
									<b>500</b>
									<small>руб.</small>
								</span>
								<span class="product-price">
									<strong>Цена: </strong><b>{{$good->price}}</b>
									<small>руб.</small>
								</span>
							</div>
							<div class="product-buttons-wrap">
								<div class="buttons">
									<span class="button" onclick="addToCart({{$good->id}})"><i class="fa fa-cart-plus" aria-hidden="true"></i> Купить</span>
								</div>
							</div>
						</div>
					</div>
		</li>
		@endforeach
	</ul>
	<div class='pagination-block'>
		{{$goods->appends(['category' => $category])->links() }}
	</div>
</div>


@endsection