@extends('layouts.app')

@section('content')

   <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Post Update</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Post Update
            
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
            <form method="post" action="{{ url('update/post/'.$post->id) }}" enctype="multipart/form-data">
              @csrf
              <div class="modal-body pd-20">

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Title: <span class="tx-danger">*</span></label>
                  <input class="form-control" value="{{ $post->title }}" type="text" name="title"  >
                </div>
              </div><!-- col-4 -->


              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label"> Description<span class="tx-danger">*</span></label>
                   <textarea class="form-control" id="summernote" name="description">
                     <p >{!! $post->description !!}</p>
                   </textarea>
                </div>  
              </div>
          
                <div class="form-group">
                  <label for="exampleInputEmail1">Image</label>
                  <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"   name="image">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Old Image</label>
                 <img src="{{ URL::to($post->image) }}" style="height: 70px; width: 90px;">
                 <input type="hidden" name="old_logo" value="{{ $post->image }}">
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