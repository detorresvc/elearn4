<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Payment as PaymentTable;

use App\TeachersSchedule;
use Flash;
class MyController extends Controller
{
   function getTransactionList(PaymentTable $paymentTable){
	   $transactions = $paymentTable->where('state','approved')->orderBy('updated_at','desc')->paginate(10);
	   
	   return view('my.transaction_list',compact('transactions'));
   }
   
   function getSchedules(){
	   
	   
	   
	   return view('my.schedules');
   }
   
   function postSchedules(Request $request,TeachersSchedule $teacherSchedule){
	   
	   $validate = \Validator::make($request->only('start_at','end_at'),
	   [
		'start_at' => 'required|date_format:Y/m/d G:i',
		'end_at' =>'required|date_format:Y/m/d G:i|after:start_at'
	   ]);
	   
	   if($validate->fails()){
		   
		   Flash::error($validate->messages()->first());
		   return redirect('my/schedules');
	   }
	   
	   $checkDate = $teacherSchedule
			->where('user_id',\Auth::user()->id)	
			->whereBetween('start_at',[$request->only('start_at'),$request->only('end_at')])
			->orWhereBetween('end_at',[$request->only('start_at'),$request->only('end_at')])->count();
			
			
		if($checkDate > 0){
			Flash::error('Date conflict from some of your saved schedule');
		   return redirect('my/schedules');
		}	
			
			
	   
	   $teacherSchedule->create([
		'user_id' => \Auth::user()->id,
		'start_at' => $request->get('start_at'),
		'end_at' => $request->get('end_at'),
	   ]);
	   
	   Flash::success('Schedule Successfully saved');
	   return redirect('my/schedules');
	   
   }
   
   function getScheduleList(Request $request){
	   $schedules = \Auth::user()->schedules()->whereBetween('start_at',[$request->get('start'),$request->get('end')])->get();
	   
	   $arr = [];
	   foreach($schedules as $schedule){
			$arr[] = [
				'title' => \Auth::user()->last_name." ".\Auth::user()->first_name,
				'start' => $schedule->start_at,
				'end' => $schedule->end_at,
				'color' => '#CCFF33'
			];
	   }
	   echo json_encode($arr);
	  exit();
   }
}
