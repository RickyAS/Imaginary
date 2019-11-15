@extends('layouts.app')

@section('content')
<div class="container" style="max-width:100% !important;">
  @if(!empty($go->name))
  <br>
  <div class="row" style=" justify-content: center !important;">
    <h1>Album Collections of {{$go->name}}</h1>
  </div>
  <br>
  @else
  @endif
    <div class="row" style=" justify-content: center !important;">
            @if(count($albums)>0)

            <?php 
            $colcount =count($albums);
            $i =1;
            ?>
            @foreach ($albums as $post)
            @if($i== $colcount)
     <!-- <div class="col"> -->
    <div class="medium-4 columns end">
        <div class="card" style="width: 18rem;">
            <a href="/take/{{$post->id}}">
            <img class="card-img-top" src="/storage/albums_image/{{$post->cover_image}}" alt="{{$post->name}}"></a>
            <div class="card-body" style="padding:0.5rem !important;">
              <div class="text-center">
              <h5 class="card-title">{{$post->name}}</h5>
              <p class="card-text">{!! $post->description !!}</p>
              </div>
            </div>
          </div>
  

    @else
    <div class="medium-4 columns">
            <div class="card" style="width: 18rem;">
                <a href="/take/{{$post->id}}">
                <img class="card-img-top" src="/storage/albums_image/{{$post->cover_image}}" alt="{{$post->name}}"></a>
                <div class="card-body" style="padding:0.5rem !important;">
                    <div class="text-center">
                        <h5 class="card-title">{{$post->name}}</h5>
                        <p class="card-text">{!! $post->description !!}</p>
                      </div>
                </div>
              </div>
        
        @endif

        @if($i % 4 == 0)
    </div>  </div> <div class="row text-center" style="justify-content: center !important;">
        @else
        </div>
        @endif
        <?php $i++; ?>
        @endforeach 
    </div>
</div>
      @else
      <p>No Album Available</p>
      @endif
    
@endsection
  