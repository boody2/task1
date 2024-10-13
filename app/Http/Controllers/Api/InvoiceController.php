<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\action;
use App\Models\Client;
use App\Models\History;
use App\Models\Invoice;
use App\Models\Invoice_Item;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Invoices = Invoice::where('status', '=', 1)->with('client')->latest()->get();
        return   response()->json([
            'status' => true,
            'errNum' => "S000",
            'msg' => 'Success',
            'Invoices' => $Invoices,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $Validator = Validator::make($request->all(), [
            'Client' => 'required|numeric',
            'date' => 'required',
            'total_invoice' => 'required|numeric',
            'discount' => 'required|numeric',
            'tax' => 'required|numeric',
            'grand_total' => 'required|numeric',
            'Paid' => 'required|in:Paid,Unpaid',
            'description' => 'nullable|string',
            'name' => 'required|array|min:1',
            'name.*' => 'required|string',
            'price' => 'required|array|min:1',
            'price.*' => 'required|numeric',
            'quantity' => 'required|array|min:1',
            'quantity.*' => 'required|integer'
         ]);
         if ($Validator->fails()) {
             return $this->returnError($Validator->errors(), $errNum = "404");
         }
        $invoice = Invoice::create([
            'client_id' => $request->Client,
            'total' => $request->total_invoice,
            'discount' => $request->discount,
            'tax' => $request->tax,
            'grand_total' => $request->grand_total,
            'description' => $request->description,
            'invoice_date' => Carbon::createFromFormat('d/m/Y', $request->date),
            'Paid' => $request->Paid,

        ]);
        foreach ($request->name as $key => $value) {
            Invoice_Item::create([
                'invoice_id' => $invoice->id,
                'name' =>  $request->name[$key],
                'price' =>   $request->price[$key],
                'quantity' =>   $request->quantity[$key],
            ]);
        }
        Mail::to($invoice->client->email)->send(new action("Create invoice.", $invoice->id,"Created", Carbon::now()->toDateTimeString()));

        History::create([
            'user_id' => Auth::user()->id,
            'invoice_id' => $invoice->id,
            'description' => "Create new invoice.",
        ]);
        return $this->returnSuccessMessage('Invoice created successfully', $errNum = "200");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return   response()->json([
            'status' => true,
            'errNum' => "S000",
            'msg' => 'Success',
            'invoice' => $invoice,
            'history'=> $invoice->history,
            'client'=> $invoice->client,
        ]);

        return  view('home.invoice_data', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Invoice $invoice)
    {
        $Validator = Validator::make($request->all(), [
            'Client' => 'required|numeric',
            'date' => 'required',
            'total_invoice' => 'required|numeric',
            'discount' => 'required|numeric',
            'tax' => 'required|numeric',
            'grand_total' => 'required|numeric',
            'Paid' => 'required|in:Paid,Unpaid',
            'description' => 'nullable|string',
            'name' => 'required|array|min:1',
            'name.*' => 'required|string',
            'price' => 'required|array|min:1',
            'price.*' => 'required|numeric',
            'quantity' => 'required|array|min:1',
            'quantity.*' => 'required|integer'
         ]);
         if ($Validator->fails()) {
             return $this->returnError($Validator->errors(), $errNum = "404");
         }
        $invoice->update([
            'client_id' => $request->Client,
            'total' => $request->total_invoice,
            'discount' => $request->discount,
            'tax' => $request->tax,
            'grand_total' => $request->grand_total,
            'description' => $request->description,
            'invoice_date' => Carbon::createFromFormat('Y-m-d', $request->date),
            'Paid' => $request->Paid,

        ]);
        $invoice->items()->delete();
        foreach ($request->name as $key => $value) {
            Invoice_Item::create([
                'invoice_id' => $invoice->id,
                'name' =>  $request->name[$key],
                'price' =>   $request->price[$key],
                'quantity' =>   $request->quantity[$key],
            ]);
        }
        Mail::to($invoice->client->email)->send(new action("Update invoice.",$invoice->id, "Updated", Carbon::now()->toDateTimeString()));
        History::create([
            'user_id' => Auth::user()->id,
            'invoice_id' => $invoice->id,
            'description' => "Update invoice.",
        ]);
        return $this->returnSuccessMessage("Invoice updated successfully.", $errNum = "200");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->update(['status' => 0]);
        History::create([
            'user_id' => Auth::user()->id,
            'invoice_id' => $invoice->id,
            'description' => "Delete invoice.",
        ]);
        Mail::to($invoice->client->email)->send(new action("Delete invoice.", $invoice->id,"Deleted", Carbon::now()->toDateTimeString()));
        return $this->returnSuccessMessage("Invoice deleted successfully.", $errNum = "200");

    }
}
