@extends('layouts.app')

@section('content')

   <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Profile Update</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Profile Update
          	
          </h6>
          <br>
          <div class="table-wrapper">
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
            <form method="post" action="{{ url('update/profile/'.$profile->id) }}" enctype="multipart/form-data">
              @csrf
              <div class="modal-body pd-20">
                 <div class="form-group">
                  <label for="exampleInputEmail1"> Name</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $profile->name }}" placeholder="name" name="name">
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1"> Email</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"  value="{{ $profile->email }}" placeholder="email" name="email">
                </div>


                 <div class="form-group">
                  <label for="exampleInputEmail1"> designation</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $profile->designation }}" placeholder="designation" name="designation">
                </div>

                 <div class="form-group">
                  <label for="exampleInputEmail1"> Facebook</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $profile->facebook }}" placeholder="Facebook" name="facebook">
                </div>

                 <div class="form-group">
                  <label for="exampleInputEmail1"> Twitter	</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $profile->twitter }}" placeholder="Twitter" name="twitter">
                </div>

                 <div class="form-group">
                  <label for="exampleInputEmail1"> 	Behance</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $profile->behance }}" placeholder="Behance" name="behance">
                </div>

                 <div class="form-group">
                  <label for="exampleInputEmail1"> Globe</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $profile->globe }}" placeholder="Globe" name="globe">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1"> Linkedin</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $profile->linkedin }}" placeholder="Linkedin" name="linkedin">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Image</label>
                  <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   name="image">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Old Image</label>
                 <img src="{{ URL::to($profile->image) }}" style="height: 70px; width: 90px;">
                 <input type="hidden" name="old_logo" value="{{ $profile->image }}">
                </div>
              </div><!-- modal-body -->



              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Update</button>
              </div>
            </form>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div><!-- sl-pagebody -->

@endsection