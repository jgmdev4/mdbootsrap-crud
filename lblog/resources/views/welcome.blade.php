@extends("layouts.main")
@section('content')

<div class="container">
<h1>Home Page</h1>

@if (session('successMsg'))

<div class="alert alert-success" role="alert">
 {{ session('successMsg') }}
</div>

@endif


<table id="dtBasicExample" class="table" width="100%">
  <thead>
    <tr>
    <th class="th-sm">#</th>
      <th class="th-sm">First Name</th>
      <th class="th-sm">Last Name</th>
      <th class="th-sm">E-Mail</th>
      <th class="th-sm">Phone</th>   
      <th class="th-sm">Date</th>  
      <th class="th-sm">Time</th>  
      <th class="th-sm">Department</th> 
      <th class="th-sm">Action</th>    
    </tr>
  </thead>
  <tbody>
@foreach($students as $student)

    <tr>
      <td>{{$student->id}}</td>
      <td>{{$student->first_name}}</td>
      <td>{{$student->last_name}}</td>
      <td>{{$student->email}}</td>
      <td>{{$student->phone}}</td>  
      <td>{{$student->date}}</td>      
      <td>{{$student->time}}</td> 
      <td>{{$student->department}}</td>  
      <td>
      <a class="btn btn-raised btn-primary btn-sm" href="{{route('edit', $student->id )}}"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>

       || 

<form method="POST" id="delete-form-{{$student->id}}" action="{{route('delete', $student->id )}}" 
style="display:none;">
{{csrf_field()}}
{{method_field('delete')}}
</form>

<button onclick="if(confirm ('Are You Sure To Delete this Data ?')){
  event.preventDefault();
  document.getElementById('delete-form-{{$student->id}}').submit();

}else{
  event.preventDefault();
}"

       class="btn btn-raised btn-danger btn-sm" href=""><i class="fa fa-trash" aria-hidden="true"></i> Delete</td>
    </button>
    </tr>
    
@endforeach    
  </tbody>
  
</table>

{{$students->links() }}


</div>








@endsection


<script>
$(document).ready(function () {
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});


</script>