@extends('user.app')

@section('content')

            @include('user.layouts.partials.success')
            @include('user.layouts.partials.errors')
            <div class="row sidebar">
                <div class="col-md-12 col-lg-4 col-xs-12 col-sm-12 bounceInLeft animated" style="visibility: visible; animation-duration: 1.6s; animation-delay: 1s; animation-name: bounceInLeft;">
                    <div class="row titleLeft">
                        <h3 class="bounceIn animated">Danh Mục Sách</h3>
                    </div>
                    <div class="row listCat">
                        @include('user.menu')
                    </div>
                </div>
                <div class="col-md-12 col-lg-8 col-xs-12 col-sm-12">
                    <div class="row titleDetail">
                        <h3 class="bounceIn animated" style="visibility: visible; animation-duration: 1.6s; animation-delay: 1s; animation-name: bounceIn;">Tất cả</h3>
                    </div>
                    <div class="row content bounceInRight animated" style="visibility: visible; animation-duration: 1.6s; animation-delay: 1s; animation-name: bounceInRight;">
                        <div class="row listBook">
                        @foreach($books as $book)
                             <div class="col-md-4" id="book">
                                <div class="row">
                                    @if($book->picture === NULL)
                                        <a href="{{ url('user/book') }}/{{ $book->id }}"><img src="{{ Request::root() }}/uploads/pictures/default.png" width="80px" height="120px"></a>
                                    @else
                                        <a href="{{ url('user/book') }}/{{ $book->id }}"><img src="{{ Request::root() }}/uploads/pictures/{{ $book->picture }}" alt="1"  /></a>
                                    @endif
                                </div>
                                <div class="row">
                                    <p class="nameBook">{{ $book->name }}</p>                                        
                                    <p class="text-left author">Tác giả: <span class="tagBook">
                                    {{ $book->author }}
                                    </span></p>
                                    <p class="text-left inforBook">Giá bán:<span class="tagBook" style="color: red; font-weight: bold;">
                                    {{ $book->price }}
                                    </span> VNĐ
                                    </p>
                                </div>
                            </div>
                        @endforeach                     
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="paginationBook" style="padding-top: 50px;">
                        {!! $books->render(); !!}
                    </div>
                </div>
            </div>
        </div>

            
@endsection