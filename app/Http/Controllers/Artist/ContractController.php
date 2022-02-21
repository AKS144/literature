<?php

namespace App\Http\Controllers\Artist;

use App\Profile;
use App\Contract;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;


class ContractController extends Controller
{

    public function index()
    {
        //
    }


    public function create()
    {
        
    }


    public function store(Request $request)
    {
        $this->validate($request,[           
            'client_name'     =>   'required|regex:/^[a-zA-ZÑñ\s]+$/|max:120',           
            'job_date'        =>   'required|date',
            'job_duration'    =>   'numeric|digits_between:1,10',
            'address'         =>   'required|max:255',    
            'email'           =>   'required|email|max:255',
            'cost'            =>   'numeric|max:255',  
            'requirements'    =>   'max:255', 
            'phone'           =>   'required|digits:10',
            'job_detail'      =>   'required|max:255', 
        ]);

        //$user = Auth::user()->id;

        //$profile = Profile::where('user_id','=',Auth::user()->id)->get();
        
        $contract = new Contract();     
        $contract->client_name   =    $request->client_name;        
        $contract->job_date      =    $request->job_date; 
        $contract->job_duration  =    $request->job_duration;     
        $contract->address       =    $request->address;
        $contract->job_detail    =    $request->job_detail;
        $contract->email         =    $request->email;
        $contract->phone         =    $request->phone;
        $contract->cost          =    $request->cost;
        $contract->requirements  =    $request->requirements;
        //$contract->artist_id     =    $profile->
        $contract->user_id       =    Auth::user()->id;
        $contract->artist_name   =    Auth::user()->name;
        $contract->email         =    Auth::user()->email;
        $contract->save();


        $data = [       
            'client_name'  =>   $request->client_name,
            'job_date'     =>   $request->job_date,
            'job_duration' =>   $request->job_duration,
            'address'      =>   $request->address,
            'email'        =>   $request->email,
            'job_detail'   =>   $request->job_detail,            
            'phone'        =>   $request->phone,
            'cost'         =>   $request->cost,
            'requirements' =>   $request->requirements,
            'user_id'      =>   Auth::user()->id,
            'artist_name'  =>   Auth::user()->name,               
        ];

       /* $pdf = PDF::loadView('emails.contractemail', $data);

        Mail::send('emails.contractemail', $data, function($message)use($data, $pdf) {
            $message->to($data["email"], $data["email"])
                    ->subject($data["title"])
                    ->attachData($pdf->output(), "text.pdf");
        });*/
    }


    public function show($id)
    {
        
    }


    public function edit($id)
    {
        
    }


    public function update(Request $request, $id)
    {
        $this->validate($request,[           
            'client_name'     =>  'required|regex:/^[a-zA-ZÑñ\s]+$/|max:120',           
            'job_date'        =>  'required|date',
            'job_duration'    =>  'numeric|digits_between:1,30',
            'address'         =>  'required|max:255',    
            'email'           =>  'required|email|max:255',
            'cost'            =>  'numeric|max:255',  
            'requirements'    =>  'max:255', 
            'phone'           =>  'required|digits:10',
            'job_detail'      =>  'required|max:255',
        ]);

        //$user = Auth::user()->id;

        //$profile = Profile::where('user_id','=',Auth::user()->id)->get();
        
        $contract = Contract::find($id);     
        $contract->client_name   =    $request->client_name;        
        $contract->job_date      =    $request->job_date; 
        $contract->job_duration  =    $request->job_duration;     
        $contract->address       =    $request->address;
        $contract->job_detail    =    $request->job_detail;
        $contract->email         =    $request->email;
        $contract->phone         =    $request->phone;
        $contract->cost          =    $request->cost;
        $contract->requirements  =    $request->requirements;
        //$contract->artist_id     =    $profile->
        //$contract->user_id       =    $request->$user;
        //$contract->artist_name   =    $profile->name;
        //$contract->email         =    $profile->email;
        $contract->save();
    }


    public function destroy($id)
    {
        //
    }
}
