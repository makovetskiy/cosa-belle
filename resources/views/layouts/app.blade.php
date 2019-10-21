<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>{{config('app.name')}}</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('vendor/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

    <!-- Custom CSS -->
    <link href="{{ asset('css/stylish-portfolio.css')}}" rel="stylesheet">
    <link href="{{ asset('css/flat-icons.css')}}" rel="stylesheet">
    <link href="{{ asset('js/jquery.kladr/jquery.kladr.min.css')}}" rel="stylesheet">
  </head>

  <body>

    
  	{{--Page--}}
  		@section('menu')
            @include('layouts.menu')
        @show
        @yield('page')


    <!-- Call to Action -->
    @if(Session::has('success_msg'))
     <div class="alert alert-success">{{ Session::get('success_msg') }}</div>
    @endif
    <aside class="call-to-action bg-primary ">
      <form method="post" action="{{ route('sendemail') }}">
      <div class="container text-center">
        <h2><strong>Остались вопросы?</strong></h2>
        <h4>Оставьте заявку и наши специалисты проконсультируют Вас!</h4>
        <div class="row">
          
          {{ csrf_field() }}
          <div class="col-md-4">
            <input type="text" name="name_c" class="form-control contact_send  @if($errors->has('name_c')) is-invalid @endif" id="name_c" placeholder="Имя">
          </div>
          <div class="col-md-4">
            <input type="text" name="phone_c" class="form-control contact_send  @if($errors->has('phone_c')) is-invalid @endif" id="phone_c" placeholder="Телефон">
          </div>
          <div class="col-md-4">
            <button type="submit" class="btn btn-lg btn-info form-control">Отправить заявку</button>
          </div>
        
        </div>
      </div>
      </form>
    </aside>

    <!-- Footer -->
    <footer id="about">
      <div class="container">

        <div class="row">
          <div class="col-lg-10 mx-auto text-center">
            <h2>
              <strong>О нас</strong>
            </h2>
            <hr class="small">
            <h4>
              <strong>{{config('app.name')}}</strong>
            </h4>
            <p>{{config('app.address')}}</p>
            <ul class="list-unstyled">
              <li>
                <i class="fa fa-phone fa-fw"></i>
                {{config('app.phone')}}</li>
              <li>
                <i class="fa fa-envelope-o fa-fw"></i>
                <a href="mailto:{{config('app.email')}}">{{config('app.email')}}</a>
              </li>
            </ul>
            <br>
            <ul class="list-inline">
              <li class="list-inline-item">
                <a href="{{config('app.vk')}}" target="_blank">
                  <i class="fa fa-vk fa-fw fa-3x"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-odnoklassniki fa-fw fa-3x"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <i class="fa fa-facebook fa-fw fa-3x"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="{{config('app.instagram')}}" target="_blank">
                  <i class="fa fa-instagram fa-fw fa-3x"></i>
                </a>
              </li>
            </ul>
            <hr class="small">
            <p class="text-muted">Copyright &copy; {{config('app.name')}} 2017</p>
          </div>
        </div>
      </div>
      <a id="to-top" href="#top" class="btn btn-dark btn-lg js-scroll-trigger">
        <i class="fa fa-chevron-up fa-fw fa-1x"></i>
      </a>
    </footer>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('js/jquery.kladr/jquery.kladr.min.js')}}"></script>
    <!-- Plugin JavaScript -->
    <script src="{{ asset('vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for this template -->
    <script src="{{ asset('js/stylish-portfolio.js')}}"></script>
  </body>

</html>
