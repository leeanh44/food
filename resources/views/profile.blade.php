@extends('layouts.apppublic')

@section('content')
    <div class="formContainer row">
                <div class="formPart container">
                    <form action="" class="form-inline">
                        <div class="col-md-2 form-group formAll">
                            <a class="btn btn-primary" href="">
                                <i class="fa fa-list"></i>
                                Tất cả
                            </a>
                        </div>
                        <div class="col-md-8 formSearch">
                            <input class="search_text form-control" name="" placeholder="Nhập thông tin tìm kiếm bạn vào đây" type="text" size="40%">
                            <input class="submit_search form-control" name="" value="Tìm kiếm" type="submit">
                        </div>
                        <div class="col-md-2 form-group formLogin">
                           <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">{{ $member->fullname }}
                             <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                <li><a href="#">Trang Cá nhân</a></li>
                                <li><a href="#">Đăng xuất</a></li>
                          </ul>
                        </div>
                        </div>
                    </form>                      
                </div>
            </div>
            <div id="profile">
                <div class="col-md-4">
                    <div class="profileInner">
                        <img src="{{Request::root()}}/Front-end/styles/images/author.png" width="300" height="280" alt="avatar">                      
                        <div class="row inforAuthor">
                            <p class="info"><i class="fa fa-user icon"></i><span class="detail">{{ $member->fullname }}</span></p>
                            <p class="info"><i class="fa fa-home icon"></i><span class="detail">{{ $member->fullname }}</span></p>
                            <p class="info"><i class="fa fa-envelope icon"></i><span class="detail">thienan@gmail.com</span></p>
                            <p class="info"><i class="fa fa-male icon"></i><span class="detail">{{ $member->gender }}</span></p>
                            <p class="info"><i class="fa fa-phone icon"></i><span class="detail">{{ $member->phone }}</span></p>
                            <p class="info"><i class="fa fa-location-arrow icon"></i><span class="detail">{{ $member->address }}</span></p>
                        </div>    
                    </div>             
                </div>
                <!-- List Book-->
                <div class="col-md-8">
                @foreach($books as $book)
                    <div class="myBookInner">
                        <h3>{{ $book->name }}</h3>
                        <p class="ab">
                            <span class="a">Tác giả: </span>
                            <span class="b">{{ $book->author }}</span>

                            <span class="a">Thể loại: </span>
                            <span class="b">{{ $book->category->name }}</span>

                            <span class="a">Ngày đăng: </span>
                            <span class="b">{{ $book->created_at }}</span>
                        </p>
                        <p class="content">Clean code is something that I have been interested in for a while now, and plan 
                        to write a series of blog posts about the different concepts related to clean code. 
                        In this introduction post to the series I will talk a little bit about what clean code 
                        actually is and also try to answer the question why should you care about clean code.</p>
                        <div class="abc" style="text-align: right">
                            <button type="button" class="btn btn-primary" onclick="document.getElementById('updateBook').style.display='block'" >Sửa</button>
                            <button type="button" class="btn btn-primary">Xóa</button>
                        </div>
                    </div>
                @endforeach                                                                                             
                </div>
            </div>
            <div class="paginationBook">
                        {!! $books->render(); !!}
            </div>
            <div id="updateBook" class="modal">
                <form class="modal-content animate" action="action_page.php">
                    <span onclick="document.getElementById('updateBook').style.display='none'" class="close" title="Bạn đang đóng chức năng upload sách">&times;</span>
                    <h3>Cập nhật thông tin sách <i class="fa fa-book"></i></h3>
                    <p class="line"></p>
                    <div class="container">

                        <label><b  style="font-family: 'Roboto'; font-weight: 300; color: #046380;">Tên sách</b></label>
                        <input style="margin-top: -8px;" type="text" placeholder=" " name="uname" required>

                        <label><b style="font-family: 'Roboto'; font-weight: 300; color: #046380;">Tác giả</b></label>
                        <input style="margin-top: -8px;" type="text" placeholder=" " name="psw" required>

                        <label><b style="font-family: 'Roboto'; font-weight: 300; color: #046380;">Thể loại</b></label>
                        <select style="height: 35px; border: 1px solid #feffda; border-radius: 10px; margin-left: 10px; margin-bottom: 15px; margin-top: 10px;">
                            <option>Sách Kinh Doanh - Marketing</option>
                            <option>Sách Tài Chính - Ngân Hàng</option>
                            <option>Sách Ngoại Ngữ</option>
                            <option>Sách Khoa Học - Tự Nhiên</option>
                            <option>Sách Văn Hóa - Nghệ Thuật</option>
                            <option>Sách Kinh Tế - Quản Lý</option>
                            <option>Sách Công Nghệ Công Tin</option>
                        </select>

                        <br>
                        <div class="img">
                            <img src="styles/images/cleancode.jpg" alt="upload img">
                        </div>  
                        <label><b style="font-family: 'Roboto'; font-weight: 300; color: #046380; margin-top: 5px;">Hình ảnh: </b></label>
                        <input type="button" style="margin-top: 15px; height: 35px;" value="Chọn ảnh">

                        <br>
                        <label><b style="font-family: 'Roboto'; font-weight: 300; color: #046380; margin-top: 5px;">Mô tả: </b></label>
                        <br>
                        <textarea cols="55" rows="4" style="border: 1px solid #f7f7f7;"></textarea>

                        <br>
                        <label><b style="font-family: 'Roboto'; font-weight: 300; color: #046380; margin-top: 5px;">Chi tiết: </b></label>
                        <br>
                        <textarea cols="55" rows="6" style="border: 1px solid #f7f7f7;"></textarea>

                        <button type="submit" style="color: #00668b; width:50%;">Cập nhật</button>
                    </div>
                </form>
            </div> 
@endsection
