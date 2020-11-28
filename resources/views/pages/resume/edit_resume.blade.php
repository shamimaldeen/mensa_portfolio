@extends('layouts.app')

@section('content')

   <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Resume Update</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Resume Update
            
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

              <form method="post" action="{{ url('update/resume/'.$resume->id) }}">
              @csrf
      
              <div class="modal-body pd-20">
                 <div class="col-lg-4">
                   <div class="form-group">
                   <label for="exampleInputEmail1">Select </label>
                   <select name="type" class="form-control" required="">
                     <option selected="" disabled="">Select One</option> 

                       <option value="EDUCATION" @if($resume->type = "EDUCATION") selected="" @endif >EDUCATION</option> 
                       <option value="EXPERIENCE" @if($resume->type = "EXPERIENCE") selected="" @endif  >EXPERIENCE</option> 
                     </select>
                   
                  </div>
                 </div>

             <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Designation/Degree: <span class="tx-danger">*</span></label>
                  <input class="form-control" value="{{ $resume->title }}" type="text" name="title"  >
                </div>
              </div><!-- col-4 -->

             <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Institute/Company: <span class="tx-danger">*</span></label>
                  <input class="form-control" value="{{ $resume->institute }}" type="text" name="institute"  >
                </div>
              </div><!-- col-4 -->
            

              <div class="col-lg-12">
                <div class="form-group">
                  <label class="form-control-label"> Description<span class="tx-danger">*</span></label>
                   <textarea class="form-control"  id="summernote" name="description">
                      <p >{!! $resume->description !!}</p>
                   </textarea>
                </div>  
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