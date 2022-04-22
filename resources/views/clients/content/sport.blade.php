<div class="row mt-4">
    @foreach($dataPostsSport->posts as $key=>$value)
    <div class="col-xs-12 col-sm-12 col-md-3 col-xl-3 col-lg-3 mt-6">
        <div class="card">
            <img class="card" src="{{asset('admin/images/'. $value->images )}}" alt="Card image cap">
            <div class="card-body mt-4">
                <h6 class="card-title"><a href="{{route('client.getNewsById',['id'=>$value->id])}}" class="card__link">{{$value->title}}</a></h6>
                <div class="">
                    <p class="card-text">{{ $value->name}}</p>
                    <p class="card-text">{{ $value->created_at}}</p>
                </div>
                <div class="">
                    <p class="card-text">{{$value->introText}}</p>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>
