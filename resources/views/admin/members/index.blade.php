@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-12">
          <a href="{{ route('admin.members.create') }}" class="btn btn-primary btn-flat pull-right">Add New Member</a>
        <br /><br />

        <form action="{{ route('admin.members.index') }}" method="POST" class="form-inline">
            {{ csrf_field() }}                        
                    <div class="form-group">
                      <label class="col-sm-3 control-label" style="height:40px;line-height:40px;">From:</label>
                      <div class="col-sm-6">
                      <input type="text" name="date_from" id="datefrom" class="form-control" placeholder="Date From">
                      </div>
                    </div>

                     <div class="form-group">
                      <label class="col-sm-3 control-label" style="height:40px;line-height:40px;">To:</label>
                      <div class="col-sm-6">
                      <input type="text" name="date_to" id="dateto" class="form-control" placeholder="Date To">
                      </div>
                    </div>  

                    <div class="form-group">
                      <div class="col-sm-4 pull-right">
                       <input type="submit" value="Search" class="btn btn-primary btn-flat" /> 
                      </div>
                    </div> 

            </form>
            <br />
        
            <div class="panel panel-default">
                <div class="panel-heading">Members</div>
            

                <div class="panel-body">

                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>DOB</th>
                                <th>Telephone</th>
                                <th>Action</th>
                            </tr>
                        <tbody>
                            <tr>
                                @forelse($members as $member)
                                <td>{{$member->first_name}}</td>
                                <td>{{$member->last_name}}</td>
                                <td>{{$member->email}}</td>
                                <td>{{ date('d/m/Y', strtotime($member->date_of_birth)) }}</td>
                                <td>{{ $member->telephone }}</td>
                                <td><a href="{{ route('admin.members.edit', $member->id) }}" class="btn btn-sm btn-info btn-flat">Edit</a></td>
                            </tr>
                            @empty
                                <td colspan="6">No records found.</td>
                                @endforelse
                        </tbody>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
