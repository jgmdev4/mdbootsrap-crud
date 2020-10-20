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
<form class="text-center border border-light p-5" action="{{ route('updateauction', $auction->auction_id') }}" method="POST">

{{ csrf_field() }}

    <p class="h4 mb-4">Add Auction</p>

    <div class="form-row mb-4">
        <div class="col">
            <!-- First name -->
            <input type="text" value="{{$auction->name}}" name="name" id="defaultRegisterFormFirstName" class="form-control" placeholder="Auction name">
        </div>
     
   
   
 




 
   




    <!-- Sign up button -->
    <button class="btn btn-info my-4 btn-block" name="save" id="save" type="submit">Update Data</button>

    
   

</form>
<!-- Default form register -->
</div>


  

</body>

</html>


@endsection