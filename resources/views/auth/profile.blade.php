@extends('layouts.app3')

@section('content')
    <!-- Page content -->
    <div class="container-fluid mt-3">
      <div class="row">
          <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
              <div class="card card-profile shadow">
                <div class="card-header text-center">
                    <h3>
                      Collections
                      </h3>
                </div>
                <div class="card-body pt-0 pt-md-4">
                  <div class="row">
                    <div class="col">
                      <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                        <div>
                        <span class="heading">{{$albums}}</span>
                          <span class="description">Albums</span>
                        </div>
                        <div>
                        <span class="heading">{{$photos}}</span>
                          <span class="description">Photos</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card bg-secondary shadow">
            <div class="card-header bg-white border-0">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">My account</h3>
                </div>
                {!! Form::open([
                  'action' => ['ProfileController@update', $users->id],
                  'method' => 'POST', 
                  'enctype'=>'multipart/form-data'])!!}
                <div class="col-4 text-right">
                    {{Form::submit("Save",['class'=>'btn btn-sm btn-primary', 'name'=>'upload'])}}
                </div>
              </div>
            </div>
            <div class="card-body">
                
                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-username">Name</label>
                        {{Form::text('name', $users->name, ['class' => 'form-control', 'placeholder' => $users->name])}}
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="card-profile-image">
                          <label>
                            @if($users->profile_image == NULL)
                              <img src="/storage/profile/no-profile.jpg" class="rounded-circle">
                              @else
                              <img src="/storage/profile/{{$users->profile_image}}" class="rounded-circle">
                            @endif
                           
                          {{Form::file('photo', ['style' => 'display:none'])}}
                          </label>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-first-name">Email</label>
                        {{Form::text('email', $users->email, ['class' => 'form-control', 'placeholder' => $users->email])}}
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4" />
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Change Password</h6>
                <div class="pl-lg-4">
                  <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <label class="form-control-label" for="input-first-name">Old Password</label>
                          {{Form::password('password', ['class' => 'form-control', 'placeholder' => 'Old Password'])}}
                        </div>
                      </div>
                      <div class="col-lg-6">
                          <div class="form-group">
                            <label class="form-control-label" for="input-first-name">New Password</label>
                            {{Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'New Password'])}}
                          </div>
                        </div>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
          </div>
        </div>
      </div></div>
@endsection