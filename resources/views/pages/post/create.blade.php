@extends('layouts.app')

@section('content')



    <div class="sl-mainpanel">
      
      <div class="sl-pagebody">
      	   <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Add Post <a href="{{ route('all.post')}} " class="btn btn-success btn-sm pull-right">Post</a></h6>
        
          <form action="{{ route('store.post') }}" method="post" enctype="multipart/form-data">
          	@csrf

                  @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
          
          <div class="form-layout">
            <div class="row mg-b-25">

                   <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Title: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="title"  >
                </div>
              </div><!-- col-4 -->
            

              <div class="col-lg-12">
              	<div class="form-group">
                  <label class="form-control-label"> Description<span class="tx-danger">*</span></label>
                   <textarea class="form-control" id="summernote" name="description">
                   	
                   </textarea>
                </div>	
              </div>
              <br>

              <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Image: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="file" name="image"  >
                </div>
              </div><!-- col-4 -->
            </div><!-- row -->
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Submit </button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div><!-- card -->
       
      </div><!-- sl-pagebody --> 
    </div><!-- sl-mainpanel -->






@endsection
