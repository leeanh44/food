@extends('user.app')

@section('content')
    <div id="profile">
                <div class="col-md-4">
                    <div class="profileInner">
                        @if($member->avatar === NULL)
                            <img src="{{ Request::root() }}/uploads/pictures/default.png" width="100px" height="100px">
                        @else
                            <img src="{{ Request::root() }}/uploads/avatars/{!! $member->avatar !!}" width="100px" height="100px">
                        @endif                      
                        <div class="row inforAuthor">
                            <p class="info"><i class="fa fa-user icon"></i><span class="detail">{{ $member->fullname }}</span></p>
                            <p class="info"><i class="fa fa-envelope icon"></i><span class="detail">{{ Auth::user()->email }}</span></p>
                            <p class="info"><i class="fa fa-male icon"></i><span class="detail">{{ $member->gender }}</span></p>
                            <p class="info"><i class="fa fa-phone icon"></i><span class="detail">{{ $member->phone }}</span></p>
                            <p class="info"><i class="fa fa-location-arrow icon"></i><span class="detail">{{ $member->address }}</span></p>
                        </div>    
                    </div>
                    <div class="updateAuthor">
                        <input type="submit" value="Cập nhật thông tin" onclick="document.getElementById('editUser').style.display='block'">
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
                        <p class="content">{{ $book->overview }}</p>
                        <div class="abc" style="text-align: right">
                        <button type="button" class="btn btn-primary">
                            <a href="{!! url('user/book', [$book->id]) !!}/edit" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i>Sửa</a>
                        </button>
                        </div>
                    </div>
                @endforeach                                                                                             
                </div>
            </div>
            <div class="paginationBook">
                {!! $books->render(); !!}
            </div>
            <div id="editUser" class="modal">
            {{ Form::model($member, ['method' => 'PATCH', 'url' => ['user/member', $member->id], 'class' =>'modal-content animate well form-horizontal', 'role'=>'form', 'files' => true]) }}
                    {!! Form::hidden('user_id', Auth::user()->id,  null, ['class' => 'form-control']) !!}
                <span onclick="document.getElementById('editUser').style.display='none'" class="close" title="Bạn đang đóng chức năng upload sách">&times;</span>
                <div>
                    <fieldset>
                        <legend style="color: #00668b; font-weight: bold;">Cập nhật thông tin cá nhân</legend>
                        <div class="form-group">
                          <label class="col-md-4 control-label">Avatar</label>  
                          <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                            @if($member->avatar === NULL)
                                <img src="{{ Request::root() }}/uploads/pictures/default.png" width="100px" height="100px">
                            @else
                                <img src="{{ Request::root() }}/uploads/avatars/{!! $member->avatar !!}" width="100px" height="100px">
                            @endif
                            </div>
                            <script>
                              var loadFile = function(event) {
                                var output = document.getElementById('output');
                                output.src = URL.createObjectURL(event.target.files[0]);
                              };
                            </script>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label"></label>  
                          <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                              
                            {!! Form::file('avatar', array('onchange' => 'loadFile(event)') ) !!}
                            </div>
                          </div>
                        </div>


                        <div class="form-group">
                          <label class="col-md-4 control-label">Họ và tên</label>  
                          <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                              <input name="fullname" placeholder="First Name" class="form-control" value="{{ $member->fullname }}"  type="text" style="width: 200px;">
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" >Địa chỉ</label> 
                          <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-inbox"></i></span>
                                <input name="address" placeholder="Last Name" class="form-control" value="{{ $member->address }}"  type="text" style="width: 200px;">
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" >Thư điện tử</label> 
                          <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                                <input name="last_name" placeholder="Last Name" class="form-control" value="{{ Auth::user()->email }}"  type="text" style="width: 200px;">
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" >Giới tính</label> 
                          <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-heart-empty"></i></span>
                                <input name="gender" placeholder="Last Name" class="form-control" value="{{ $member->gender }}"  type="text" style="width: 200px;">
                            </div>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-md-4 control-label" >Số điện thoại</label> 
                          <div class="col-md-4 inputGroupContainer">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
                                <input name="phone" placeholder="Last Name" class="form-control" value="{{ $member->phone }}"  type="text" style="width: 200px;">
                            </div>
                          </div>
                        </div>

                        <div class="form-group" style="text-align: center; margin-left: 100px;">
                          <div class="col-md-4" style="text-align: center">
                            <button type="submit" class="btn btn-success">Cập nhật <span class="glyphicon glyphicon-send"></span></button>
                          </div>
                          <div class="col-md-4" style="text-align: center">
                            <span class="btn btn-danger" onclick="document.getElementById('editUser').style.display='none'" >Hủy bỏ <span class="glyphicon glyphicon-send"></span></span>
                          </div>
                        </div>

                    </fieldset>
                </div>
            {!! Form::close() !!}
        </div> 

@endsection
