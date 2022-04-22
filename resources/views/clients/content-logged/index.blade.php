@extends('clients.layout-home-logged')
@section('title',$dataDetail->title)
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                <div class="content">
                    <div class="header-content">
                        <h5 class="categories-content">{{$dataDetail->name}}</h5>
                        <h3 class="title-content">{{$dataDetail->title}}</h3>
                        <p>Tác giả viết bài: {{$dataDetail->author}} - {{$dataDetail->created_at}}</p>
                        <hr>
                    </div>
                    <div class="body-content">
                        <p class="description-content">{!!$dataDetail->description!!}
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
            </div>
        </div>
    </div>
    @include('clients.modal.modalComment')
@endsection
