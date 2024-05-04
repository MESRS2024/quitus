
<div class="row">
@foreach($stats as $stat)
        <div class="col-lg-3 col-6">

            <div class="small-box bg-{{$stat['class']}}">
                <div class="inner">
                    <h3>{{$stat['data']}} {{__('models/students.singular')}}</h3>
                    <p>{{$stat['title']}}</p>
                </div>
                <div class="icon">
                    <i class="ion ion-stats-bars"></i>
                </div>
                <a href="#" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>

@endforeach


</div>


