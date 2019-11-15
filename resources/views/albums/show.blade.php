@extends ('layouts.app3')

@section('content')
<div class="container" style="max-width:100% !important;">
        <br>
<div class="row" style=" justify-content: center !important;">
        <h1>{{$album->name}} Collections</h1>
</div>
<br>
  
<div class="row" style=" justify-content: center !important;">
  
        <button type="button" class="btn btn-icon btn-3 btn-primary" data-toggle="modal" data-target="#modal-pho">
            <span class="btn-inner--icon"><i class="ni ni-image"></i></span>
            <span class="btn-inner--text">New Photo</span>
        </button>

        <div class="modal fade" id="modal-pho" tabindex="-1" role="dialog" aria-labelledby="modal-pho" aria-hidden="true">
            <div class="modal-dialog modal- modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
    <div class="modal-body p-0">
                      
        <div class="card bg-secondary shadow border-0">
            <div class="card-body px-lg-5 py-lg-5">
                <div class="text-center text-muted mb-4">
                    <small>Add new photo</small>
                </div>
                {!! Form::open([
                  'action' => 'PhotosController@store',
                  'method' => 'POST', 
                  'enctype'=>'multipart/form-data'])!!}
                    <div class="form-group mb-3">
                        <div class="input-group input-group-alternative">
                            {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
                        </div>
                    </div>
                    {{Form::hidden('album_id', $album->id)}}
                    <div class="custom-control custom-control-alternative custom-checkbox">
                          {{Form::file('photo')}}  
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
  
</div><br><br>

   
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
                    <img class="card-img-top" src="/storage/photos/{{$post->album_id}}/{{$post->photo}}" alt="{{$post->title}}">
                    <div class="card-body" style="padding:0.5rem !important;">
                            <div class="text-center">
                                    <h5 class="card-title">{{$post->title}}</h5>
                        {!!Form::open([
                            'action'=> ['PhotosController@destroy', $post->id], 
                            'method' =>'POST'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit("Delete Photo",['class'=>'btn btn-danger btn-sm'])}} 
                        {!!Form::close()!!}
                      </div>   </div>
                </div>
          
        
            @else
            <div class="medium-4 columns">
                    <div class="card" style="width: 18rem;">
                        <img class="card-img-top" src="/storage/photos/{{$post->album_id}}/{{$post->photo}}" alt="{{$post->title}}">
                        <div class="card-body" style="padding:0.5rem !important;">
                                <div class="text-center">
                                        <h5 class="card-title">{{$post->title}}</h5>
                            {!!Form::open([
                                'action'=> ['PhotosController@destroy', $post->id], 
                                'method' =>'POST'])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit("Delete Photo",['class'=>'btn btn-danger btn-sm'])}} 
                            {!!Form::close()!!}
                          </div>   </div>
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
              <p>No Image Available</p>
              @endif
@endsection