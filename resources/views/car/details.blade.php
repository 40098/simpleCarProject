<div id="showDetails">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 fw-bold">Brand: </div>
            <div class="col-sm-6 ">{{$car->brands[$car->brand]}}</div>
        </div>
        <div class="row">
            <div class="col-sm-6 fw-bold">Type: </div>
            <div class="col-sm-6 ">{{$car->type}}</div>
        </div>
        <div class="row">
            <div class="col-sm-6 fw-bold">Comment: </div>
            <div class="col-sm-6 ">{!!$car->comment!!}</div>
        </div>
    </div>
</div>