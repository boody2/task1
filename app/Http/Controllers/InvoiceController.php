<?php

namespace App\Http\Controllers;

use App\Mail\action;
use App\Mail\action_mail;
use App\Models\Client;
use App\Models\History;
use App\Models\Invoice;
use App\Models\Invoice_Item;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Yajra\DataTables\DataTables;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $search_Client = $request->search_Client;
            $search_Paid = $request->search_Paid;
            $search_date = $request->search_date;
            $search_id = $request->search_id;
            Log::error('ss', [
                $request->search_Client,
                $request->search_Paid,
                $request->search_date,
                $request->search_id
            ]);
            $query = Invoice::where('status', '=', 1)->with('client');
            if ($search_id) {
                $query->where('id', 'LIKE', "%{$search_id}%");
            }
            if ($search_Client) {
                $query->whereHas('client', function ($q) use ($search_Client) {
                    $q->where('id', '=', $search_Client);
                });
            }
            if ($search_Paid) {
                $query->where('Paid', '=', $search_Paid);
            }
            if ($search_date) {
                $query->whereDate('invoice_date', '=', Carbon::createFromFormat('d/m/Y', $search_date));
            }
            $data = $query->latest()->get();
            return DataTables()::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $show = "<i class='material-icons opacity-10 m-2'>view_in_ar</i>";
                    $delete = "<i class='material-icons opacity-10 m-2'>delete</i>";
                    $edite = "<i class='material-icons opacity-10 m-2'>edit</i>";
                    $btn = '<a href="' . route('invoice.show', [$row->id]) . '" >';
                    $btn .= $show;
                    $btn .= '</a>';

                    $btn .= '<a  href="' . route('invoice.edit', [$row->id]) . '" >';
                    $btn .= $edite;
                    $btn .= '</a>';

                    return $btn;
                })
                ->addColumn('created_at', function ($row) {
                    $date = date("d-m-Y", strtotime($row->created_at));
                    return $date;
                })
                ->addColumn('date', function ($row) {
                    $date = date("d-m-Y", strtotime($row->invoice_date));
                    return $date;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $clients = Client::where('status', 1)->latest()->get();
        return view('home.invoice', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->type == "Admin") {
            $clients = Client::where('status', 1)->latest()->get();
            return view('home.add_Invoice', compact('clients'));
        } else {
            return redirect()->route('invoice.index')->with('error', 'You are not allowed to access this page');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
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
        return back()->with('success', 'Invoice created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        return  view('home.invoice_data', compact('invoice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        $clients = Client::where('status', 1)->latest()->get();
        return view('home.invoice_edit', compact('invoice', 'clients'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        // dd($request);

        $request->validate([
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
        return redirect()->route('invoice.index')->with('success', 'Invoice updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        if(Auth::user()->type=="Admin"){$invoice->update(['status' => 0]);
        History::create([
            'user_id' => Auth::user()->id,
            'invoice_id' => $invoice->id,
            'description' => "Delete invoice.",
        ]);
        Mail::to($invoice->client->email)->send(new action("Delete invoice.", $invoice->id,"Deleted", Carbon::now()->toDateTimeString()));
        return redirect()->route('invoice.index')->with('success', 'Invoice deleted successfully');}
        else{
            return redirect()->back()->with('error', 'You are not allowed to delete this invoice');
        }
    }
}
