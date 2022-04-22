<div class="container">
    <div class="row">
        <div class="col-sm-12 col-xs-12 col-md-12 col-xl-12 col-lg-12">
            <h3 class="mt-4">Phần bình luận</h3>
            @if((session('sessionUserName')))
            <form action="" method="post" role="form">
                @csrf
                <legend> Xin chào bạn: {{session('sessionUserName')}}</legend>
                <div class="form-group">
                    <label for="">Nội dung bình luận:</label>
                    <textarea name="comment" class="form-control" id="comment" row="4" required="required" placeholder="Nhập nội dung(*)"></textarea>
                    <p style="margin-top:10px">Ý kiến của bạn sẽ được xét duyệt trước khi đăng. Xin vui lòng gõ tiếng Việt có dấu</p>
                </div>
                <button type="submit" class="btn btn-primary mb-4" id="btn-comment">Gửi bình luận</button>
            </form>
            @else
                <button type="submit" class="btn btn-danger" >Vui lòng đăng nhập để bình luận</button>
                <br>
            @endif
            <h4>Các bình luận về bài viết này</h4>
            @if((session('sessionUserName')))
            <div id="show-comment">
                <div id="handleShow">
                </div>
                @foreach($postDetailComment->comment as $key => $value)
                    <div id="comment{{ $value->id }}" style="display:flex" class="comment-area" >            
                        <img src="{{asset('admin/img/undraw_profile_2.svg')}}" width="5%" class="img-profile rounded-circle profileImg-comment" alt="">
                        <div  class="body-comment ml-4">
                            <h6 class="media-heading">{{ $value->user->name }}</h6>                
                            <p>Nội dung: {{ $value->content_comment }}</p>
                            <p>Thời gian viết:{{ $value->created_at }}</p>
                            @if (Auth::id() == $value->users_id)                    
                            <div class="action-btn">
                                <a href="#" id="btnHandleUpdate">Sửa bình luận</a>
                                <a href="" data-id="{{ $value->id }}" class="btnHandleDelete">Xóa bình luận</a>
                            </div>
                            @endif
                        </div>    
                    </div>
                @endforeach
            </div>
            @else
            <button type="submit" class="btn btn-danger" >Vui lòng đăng nhập để xem bình luận</button>
            <br>
            @endif
        </div>
    </div>

</div>
@section('js')
    <script>
        var _csrf = '{{csrf_token()}}';
        $(function() {
            $('#btn-comment').click(function(ev){
                ev.preventDefault();
                $.ajax({
                    url: "{{route('client.handleComment',$dataDetail->id) }}",
                    type: 'POST',
                    data:{
                        _token: _csrf,
                        comment: $('textarea[name="comment"]').val(),
                    },
                    success: function(res)
                    {
                        $('#handleShow').after(res)
                    }
                })
            });
            $('.btnHandleDelete').click(function(ev){
                ev.preventDefault();
                const id = $(this).attr('data-id');
                // console.log(id);
                if(confirm('Bạn có chắc muốn xóa bình luận này?'))
                {
                    $.ajax({
                    type: "GET",
                    url: "{{ route('client.handleDeleteComment') }}",
                    data: {
                        id: id,
                        _token: _csrf
                    },
                    dataType: "json",
                    success: function (response) {
                        $('#comment'+id).remove();

                    }
                });
                }
                
                
            });
        
        });
    </script>
    
@endsection
