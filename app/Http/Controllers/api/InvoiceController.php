<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\InvoiceRequest;
use App\Models\Invoice;
use PDF;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;

class InvoiceController extends Controller
{
    public function create(InvoiceRequest $request){
        $invoice = Invoice::create([
            "invoice_num" => $request->invoice_num,
            "due_date" => $request->due_date,
            "amount" => $request->amount,
            "bank_code" => $request->bank_code,
            'user_id' => auth('api')->user()->id
        ]);
         return Response::json(['status'=>true,'message'=> 'invoice created successfully'],200);
//        $pdf = PDF::loadView('users.invoices.index',compact('invoice'))->setOptions(['defaultFont' => 'sans-serif']);;
//        return $pdf->download('invoice.pdf');
    }
    public function paid(){
        $invoice_paid = Invoice::where("status_value" , '1')->where('user_id',auth('api')->user()->id)->get();
        if(isset($invoice_paid)&& $invoice_paid->count() > 0){
            return Response::json(['status'=>true,'message'=>$invoice_paid ],200);
        }else{
            return Response::json(['status'=>true,'message'=> []],200);
        }
    }
    public function due(){
        $invoice_due = Invoice::where("status_value" , '0')->where('user_id',auth('api')->user()->id)->get();
        if(isset($invoice_due)&& $invoice_due->count() > 0){
            return Response::json(['status'=>true,'message'=>$invoice_due ],200);
        }else{
            return Response::json(['status'=>true,'message'=> [] ],200);
        }
    }
    public function pdf(Request $request){
        $invoices = Invoice::where('user_id',auth('api')->user()->id)->where('id',$request->invoice_id)->first();
        $user = auth('api')->user();
        if($invoices->count() > 0 && isset($invoices)){
            $pdf = PDF::loadView('users.invoices.index',compact('invoices','user'))->setOptions(['defaultFont' => 'sans-serif','isRemoteEnabled' => true]);
	        return $pdf->download('invoices.pdf');
        }else{
            return Response::json(['status'=>false,'message'=> 'sorry ,no invoice yet'],404);
        }
    }

    public function details(Request $request){
        $invoice = Invoice::where("id" , $request->invoice_id)->get();
        if($invoice->count() > 0 ){
            return Response::json(['status'=>true,'message'=>$invoice ],200);
        }else{
            return Response::json(['status'=>true,'message'=> []],200);
        }
    }

}
