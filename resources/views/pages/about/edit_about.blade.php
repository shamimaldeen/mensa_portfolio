@extends('layouts.app')

@section('content')

   <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>About Update</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">About Update
            
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
            <form method="post" action="{{ url('update/about/'.$about->id) }}" enctype="multipart/form-data">
              @csrf
              <div class="modal-body pd-20">
              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label"> Description<span class="tx-danger">*</span></label>
                   <textarea class="form-control" id="summernote" name="description">
                     <p >{!! $about->description !!}</p>
                   </textarea>
                </div>  
              </div>
          
                <div class="form-group">
                  <label for="exampleInputEmail1">Image</label>
                  <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   name="image">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Old Image</label>
                 <img src="{{ URL::to($about->image) }}" style="height: 70px; width: 90px;">
                 <input type="hidden" name="old_logo" value="{{ $about->image }}">
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