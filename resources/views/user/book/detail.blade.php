@extends('user.app')

@section('content')


            <div id="detail">
                <div class="col-md-4">
                    <div class="detailInner">
                        <img src="{{ Request::root() }}/uploads/pictures/{{ $book->picture }}" width="150" height="250" alt="avatar">                                              
                    </div>             
                </div>
                <div class="col-md-8">
                    <div class="detailContent">
                        <h3>Clean Code</h3>
                        <p class="description">
                            <p>Tác giả: 
                                <span style="color: #0094ff;">{{ $book->author }}</span>
                            </p>
                            <p>Thể loại: 
                                <span style="color: #0094ff;">@if($book->category === NULL)
                                    Nothing
                                @else
                                    {{ $book->category->name }}
                                @endif</span>
                            </p>
                            <p>Giá bán: 
                                <span style="color: red;">{{ $book->price }}</span> VNĐ
                            </p>
                            <p>Ngày đăng: 
                                <span style="color: #0094ff;">{{ $book->created_at }}</span>
                            </p>
                            <p>Người đăng: 
                                <span style="color: #0094ff;">@if($book->member === NULL)
                                    AT
                                @else
                                    {{ $book->member->fullname }}
                                @endif</span>
                            </p>
                            <p>
                                <span >Liên hệ: </span>
                                <span style="color: #0094ff;">{{ $book->contact }}</span>
                            </p>
                        </p>
                        <p><u>Mô tả thông tin:</u></p>
                        <p class="content" style="line-height: 1.6em";>{{ $book->overview }}</p>
                <div class="fb-comments" data-href="https://sharebooks.com" data-numposts="5"></div>
                    </div>
                </div>
            </div>

            
@endsection