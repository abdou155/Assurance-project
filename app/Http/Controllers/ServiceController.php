<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::with('categorie')->get();
        return view('pages.service_list', ['services' => $service]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check() && Auth::user()->role == 0) {
            $categoriesList = Categorie::select('id' , 'title')->pluck('title' , 'id');
            return view('pages.service_form' , ['context' => 'create' , 'categories' => $categoriesList  ] );

        }else{
            return view('static.403');
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
        if (Auth::check() && Auth::user()->role == 0) {

            $service = new Service();
            $service->title = $request->title;
            $service->description = $request->description;
            $service->price = $request->price;
            $service->categorie_id = $request->categorie_id;
            $service->save();

            return redirect('services/list');

        }else{
            return view('static.403');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        return view('pages.service_detail' , ['context' => 'preview' , 'service' => $service  ] );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
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
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service = Service::find($id);
        $service->delete();
        return response()->json([
            'id' => $id ,
            'success' => 'Record deleted successfully!'
        ]);
    }
}
