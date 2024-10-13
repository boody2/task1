<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ClientController extends Controller
{
    use GeneralTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::where("status",'=',1)->with(['invoices','invoices_Paid'])->latest()->get();
        return $this->returnData('clients',$clients);
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
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
         ]);
         if ($Validator->fails()) {
             return $this->returnError($Validator->errors(), $errNum = "404");
         }
        $client=Client::where('email','=',$request->email)->first();
        if($client){
            return $this->returnError('email already exist', $errNum = "404");
        }
        Client::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return $this->returnSuccessMessage('Client created successfully', $errNum = "200");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return   response()->json([
            'status' => true,
            'errNum' => "S000",
            'msg' => 'Success',
            'client' => $client,
            'invoices' => $client->invoices,
        ]);
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
    public function update(Request $request, Client $client)
    {
        $Validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string',
         ]);
         if ($Validator->fails()) {
             return $this->returnError($Validator->errors(), $errNum = "404");
         }
        $client->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);
        return $this->returnSuccessMessage(' Client updated successfully', $errNum = "S000");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
       $client->update([
            'status' => 0,
        ]);
        return $this->returnSuccessMessage('Client deleted successfully', $errNum = "S000");
    }
}
