<div id="comment{{ $comment->id }}" style="display:flex" class="comment-area" >            
    <img src="{{asset('admin/img/undraw_profile_2.svg')}}" width="5%" class="img-profile rounded-circle profileImg-comment" alt="">
    <div  class="body-comment ml-4">
        <h6 class="media-heading">{{ session('sessionUserName') }}</h6>                
        <p>Nội dung: {{ $comment->content_comment }}</p>
        <p>Thời gian viết:{{ $comment->created_at }}</p>                
        <div class="action-btn">
            <a href="#" id="btnHandleUpdate">Sửa bình luận</a>
            <a href="" data-id="{{ $comment->id }}" class="btnHandleDelete">Xóa bình luận</a>
        </div>
    </div>    
</div>
@section('js')
    <script>
        var _csrf = '{{csrf_token()}}';
        $(function() {
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
