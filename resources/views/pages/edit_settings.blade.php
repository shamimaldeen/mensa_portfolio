@extends('layouts.app')

@section('content')

   <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Settings Update</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Settings Update
          	
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
            <form method="post" action="{{ url('update/settings/'.$settings->id) }}" enctype="multipart/form-data">
              @csrf
              <div class="modal-body pd-20">
                   <div class="form-group">
                  <label for="exampleInputEmail1"> Phone</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $settings->phone }}" placeholder="name" name="phone">
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1"> Email</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $settings->email }}" placeholder="email" name="email">
                </div>


                 <div class="form-group">
                  <label for="exampleInputEmail1"> Address</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $settings->address }}" placeholder="Address" name="address">
                </div>

                 <div class="form-group">
                  <label for="exampleInputEmail1"> Web</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{ $settings->web }}" placeholder="Web" name="web">
                </div>


                
                <div class="form-group">
                  <label for="exampleInputEmail1">Banner</label>
                  <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   name="banner">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Old Banner</label>
                 <img src="{{ URL::to($settings->banner) }}" style="height: 70px; width: 90px;">
                 <input type="hidden" name="old_logo" value="{{ $settings->banner }}">
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