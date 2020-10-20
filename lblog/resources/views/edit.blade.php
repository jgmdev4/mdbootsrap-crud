@extends("layouts.main")
@section('content')

<div class="container">

@if($errors->any())
@foreach ($errors->all() as $error)
<div class="alert alert-danger" role="alert">
  {{ $error }}
</div>
@endforeach

@endif


<h1>Edit Page</h1>

<!-- Default form register -->
<form class="text-center border border-light p-5" action="{{ route('update', $student->id) }}" method="POST">

{{ csrf_field() }}

    <p class="h4 mb-4">Add Student</p>

    <div class="form-row mb-4">
        <div class="col">
            <!-- First name -->
            <input type="text" name="firstname" value="{{$student->first_name}}" id="defaultRegisterFormFirstName" class="form-control" placeholder="First name">
        </div>
        <div class="col">
            <!-- Last name -->
            <input type="text" name="lastname" value="{{$student->last_name}}" id="defaultRegisterFormLastName" class="form-control" placeholder="Last name">
        </div>
    </div>

    <!-- E-mail -->
    <input type="email" name="email" value="{{$student->email}}" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail">

   
    <!-- Phone number -->
    <input type="text" name="phone" value="{{$student->phone}}" id="defaultRegisterPhonePassword" class="form-control" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock">
    <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
        
    </small>
    <div class="form-row mb-4"> 
        <div class="col">                 
            <input class="date form-control" value="{{$student->date}}" name="date" type="text" placeholder="Choose Date"> 
        </div>
        <div class="col">
            <input class="timepicker form-control" value="{{$student->time}}" name="time" type="text" placeholder="Choose Time">         
        </div>
    </div>

    <div class="form-group">
                        
                        <select class="form-control" id="exampleFormControlSelect1" name="department" >
                            <option value="">{{$student->department}}</option>
                            <option value="colombo1">Colombo 1</option>
                            <option value="colombo2">Colombo 2</option>
                            <option value="colombo3">Colombo 3</option>
                        </select>

                    </div>

    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" type="submit">Update</button>

    
   

</form>
<!-- Default form register -->
</div>

<script type="text/javascript">
// DatePicker
$('.date').datepicker({  
       format: 'mm-dd-yyyy'
     });  

     
     $('.timepicker').datetimepicker({

        format: 'hh:mm A'


}); 
    </script>


@endsection