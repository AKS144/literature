<?php

namespace App\Http\Controllers;

use App\Contractrequest;
use Illuminate\Http\Request;

class ContractrequestController extends Controller
{

    public function index()
    {
        
    }


    public function create()
    {
        
    }


    public function store(Request $request)
    {
        $this->validate($request,[           
            'client_name'     =>  'required|regex:/^[a-zA-ZÑñ\s]+$/|max:120',           
            'job_date'        =>  'required|date',
            'job_duration'    =>  'numeric|digits_between:1,10',
            'address'         =>  'required|max:255',    
            'email'           =>  'required|email|max:255',
            'cost'            =>  'numeric|max:255',  
            'requirements'    =>  'max:255', 
            'phone'           =>  'required|digits:10',
            'job_detail'      =>  'required|max:255',                     
        ]);

        $contreq                =    new Contractrequest();
        $contreq->client_name   =    $request->client_name;        
        $contreq->job_date      =    $request->job_date; 
        $contreq->job_duration  =    $request->job_duration;     
        $contreq->address       =    $request->address;
        $contreq->job_detail    =    $request->job_detail;
        $contreq->email         =    $request->email;
        $contreq->phone         =    $request->phone;
        $contreq->cost          =    $request->cost;
        $contreq->requirements  =    $request->requirements;
        $contreq->save();
    }


    public function show(Contractrequest $contractrequest)
    {
        
    }


    public function edit(Contractrequest $contractrequest)
    {
        
    }


    public function update(Request $request, $id)
    {

        // $this->validate($request,[           
        //     'client_name'     =>  'required|regex:/^[a-zA-ZÑñ\s]+$/|max:120',           
        //     'job_date'        =>  'required|date',
        //     'job_duration'    =>  'numeric|digits_between:1,10',
        //     'address'         =>  'required|max:255',    
        //     'email'           =>  'required|email|max:255',
        //     'cost'            =>  'numeric|max:255',  
        //     'requirements'    =>  'max:255', 
        //     'phone'           =>  'required|digits:10',
        //     'job_detail'      =>  'required|max:255',           
            
        // ]);

        // $contreq = Contractrequest::find($id);
        // $contreq->client_name   =    $request->client_name;        
        // $contreq->job_date      =    $request->job_date; 
        // $contreq->job_duration  =    $request->job_duration;     
        // $contreq->address       =    $request->address;
        // $contreq->job_detail    =    $request->job_detail;
        // $contreq->email         =    $request->email;
        // $contreq->phone         =    $request->phone;
        // $contreq->cost          =    $request->cost;
        // $contreq->requirements  =    $request->requirements;
        // $contreq->save();
    }


    public function destroy(Contractrequest $contractrequest)
    {
        
    }
}
