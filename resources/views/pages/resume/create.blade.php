@extends('layouts.app')

@section('content')



    <div class="sl-mainpanel">
      
      <div class="sl-pagebody">
      	   <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Add Resume <a href="{{ route('all.resume')}} " class="btn btn-success btn-sm pull-right">Resume</a></h6>


          <form action="{{ route('store.resume') }}" method="post">
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
                   <label for="exampleInputEmail1">Select </label>
                   <select name="type" class="form-control" required="">
                     <option selected="" disabled="">Select One</option> 

                       <option value="EDUCATION" >EDUCATION</option> 
                       <option value="EXPERIENCE" >EXPERIENCE</option> 
                     </select>
                   
                  </div>
                 </div>

             <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Designation/Degree: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="title"  >
                </div>
              </div><!-- col-4 -->

             <div class="col-lg-4">
                <div class="form-group">
                  <label class="form-control-label">Institute/Company: <span class="tx-danger">*</span></label>
                  <input class="form-control" type="text" name="institute"  >
                </div>
              </div><!-- col-4 -->
            

              <div class="col-lg-12">
              	<div class="form-group">
                  <label class="form-control-label"> Description<span class="tx-danger">*</span></label>
                   <textarea class="form-control" id="summernote" name="description">
                   	
                   </textarea>
                </div>	
              </div>
            
            <div class="form-layout-footer">
              <button class="btn btn-info mg-r-5" type="submit">Submit </button>
            </div><!-- form-layout-footer -->
          </div><!-- form-layout -->
          </form>
        </div><!-- card -->
       
      </div><!-- sl-pagebody --> 
    </div><!-- sl-mainpanel -->






@endsection
