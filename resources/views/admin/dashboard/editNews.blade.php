@extends('admin.layout-admin')
@section('title','Sửa Tin tức')
@section('content')
    <div class="container-fluid">
        <form action="{{route('admin.handleUpdateNews')}}" enctype="multipart/form-data" method="POST" accept-charset="utf-8">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <h1>Chỉnh sửa bài viết</h1>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="mb-3">
                        <label for="titleNews" class="form-label">Tiêu đề(*)</label>
                        <input type="text" name="titleNews" class="form-control" id="titleNews" value="{{$dataPostDetail->title}}">
                    </div>
                    <div class="mb-3">
                        <label for="titleNews" class="form-label">Thể loại</label>
                        <select name="selectTypeNews" class="form-control" id="">
                            @foreach($dataTypes as $key=>$value)
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="contentNews" class="form-label">Mô Tả Ngắn(*)</label>
                        <textarea rows="2" type="text" name="shortDescription" class="form-control" id="contentNews">{{$dataPostDetail->introText}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="contentNews" class="form-label">Nội dung(*)</label>
                        <textarea rows="8" type="text" name="contentNews" class="form-control" id="ckeditor1">{{$dataPostDetail->description}}</textarea>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <button type="submit" class="btn btn-primary" name="btnAddNews">Lưu[Sửa]</button>
                    {{--                    <a href="" class="btn bg-black">Thoát</a>--}}
                    <div class="mb-3 mt-3">
                        <label for="imageNews" class="form-label">Ảnh(*)</label>
                        <input type="file" name="imageNews" class="form-control" id="imageNews">
                        <br>
                        <img width="50%" src="{{asset('admin/images/'.$dataPostDetail->images)}} " alt="">
                    </div>
                </div>
            </div>

        </form>
        <!-- /.content -->
    </div><!-- /.content-wrapper -->
@endsection
