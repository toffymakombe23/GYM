@extends('layouts.app')
<link rel="stylesheet" type="text/css" href="{{ URL::to('js/jquery-ui/jquery-ui.min.css') }}">
{{-- <link href="public/js/jquery-ui/jquery-ui.min.css" rel="stylesheet"> --}}   
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">        
            <div class="panel panel-default">
                <div class="panel-heading">Add New Member</div>           

                <div class="panel-body">
                <form method="POST" action="{{ route('admin.members.store') }}">
                    <div class="row">
                        
                    <div class="form-group col-lg-6">
                      <label class="col-sm-3 control-label" style="height:40px;line-height:40px;">First Name:</label>
                      <div class="col-sm-9">
                      <input type="text" name="first_name" class="form-control">
                      </div>
                    </div>

                     <div class="form-group col-lg-6">
                      <label class="col-sm-3 control-label" style="height:40px;line-height:40px;">Address One:</label>
                      <div class="col-sm-9">
                      <input type="text" name="address_one" class="form-control">
                      </div>
                    </div> 

                                   
                    </div>

                    <div class="row">
                    <div class="form-group col-lg-6">
                      <label class="col-sm-3 control-label" style="height:40px;line-height:40px;">Surname:</label>
                      <div class="col-sm-9">
                      <input type="text" name="last_name" class="form-control">
                      </div>
                    </div> 
                    
                     <div class="form-group col-lg-6">
                      <label class="col-sm-3 control-label" style="height:40px;line-height:40px;">Address Two</label>
                      <div class="col-sm-9">
                      <input type="text" name="address_two" class="form-control">
                      </div>
                    </div>
                    </div>
                    <div class="row">
                    <div class="form-group col-lg-6">
                      <label class="col-sm-3 control-label" style="height:40px;line-height:40px;">D.O.B:</label>
                      <div class="col-sm-9">
                      <input type="text" name="date_of_birth" id="dateofbirth" class="form-control">
                      </div>
                    </div>

                    <div class="form-group col-lg-6">
                      <label class="col-sm-3 control-label" style="height:40px;line-height:40px;">Address Three:</label>
                      <div class="col-sm-9">
                      <input type="text" name="address_three" class="form-control">
                      </div>
                    </div> 

                                   
                    </div>

                    <div class="row">
                        
                    <div class="form-group col-lg-6">
                      <label class="col-sm-3 control-label" style="height:40px;line-height:40px;">Telephone:</label>
                      <div class="col-sm-9">
                      <input type="text" name="telephone" class="form-control">
                      </div>
                    </div>

                    <div class="form-group col-lg-6">
                      <label class="col-sm-3 control-label" style="height:40px;line-height:40px;">City:</label>
                      <div class="col-sm-9">
                      <input type="text" name="city" class="form-control">
                      </div>
                    </div>

                                    
                    </div>

                    <div class="row">
                        
                    <div class="form-group col-lg-6">
                      <label class="col-sm-3 control-label" style="height:40px;line-height:40px;">Email:</label>
                      <div class="col-sm-9">
                      <input type="text" name="email" class="form-control">
                      </div>
                    </div>                      
                    
                     <div class="form-group col-lg-6">
                      <label class="col-sm-3 control-label" style="height:40px;line-height:40px;">County:</label>
                      <div class="col-sm-9">
                      <input type="text" name="county" class="form-control">
                      </div>
                    </div>                 
                    </div>

                    <div class="row">
                     <div class="form-group col-lg-6">
                      <label class="col-sm-3 control-label" style="height:40px;line-height:40px;">Subscription:</label>
                      <div class="col-sm-9">
                      <select name="member_subscription_type" id="member_subscription_type" class="form-control">
                        @foreach($items as $item)
                          <option id="{{ $item->id }}" value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                      </select>
                      </div>
                    </div>
                      
                    <div class="form-group col-lg-6">
                      <label class="col-sm-3 control-label" style="height:40px;line-height:40px;">Country:</label>
                      <div class="col-sm-9">
                      <input type="text" name="country" class="form-control">
                      </div>
                    </div>

                                     
                    </div>

                    <div class="row">
                      <div class="form-group col-lg-6">
                      {{-- <label class="col-sm-3 control-label" style="height:40px;line-height:40px;">Postcode:</label> --}}
                      <div class="col-sm-9">
                      
                      </div>
                    </div> 
                    
                      <div class="form-group col-lg-6">
                      <label class="col-sm-3 control-label" style="height:40px;line-height:40px;">Postcode:</label>
                      <div class="col-sm-9">
                      <input type="text" name="postcode" class="form-control">
                      </div>
                    </div> 
                    
                        
                   

                    </div>
                    <input type="hidden" name="_token" value="{{csrf_token()}}">

                    <br /><br />
                    
                    <input type="submit" value="Submit" class="btn btn-primary btn-flat pull-right" />
                </form>

                </div>
            </div>
        </div>
    </div>
  </div>
@endsection
    <script type="text/javascript" src="{{ URL::to('js/jquery-ui/external/jquery/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/jquery-ui/jquery-ui.min.js') }}"></script>
    {{-- <script src="js/jquery-ui/external/jquery/jquery.js"></script>
    <script src="js/jquery-ui/jquery-ui.min.js"></script> --}}

<script type="text/javascript">
 
     (function() {
       $( "#dateofbirth" ).datepicker({
         format: 'dd/mm/yyyy',
         weekStart: 0,
         calendarWeeks: true,
         autoclose: true,
         todayHighlight: true,
         rtl: true,
         orientation: "auto"
        });
});
</script>


