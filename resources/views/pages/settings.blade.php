@extends('layouts.app')

@section('content')

<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>Settings Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">Settings List
          	<a href="#" class="btn btn-sm btn-warning" style="float: right;" data-toggle="modal" data-target="#modaldemo3">Add New</a>
          </h6>
          <br>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Phone</th>
                  <th class="wd-15p">Email</th>
                  <th class="wd-15p">Address</th>
                  <th class="wd-15p">web</th>
                  <th class="wd-15p">Banner</th>
                 
                </tr>
              </thead>
                <tbody>
                @foreach($settings as $row)
                <tr>
                  <td>{{ $row->id }}</td>
                  <td>{{ $row->phone }}</td>
                  <td>{{ $row->email }}</td>
                  <td>{{ $row->address }}</td>
                  <td>{{ $row->web }}</td>
                  <td><img src="{{ URL::to($row->banner) }}" height="70px;" width="80px;"></td>
                  <td>
                  	<a href="{{ URL::to('edit/settings/'.$row->id) }}" class="btn btn-sm btn-info">edit</a>
                  	<a href="{{ URL::to('delete/settings/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">delete</a>
                  </td>
                 
                </tr>
                @endforeach
              </tbody>
            
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div><!-- sl-pagebody -->


<!--modal-->
        <!-- LARGE MODAL -->
        <div id="modaldemo3" class="modal fade">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content tx-size-sm">
              <div class="modal-header pd-x-20">
                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Settings Add</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              @if ($errors->any())
                  <div class="alert alert-danger">
                      <ul>
                          @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                          @endforeach
                      </ul>
                  </div>
              @endif
            <form method="post" action="{{ route('store.setting') }}" enctype="multipart/form-data">
              @csrf
              <div class="modal-body pd-20">
                <div class="form-group">
                  <label for="exampleInputEmail1"> Phone</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="name" name="phone">
                </div>
                 <div class="form-group">
                  <label for="exampleInputEmail1"> Email</label>
                  <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="email" name="email">
                </div>


                 <div class="form-group">
                  <label for="exampleInputEmail1"> Address</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Address" name="address">
                </div>

                 <div class="form-group">
                  <label for="exampleInputEmail1"> Web</label>
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Web" name="web">
                </div>

                
                 <div class="form-group">
                  <label for="exampleInputEmail1">Banner</label>
                  <input type="file" class="form-control"  aria-describedby="emailHelp" placeholder="Banner" name="banner">
                </div>
               
              </div><!-- modal-body -->

              <div class="modal-footer">
                <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
              </div>
            </form>
            </div>
          </div><!-- modal-dialog -->
        </div><!-- modal -->



@endsection