<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use DB;

class StudentController extends Controller
{
    public function index(){
        $students = Student::paginate(5);
        return view('welcome', compact('students'));
    }
    public function create()
    {
    //     $data = DB::table('auctions')
    //             ->join('students','students.auction_id','=', 'auctions.auction_id')
    //             ->select ('students.department','auctions.name')
    //             ->get();
        $data = DB::table('auctions')
                 ->orderBy('auction_id','asc')              
                 ->get();
        return view('create', compact('data'));
    }

    public function store(Request $request)
    {


    //     $highlight    = $request['higlights'];
		
	// 	$resop = [];
    //   $array_separateop = function($value, $key) use (&$resop){
    //       foreach($value AS $k=>$v) {
    //           $resop[$k][] = $v;
    //       }
    //   };
	//   array_walk($highlight, $array_separateop);
		   
    //   $name   = implode("|",$resop['name']);
	//   $qty   = implode("|",$resop['qty']);
    //   $price   = implode("|",$resop['price']);
      


    //   $arr_name_exp  = explode("|",$name);
	//   $arr_qty_exp  = explode("|",$qty);
    //   $arr_price_exp  = explode("|",$price);
      


    // foreach($arr_name_exp as $i =>$key) {

    //  $data_json[] = array('name'=> $arr_name_exp[$i],
	//  'qty'=> $arr_qty_exp[$i],
    // 'price'=> $arr_price_exp[$i],);
    // }
   // $studentxx=json_encode($data_json);

        $this->validate($request, [
        'firstname'=> 'required',
        'lastname'=> 'required',
        'phone'=> 'required',
        'email'=> 'required | email',
        'date'=> 'required',
        'time'=> 'required',
        'department'=> 'required',
        // 'name'=> 'required',
        // 'qty'=> 'required',
        // 'price'=> 'required'
        

        ]);
        
            
        $student = new Student;
        $student->first_name = $request->firstname;
        $student->last_name = $request->lastname;
        $student->phone = $request->phone;
        $student->email = $request->email;
        $student->date = $request->date;
        $student->time = $request->time;
        $student->department = $request->department;
        // $student->name = $request->name;
        // $student->qty = $request->qty;
        // $student->price = $request->price;


        $student->save();
        return redirect(route('home')) -> with('successMsg','Student Sucessfully Added');
   
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'firstname'=> 'required',
            'lastname'=> 'required',
            'phone'=> 'required',
            'email'=> 'required | email',
            'date'=> 'required',
            'time'=> 'required',
            'department'=> 'required'
    
            ]);
            $student = Student::find($id);
            $student->first_name = $request->firstname;
            $student->last_name = $request->lastname;
            $student->phone = $request->phone;
            $student->email = $request->email;
            $student->date = $request->date;
            $student->time = $request->time;
            $student->department = $request->department;
            $student->save();
            return redirect(route('home')) -> with('successMsg','Student Sucessfully Updated');
    }

    public function delete($id)
    {
        Student::find ($id)->delete();
        return redirect(route('home')) -> with('successMsg','Student Sucessfully Deleted');
    }








}
