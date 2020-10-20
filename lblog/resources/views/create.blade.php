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


<h1>Create Page</h1>

<!-- Default form register -->
<form class="text-center border border-light p-5" action="{{ route('store') }}" method="POST" id="signupForm">

{{ csrf_field() }}

    <p class="h4 mb-4">Add Student</p>

    <div class="form-row mb-4">
        <div class="col">
            <!-- First name -->
            <input type="text" name="firstname" id="defaultRegisterFormFirstName" class="form-control" placeholder="First name">
        </div>
        <div class="col">
            <!-- Last name -->
            <input type="text" name="lastname" id="defaultRegisterFormLastName" class="form-control" placeholder="Last name">
        </div>
    </div>

    <!-- E-mail -->
    <input type="email" name="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail">

   
    <!-- Phone number -->
    <input type="text" name="phone" id="defaultRegisterPhonePassword" class="form-control" placeholder="Phone number" aria-describedby="defaultRegisterFormPhoneHelpBlock">
    <small id="defaultRegisterFormPhoneHelpBlock" class="form-text text-muted mb-4">
        
    </small>


    <div class="form-row mb-4"> 
        <div class="col">                 
            <input class="date form-control" name="date" type="text" placeholder="Choose Date"> 
        </div>
        <div class="col">
            <input class="timepicker form-control" name="time" type="text" placeholder="Choose Time">         
        </div>
    </div>


    <div class="form-group">
                        
                        <select class="form-control" id="department" name="department" >
                       
                            <option>Select One</option>
                            
                            @foreach($data as $auction)
                            <option value="{{$auction->name}}">{{$auction->name}}</option>
                            @endforeach
                            <!-- <option value="colombo2">Colombo 2</option>
                            <option value="colombo3">Colombo 3</option> -->
                        </select>

                    </div>
   


                    <table class="table table-bordered" id="dynamicTable">  

<tr>

    <th>Name</th>

    <th>Qty</th>

    <th>Price</th>

    <th>Action</th>

</tr>

<tr>  

    <td><input type="text" name="higlights[0][name]" placeholder="Enter your Name" class="form-control" /></td>  

    <td><input type="text" name="higlights[0][qty]" placeholder="Enter your Qty" class="form-control" /></td>  

    <td><input type="text" name="higlights[0][price]" placeholder="Enter your Price" class="form-control" /></td>  

    <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  

</tr>  

</table> 



    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" name="save" id="save" type="submit">Add Data</button>

    
   

</form>
<!-- Default form register -->
</div>

<script type="text/javascript">
// DatePicker
$('.date').datepicker({  
       format: 'mm-dd-yyyy'
     });  

     
$('.timepicker').datetimepicker({
        //format: 'HH:mm:ss'
            format: 'hh:mm A'
}); 





</script>
   

<script type="text/javascript">

   

    var i = 0;

       

    $("#add").click(function(){

   

        ++i;

   

        $("#dynamicTable").append('<tr><td><input type="text" name="higlights['+i+'][name]" placeholder="Enter your Name" class="form-control" /></td><td><input type="text" name="higlights['+i+'][qty]" placeholder="Enter your Qty" class="form-control" /></td><td><input type="text" name="higlights['+i+'][price]" placeholder="Enter your Price" class="form-control" /></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');

    });

   

    $(document).on('click', '.remove-tr', function(){  

         $(this).parents('tr').remove();

    });  

   

</script>

  

</body>

</html>


@endsection