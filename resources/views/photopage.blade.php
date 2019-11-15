@extends('layouts.app')

@section('content')
<div class="container" style="max-width:100% !important;">
    <br>
    <div class="row">
        <div class="col">
            <span></span>
          </div>
          <div class="col" style="text-align:center !important">
              <span><h1>{{$album->name}}</h1></span>
            </div>
            <div class="col">
                <span></span>
              </div>

        
    </div>
    <div class="row">
        <div class="col">
            <span></span>
          </div>
          <div class="col" style="text-align:center !important">
            <span><h3>{{$album->description}}</h3></span>
          </div>
          <div class="col" style="text-align:right !important">
              <span><h3>created by <a href="/artist/{{$go->name}}"> {{$go->name}}</a></h3></span>
            </div>
    </div>
    <br>
    <div class="row" style=" justify-content: center !important;">
            @if(count($album->photos)>0)

            <?php 
            $colcount =count($album->photos);
            $i =1;
            ?>
            
            @foreach ($album->photos as $post)
            @if($i== $colcount)
     <!-- <div class="col"> -->
    <div class="medium-4 columns end">
        <div class="card" style="width: 18rem;">
          <a href="" data-toggle="modal" data-target="#R{{$post->id}}">
            <img class="card-img-top" src="/storage/photos/{{$post->album_id}}/{{$post->photo}}" alt="{{$post->title}}">
          </a>
          <div class="modal fade" id="R{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$post->title}}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="{{$post->title}}">{{$post->title}}</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <img class="card-img-top" src="/storage/watermarked/{{$post->album_id}}/{{$post->photo}}" alt="{{$post->title}}">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  @guest
                      <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#modal-login">Sign in to download</button>
                      @endguest
                  @auth
                  <a href="{{ route('books.download', $post->id) }}" class="btn btn-primary">Download</a>
                  @endauth
                </div>
              </div>
            </div>
          </div>
          </div>
  

    @else
    <div class="medium-4 columns">
            <div class="card" style="width: 18rem;">
              <a href="" data-toggle="modal" data-target="#R{{$post->id}}">
                <img class="card-img-top" src="/storage/photos/{{$post->album_id}}/{{$post->photo}}" alt="{{$post->title}}">
              </a>
              <div class="modal fade" id="R{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="{{$post->title}}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="{{$post->title}}">{{$post->title}}</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <img class="card-img-top" src="/storage/watermarked/{{$post->album_id}}/{{$post->photo}}" alt="{{$post->title}}">
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      @guest
                      <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#modal-login">Sign in to download</button>
                      @endguest
                      @auth
                  <a href="{{ route('books.download', $post->id) }}" class="btn btn-primary">Download</a>
                  @endauth
                    </div>
                  </div>
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
      @else
      <p>No Image Available</p>
      @endif


    </div>
</div>
@endsection