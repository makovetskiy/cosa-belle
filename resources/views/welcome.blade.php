@extends('layouts.app')

@section('page')

    <!-- Header -->
    <header class="header" id="top" style="display:none;">
      <div class="text-vertical-center">
        
      </div>
    </header>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="item"  style="height: 550px;">
            <div style="background: url('img/bg.jpg');background-repeat: no-repeat;background-size: cover; height: 100%;"></div>
          </div>
        </div>
        <div class="carousel-item">
          <div class="item"  style="height: 550px;">
            <div style="background: url('img/col1.jpg');background-repeat: no-repeat;background-size: cover; height: 100%;"></div>
          </div>
        </div>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
    <!-- Portfolio -->
    <section id="portfolio" class="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 mx-auto text-center">
            <h2>Наши колекции</h2>
            <hr class="small">
            <div class="row">
              @foreach($categories as $cat)
                <div class="col-md-6 main-page-catalog-block">
                  <h3>
                    <strong>
                    <a class="link-catalog-main-page" href="{{ url('/catalog') }}?category={{$cat->id}}">{{$cat->c_name}}</a></strong>
                  </h3>
                  <hr class="small">
                  <a href="{{ url('/catalog') }}?category={{$cat->id}}">
                    <div class="portfolio-item" style="background: url(img/cat/{{$cat->c_img_url}});" >
                    </div>
                  </a>
                </div>
              @endforeach
            </div>
            <!-- /.row (nested) -->
            <a href="{{ url('/catalog') }}" class="btn btn-dark btn-lg">Перейти в каталог...</a>
          </div>
          <!-- /.col-lg-10 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>

    <!-- Services -->
    <section id="services" class="services bg-primary text-white">
      <div class="container">
        <div class="row text-center">
          <div class="col-lg-10 mx-auto">
            <h2>Способы оплаты</h2>
            <hr class="small">
            <div class="row">
              <div class="col-md-4 col-sm-6">
                <div class="service-item">
                  <span class="fa-stack fa-4x" style="color: #a72c72;">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-money fa-stack-1x text-primary" style="color: #fff !important;"></i>
                  </span>
                  <h4>
                    <strong>Оплата наличными</strong>
                  </h4>
                  <p>Вы можете оплатить покупку наличными в офисе продаж и ли при получении товара курьером.</p>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="service-item">
                  <span class="fa-stack fa-4x" style="color: #a72c72;">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-credit-card fa-stack-1x text-primary" style="color: #fff !important;"></i>
                  </span>
                  <h4>
                    <strong>Безналичный расчет</strong>
                  </h4>
                  <p>Оплата картой или по реквизитам</p>
                </div>
              </div>
              <div class="col-md-4 col-sm-6">
                <div class="service-item">
                  <span class="fa-stack fa-4x" style="color: #a72c72;">
                    <i class="fa fa-circle fa-stack-2x"></i>
                    <i class="fa fa-truck fa-stack-1x text-primary" style="color: #fff !important;"></i>
                  </span>
                  <h4>
                    <strong>Доставка</strong>
                  </h4>
                  <p>Доставка удобным вам способом или самовывоз.</p>
                </div>
              </div>
            </div>
            <!-- /.row (nested) -->
          </div>
          <!-- /.col-lg-10 -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container -->
    </section>

@endsection