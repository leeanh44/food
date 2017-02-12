@extends('user.app')

@section('content')
            <div id="detail">
                <div class="col-md-4">
                    <div class="detailInner">
                        <img src="{{ Request::root() }}/uploads/pictures/{{ $book->picture }}" width="300" height="280" alt="avatar">                                              
                    </div>             
                </div>
                <div class="updateBook col-md-8">
                    {{ Form::model($book, ['method' => 'PATCH', 'url' => ['user/book', $book->id], 'class' =>'modal-content animate', 'role'=>'form', 'files' => true]) }}
                    {!! Form::hidden('member_id', Auth::user()->id,  null, ['class' => 'form-control']) !!}
                    <h3>Cập nhật thông tin sách <i class="fa fa-book"></i></h3>
                    <p class="line"></p>
                        <label><b  style="font-family: 'Roboto'; font-weight: 300; color: #046380;">Tên sách</b></label>
                        {!! Form::text('name', null, ['class' => 'form-control']) !!}

                        <label><b style="font-family: 'Roboto'; font-weight: 300; color: #046380;">Tác giả</b></label>
                        
                        {!! Form::text('author', null, ['class' => 'form-control']) !!}

                        <label><b style="font-family: 'Roboto'; font-weight: 300; color: #046380;">Gia</b></label>
                        
                        {!! Form::text('price', null, ['class' => 'form-control']) !!}

                        <label><b style="font-family: 'Roboto'; font-weight: 300; color: #046380;">Thể loại</b></label>
                        {!! Form::select('category_id', $categories, null, ['class' => 'form-control']) !!}

                        <br>
                        <label><b style="font-family: 'Roboto'; font-weight: 300; color: #046380; margin-top: 5px;">Hình ảnh: </b></label>
                        <div class="img col-md-offset-3">
                            <img src="{{Request::root()}}/uploads/pictures/default.png" alt="upload img" id = "output">
                        </div>  
                        {!! Form::file('picture', array('onchange' => 'loadFile(event)', 'class' => ' col-md-offset-3') ) !!}

                        <br>
                        <div class="clearnfix"></div>
                        <label><b style="font-family: 'Roboto'; font-weight: 300; color: #046380; margin-top: 5px;">Mô tả: </b></label>
                        <br>
                        {!! Form::textarea('overview', null, ['class' => 'form-control', 'style' => 'cols="10"; rows="4"']) !!}

                        <br>
                        <label><b style="font-family: 'Roboto'; font-weight: 300; color: #046380; margin-top: 5px;">Liên hệ: </b></label>
                        <br>
                        {!! Form::text('contact', null, ['class' => 'form-control']) !!}
                        <button class="update" type="submit" style="background-color: royalblue;color: #f5f5f5;width: 100%;font-size: 20px;line-height: 50px;margin-top: 40px;">Cập nhật</button>
                {!! Form::close() !!}
                <!-- </form> -->
                    </div>
            </div>

            
@endsection