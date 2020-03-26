<?php

namespace App\Http\Controllers;

use App\Service;
use Illuminate\Http\Request;
use App\service_orders;
Use Alert;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   $services=Service::paginate(15);
   return view('allservices',compact('services'));

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function message(Request $request)
    {
    $request->validate([

      'phone'=>'required|min:10',
      'location'=>'required|min:3',
      'description'=>'required|min:10',
    ]);

      $mess=service_orders::create([
    'service_id'=>request()->id,
    'phone'=>request()->phone,
    'location'=>request()->location,
    'description'=>request()->description,
    'user_id'=>\Auth::id(),
    "service_provider"=>Service::find(request()->id)->user->id

      ]);
// Alert::toast('Toast Message', 'success');
Alert::success('Sent', 'Your message has been sent');

return redirect()->back();


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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
    return view('service',compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
    }
}
