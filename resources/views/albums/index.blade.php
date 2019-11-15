@extends('layouts.app3')

@section('content')
<div class="container" style="max-width:100% !important;">
        <br>
<div class="row" style=" justify-content: center !important;">
    <h1>My Album Collections</h1>
</div>
<br>
<div class="row" style=" justify-content: center !important;">
  
        <button type="button" class="btn btn-icon btn-3 btn-primary" data-toggle="modal" data-target="#modal-album">
            	<span class="btn-inner--icon"><i class="ni ni-album-2"></i></span>
                <span class="btn-inner--text">New Album</span>
            </button>

        <div class="modal fade" id="modal-album" tabindex="-1" role="dialog" aria-labelledby="modal-album" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
    <div class="modal-body p-0">
                      
    <div class="card bg-secondary shadow border-0">
      <div class="card-body px-lg-5 py-lg-5">
          <div class="text-center text-muted mb-4">
              <small>Create new album</small>
          </div>
          {!! Form::open([
            'action' => 'AlbumsController@store',
            'method' => 'POST', 
            'enctype'=>'multipart/form-data'])!!}
              <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                      {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
                  </div>
              </div>

              <div class="form-group">
                  <div class="input-group input-group-alternative">
                      {{Form::textarea('description', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description'])}}
                  </div>
              </div>
              <div class="custom-control custom-control-alternative custom-checkbox">
                    {{Form::file('cover_image')}}  
              </div>
              
              <div class="text-center">
                    {{Form::submit("Save",['class'=>'btn btn-primary my-4'])}} 
              </div>
              {!! Form::close() !!}

      </div>
    </div>
    </div>
              
          </div>
      </div>
  </div>
    
</div>
<br><br>

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
            <a href="albums/{{$post->id}}">
            <img class="card-img-top" src="storage/albums_image/{{$post->cover_image}}" alt="{{$post->name}}"></a>
            <div class="card-body" style="padding:0.5rem !important;">
                    <div class="text-center">
                <div data-toggle="modal" data-target="#modal-{{$post->id}}">
                    <button type="button" class="btn btn-sm btn-white" data-toggle="tooltip" data-placement="top" title="Click to edit album!">  
                        {{$post->name}}
                          </button>
                </div>
              <p class="card-text">{!! $post->description !!}</p>
            </div></div>
          </div>
  

    @else
    <div class="medium-4 columns">
            <div class="card" style="width: 18rem;">
                <a href="albums/{{$post->id}}">
                <img class="card-img-top" src="storage/albums_image/{{$post->cover_image}}" alt="{{$post->name}}"></a>
                <div class="card-body" style="padding:0.5rem !important;">
                    
                    <div class="text-center">
                            <div data-toggle="modal" data-target="#modal-{{$post->id}}">
                                    <button type="button" class="btn btn-sm btn-white" data-toggle="tooltip" data-placement="top" title="Click to edit album!">  
                                        {{$post->name}}
                                          </button>
                                </div>
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

        <div class="modal fade" id="modal-{{$post->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-{{$post->id}}" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                    <div class="modal-content">
        <div class="modal-body p-0">
                          
        <div class="card bg-secondary shadow border-0">
          <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                  <small>Edit album</small>
              </div>
              {!! Form::open([
                'action' => ['AlbumsController@update', $post->id],
                'method' => 'POST', 
                'enctype'=>'multipart/form-data'])!!}
                  <div class="form-group mb-3">
                      <div class="input-group input-group-alternative">
                          {{Form::text('name', $post->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
                      </div>
                  </div>
      
                  <div class="form-group">
                      <div class="input-group input-group-alternative">
                          {{Form::textarea('description', $post->description, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Description'])}}
                      </div>
                  </div>
                  <div class="custom-control custom-control-alternative custom-checkbox">
                        {{Form::file('cover_image')}}  
                  </div>
                  <div class="modal-footer">
                        {{Form::submit("Save",['class'=>'btn btn-primary my-4'])}} 
                        {!! Form::close() !!}

                        {!!Form::open([
                            'action'=> ['AlbumsController@destroy', $post->id], 
                            'method' =>'POST'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit("Delete Album",['class'=>'btn btn-danger'])}} 
                        {!!Form::close()!!}
                  </div>
      
          </div>
        </div>
        </div>
                  
              </div>
          </div>
      </div>


        @endforeach 
    </div>
</div>
      @else
      <p>No Album Available</p>
      @endif
   


@endsection