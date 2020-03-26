<?php

namespace App\Http\Controllers;

use App\Models\Service as services;
use Illuminate\Http\Request;
use App\Like ;
use App\ServiceCategory;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services=services::orderBy('id','desc')->with('views')->take(6)->get();

        return view('welcome',compact('services'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function showall($category=null)
    {
        //

        $allServices=$category==null?services::orderBy('id','desc')->paginate(6):ServiceCategory::find($category)->services()->paginate(6);

        $categories=\App\ServiceCategory::all();
        return view('services',compact('allServices','categories'));
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
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(services $services)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function edit(services $services)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, services $services)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(services $services)
    {
        //
    }
    /**
     * View  the specified service from storage.
     *
     * @param  \App\Models\services  $services
     * @return \Illuminate\Http\Response
     */
    public function view(services $service)
    {
    //FIND THE USER WHO OWNS THE Service
    $services=$service->user->services()->with('views')->orderBy('created_at','desc')->take(3)->get();
   //add  when user views the service
   $this-> handleView('App\Models\Service',$service->id);

      return view('User.profile', compact('service','services'));
    }
    /**
     *create a new view  on a service when user visits for the first time.
     *
     * @param  \App\Models\services  $services
     * void function
     */

    public function handleView($type,$id) {
      //check if user has already viewed


      $exist=Like::whereLikeableType($type)->whereLikeableId($id)->whereUserId(\Auth::id())->first();
    if(is_null($exist)) {
//add the view to likeables table;
      $view= Like::create([
        'user_id'=>\Auth::id(),
        'likeable_id'=>$id,
        'likeable_type'=>$type
      ]);
    }
    }
}
