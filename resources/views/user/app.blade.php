<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
    <link rel="stylesheet" type="text/css" href="Request::root()/bower/bootstrap/dist/css/bootstrap.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{Request::root()}}/bower/bootstrap/dist/css/bootstrap.min.css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

    <link rel="stylesheet" href="{{Request::root()}}/font-awesome-4.6.3/css/font-awesome.min.css">

        <!-- Embed CSS -->
        <link href="{{Request::root()}}/Front-end/styles/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="{{Request::root()}}/Front-end/styles/animate.css" rel="stylesheet" type="text/css">
        <link href="{{Request::root()}}/Front-end/styles/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Embed Javascript -->
        <script src="{{Request::root()}}/bower/boostrap/dist/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="{{Request::root()}}/Front-end/styles/jquery.js" type="text/javascript"></script>

        <!-- Embed Customize CSS -->
        <link href="{{Request::root()}}/Front-end/styles/custom.css" rel="stylesheet" type="text/css"/>

        <link href="{{Request::root()}}/Front-end/footer/css/footer-distributed-with-contact-form.css" rel="stylesheet" type="text/css"/>

    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>

<div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.8&appId=1421136451519280";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<meta property="fb:app_id" content="1421136451519280" />
<meta property="fb:admins" content="100000611179484"/>
<form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
</form>
        <div class="header">
            <div class="headerTop">
                <div class="container">
                    <div class="headerInner">
                        <div class="col-md-6 col-xs-12 col-sm-6 col-lg-6 zoomInRight animated" id="titlePart" style="visibility: visible; animation-duration: 1.0s; animation-delay: 1s; animation-name: zoomInRight;"><a href="{{ url('user/book') }}">Chia sẻ để bạn có được nhiều hơn</a></div>
                        <div class="col-md-6 col-xs-6 col-sm-6 col-lg-6 zoomInLeft animated" style="visibility: visible; animation-duration: 1.0s; animation-delay: 1s; animation-name: zoomInLeft;" id="iconSocialPart">
                            <a href="" target="_blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-envelope-o fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                            <a href="" target="_blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                            <a href="" target="_blank">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                            <a href="" target="_blank">
                                <span class="fa-stack fa-lg">
                                  <i class="fa fa-circle fa-stack-2x"></i>
                                  <i class="fa fa-google-plus-official fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                            <a href="" target="_blank">
                                <span class="fa-stack fa-lg">
                                  <i class="fa fa-circle fa-stack-2x"></i>
                                  <i class="fa fa-youtube fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
        <div class="container mainContent">
            <div class="slideContainer row">
                <div class="slidePart zoomIn animated" style="visibility: visible; animation-duration: 0.4s; animation-delay: 1s; animation-name: zoomIn;">
                    <img class="img-responsive" src="{{Request::root()}}/Front-end/styles/images/slide1.png" alt="slide1"/>
                    <img class="img-responsive" src="{{Request::root()}}/Front-end/styles/images/slide2.png" alt="slide2" style="display: none"/>
                    <img class="img-responsive" src="{{Request::root()}}/Front-end/styles/images/slide3.png" alt="slide3" style="display: none"/>
                    <div class="slidePaper">
                        <ul>
                        </ul>
                    </div>
                    <div class="contentSlide row">
                        <div class="bannerInner">
                            <div class="bannerPart">
                                <div class="row">
                                    <h3 class="slideInUp animated" style="visibility: visible; animation-duration: 0.6s; animation-delay: 1s; animation-name: slideInUp;"><span>SHARE</span> BOOKS </h3>
                                    <p id="description" class="slideIntRight animated" style="visibility: visible; animation-duration: 0.6s; animation-delay: 1s; animation-name: zoomInRight;">trước những cuốn sách, tất cả mọi thứ đều mờ nhạt đi</p>
                                    <a href="#" class="lightSpeedIn" style="visibility: visible; animation-duration: 0.6s; animation-delay: 1s; animation-name: lightSpeedIn;" onclick="document.getElementById('postBook').style.display='block'">POST BOOKS</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="formPart container bounceInLeft animated" style="visibility: visible; animation-duration: 1.0s; animation-delay: 1s; animation-name: bounceInLeft;">
                    <form action="{{ url('user/book/search') }}"  role="form" method="POST" class="form-inline">
                        <div class="col-md-2 form-group formAll">
                            <a class="btn btn-primary" href="{{ url('user/book') }}">
                                <i class="fa fa-list"></i>
                                Tất cả
                            </a>
                        </div>
                        <div class="col-md-6 formSearch">
                            <input class="search_text form-control" name="search" placeholder="Nhập thông tin tìm kiếm bạn vào đây" type="text" size="40%">
                            <input class="submit_search form-control" name="submit" value="Tìm kiếm" type="submit">
                        </div>

                        <div class="col-md-2 collapse navbar-collapse" id="app-navbar-collapse">
                            <!-- Right Side Of Navbar -->
                            <ul class="nav navbar-nav navbar-right">
                                @if (Auth::guest())
                                    <li>
                                        <input type="button" class="btn btn-success form-control" id="email" onclick="document.getElementById('loginPage').style.display='block'" value="Đăng Nhập">
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ url('/user/profile') }}/{{ Auth::user()->id }}" role="button" aria-expanded="false">{{ Auth::user()->name }}
                                        </a>
                                    </li>
                                    <li><a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Đăng xuất
                                        </a>
                                    </li>
                                                            
                                @endif
                            </ul>
                        </div>
                    </form>                   
                </div>
            </div>
        @yield('content')
            <!-- Scripts -->
            <script src="/js/app.js"></script>
        <div id="loginPage" class="modal">
            <form class="modal-content animate" role="form" method="POST" action="{{ url('/login') }}">{{ csrf_field() }}
                <span onclick="document.getElementById('loginPage').style.display='none'" class="close" title="Close Modal">&times;</span>
                <h3 style="color: white; margin-left: 65px; font-family: 'Roboto'; font-weight: 200;">Đăng Nhập <i class="fa fa-lock"></i></h3>
                <div class="container">
                <label><b  style="font-family: 'Roboto'; font-weight: bold; color: white;">Email Đăng Nhập</b></label>
                <input type="text" placeholder="Vui lòng nhập tên đăng nhập của bạn vào đây " name="email" required>

                <label><b style="font-family: 'Roboto'; font-weight: bold; color: white;">Mật Khẩu</b></label>
                <input type="password" placeholder="Vui lòng nhập mật khẩu của bạn vào đây " name="password" required>
                <input class="chk" type="checkbox" checked="checked">  Ghi Chú

                <button type="submit" style="color: #00668b">Đăng Nhập</button>

                </div>

                <div class="container">
                <input type="button" class="btn btn-success form-control" id="email" onclick="document.getElementById('registerPage').style.display='block'; document.getElementById('loginPage').style.display='none'" value="Đăng ký" style="color: #00668b; width:100%;">
                <span class="psw">Forgot <a href="#">password?</a></span>
                </div>
            </form>
        </div>  
        <div id="registerPage" class="modal">
            <form class="modal-content animate" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}
                        <span onclick="document.getElementById('registerPage').style.display='none'" class="close" title="Bạn đang đóng chức năng đăng ký">&times;</span>
                        <h3 style="color: white; margin-left: 65px; font-family: 'Roboto'; font-weight: 200;">Đăng Ký Tài Khoản <i class="fa fa-lock"></i></h3>
                        <div class="container">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-6 control-label"><b  style="font-family: 'Roboto'; font-weight: bold; color: white;">Tên Đăng Nhập</b></label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-6 control-label"><b  style="font-family: 'Roboto'; font-weight: bold; color: white;">Email Đăng Nhập</b></label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-6 control-label"><b style="font-family: 'Roboto'; font-weight: bold; color: white;">Nhập Mật Khẩu</b></label>

                            <div class="col-md-12">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-6 control-label"><b style="font-family: 'Roboto'; font-weight: bold; color: white;">Nhập Lại Mật Khẩu</b></label>

                            <div class="col-md-12">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary">
                                    ĐĂNG KÝ
                                </button>
                                <button type="button" class="btn btn-cancel" style="color: #00668b;" onclick="document.getElementById('registerPage').style.display='none'">HỦY</button>
                            </div>
                        </div>
                        </div>
                    </form>
        </div>
        @if (Auth::guest())
            <div class="modal" id="postBook">
                {!! Form::open(['url' => 'register', 'files' => true, 'class' => 'modal-content animate', 'role' => 'form']) !!}
                    <span onclick="document.getElementById('postBook').style.display='none'" class="close" title="Bạn đang đóng chức năng upload sách">&times;</span>
                    <h3>Bạn cần đăng nhập để post sách!<i class="fa fa-book"></i></h3>
                    <p class="line"></p>
                    <div class="container">
                        <div class="loginwith" style="width:100%;">
                            <button type="button" class="cancelbtn" style="color: #00668b; width:100%;" onclick="document.getElementById('loginPage').style.display='block'; document.getElementById('postBook').style.display='none'">ĐĂNG NHẬP</button>
                            <p style="color: #00668b; width:100%; text-align: center;">----------------------</p>
                            <button type="button" class="cancelbtn" style="color: #00668b; width:100%;" onclick="document.getElementById('registerPage').style.display='block'; document.getElementById('postBook').style.display='none'">ĐĂNG KÝ</button>
                            <p style="color: #00668b; width:100%; text-align: center;">----------------------</p>
                            <a href="{{ Request::root() }}/redirectFacebook">
                                <button type="button" class="cancelbtn" style="color: #00668b; width:100%;" onclick="document.getElementById('postBook').style.display='none'">ĐĂNG NHẬP BẰNG FACEBOOK</button>
                            </a>
                            <p style="color: #00668b; width:100%; text-align: center;">----------------------</p>
                            <a href="{{ Request::root() }}/redirectTwitter/twitter">
                                <button type="button" class="cancelbtn" style="color: #00668b; width:100%;" onclick="document.getElementById('postBook').style.display='none'">ĐĂNG NHẬP BẰNG TWITTER</button>
                            </a>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        @else
        <div id="postBook" class="modal">
                {!! Form::open(['action' => 'User\BookController@store', 'files' => true, 'class' => 'modal-content animate', 'role' => 'form']) !!}
                    {!! Form::hidden('member_id', Auth::user()->id,  null, ['class' => 'form-control']) !!}
                    <span onclick="document.getElementById('postBook').style.display='none'" class="close" title="Bạn đang đóng chức năng upload sách">&times;</span>
                    <h3>Thông tin sách <i class="fa fa-book"></i></h3>
                    <p class="line"></p>
                    <div class="container">

                        <label><b  style="font-family: 'Roboto'; font-weight: 300; color: #adadad;">Tên sách</b></label>
                        <input style="margin-top: -8px;" type="text" placeholder=" " name="name" required>

                        <label><b style="font-family: 'Roboto'; font-weight: 300; color: #adadad;">Tác giả</b></label>
                        <input style="margin-top: -8px;" type="text" placeholder=" " name="author" required>

                        <label><b style="font-family: 'Roboto'; font-weight: 300; color: #adadad;">Thể loại</b></label>
                        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

                        <br>
                        <label><b style="font-family: 'Roboto'; font-weight: 300; color: #adadad; margin-top: 5px;">Giá: </b></label>
                        {!! Form::text('price', null, ['class' => 'form-control', 'required' => 'true']) !!}
                        
                        <br>
                        <div class="img">
                            <img src="{{Request::root()}}/uploads/pictures/default.png" alt="upload img" id = "output">
                        </div>  
                        <label><b style="font-family: 'Roboto'; font-weight: 300; color: #adadad; margin-top: 5px;">Hình ảnh: </b></label>
                        {!! Form::file('picture', array('onchange' => 'loadFile(event)') ) !!}

                        <br>
                        <label><b style="font-family: 'Roboto'; font-weight: 300; color: #adadad; margin-top: 5px;">Mô tả: </b></label>
                        <br>
                        {!! Form::textarea('overview', null, ['class' => 'form-control', 'required' => 'true', 'cols' => '30', 'rows' => '4', 'style' => 'border: 1px solid #f7f7f7;']) !!}
                        <br>
                        <label><b style="font-family: 'Roboto'; font-weight: 300; color: #adadad; margin-top: 5px;">Liên hệ: </b></label>
                        <br>
                        {!! Form::text('contact', null, ['class' => 'form-control', 'required' => 'true', 'style' => 'border: 1px solid #f7f7f7;']) !!}

                        <script>
                          var loadFile = function(event) {
                            var output = document.getElementById('output');
                            output.src = URL.createObjectURL(event.target.files[0]);
                          };
                        </script>

                        <button type="submit" style="color: #00668b; width:50%;">Đăng sách</button>
                    </div>
                {!! Form::close() !!}
        </div>  
        @endif
        <div class="clearfix"></div>
        
        <footer class="footer-distributed">

            <div class="footer-left">

                <h3>Share book</h3>

                <p class="footer-links">
                    <a href="#">Trang chủ</a>
                    ·
                    <a href="#">Blog</a>
                    ·
                    <a href="#">Tìm kiếm</a>
                    ·
                    <a href="#">Thông tin</a>
                    ·                    ·
                    <a href="#">Liên hệ</a>
                </p>

                <p class="footer-company-name">Sharebooks &copy; 2016</p>

                <div class="footer-icons">

                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-linkedin"></i></a>
                    <a href="#"><i class="fa fa-github"></i></a>

                </div>

            </div>

            <div class="footer-right">

                <p>Liên hệ</p>

                <form method="">

                    <input type="text" name="email" placeholder="Email" />
                    <textarea name="message" placeholder="Nội dung"></textarea>
                    <button>Gửi</button>

                </form>

            </div>

        </footer>
        <script src="{{Request::root()}}/Front-end/styles/JavaScript.js" type="text/javascript" ></script>
    </body>
</html>