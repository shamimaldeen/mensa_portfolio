@extends('layouts.app')

@section('content')

<!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
      <div class="sl-pagebody">
        <div class="sl-page-title">
          <h5>About Table</h5>
        </div><!-- sl-page-title -->

        <div class="card pd-20 pd-sm-40">
          <h6 class="card-body-title">About List
          	<a href="{{ route('add.about') }}" class="btn btn-sm btn-warning" style="float: right;">Add New</a>
          </h6>
          <br>
          <div class="table-wrapper">
            <table id="datatable1" class="table display responsive nowrap">
              <thead>
                <tr>
                  <th class="wd-15p">ID</th>
                  <th class="wd-15p">Image</th>
                  <th class="wd-20p">Action</th>
                </tr>
              </thead>
                <tbody>
                @foreach($about as $row)
                <tr>
                  <td>{{ $row->id }}</td>
                  <td><img src="{{ URL::to($row->image) }}" height="70px;" width="80px;"></td>
                  <td>
                    <a href="{{ URL::to('edit/about/'.$row->id) }}" class="btn btn-sm btn-info">edit</a>
                  <a href="{{ URL::to('delete/about/'.$row->id) }}" class="btn btn-sm btn-danger" id="delete">delete</a>
                  </td>
                 
                </tr>
                @endforeach
              </tbody>
            
            </table>
          </div><!-- table-wrapper -->
        </div><!-- card -->
      </div><!-- sl-pagebody -->



@endsection