<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agenceList = Agence::all();
        return view('pages.agence_list' , ["agences" => $agenceList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check() && Auth::user()->role == 0) {
            return view('pages.agence_form' , ['context' => 'create']);

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

            $agenceData = [
                'name' => $request->name ,
                'code' => $request->code ,
                'location' => $request->location ,
            ];
            Agence::create($agenceData);
            return redirect('agences/list');
        }else{
            return view('static.403');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function show($agence)
    {
        //dd('okay');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check() && Auth::user()->role == 0) {
            $agence = Agence::find($id);
            if (isset($agence) && $agence){
                return view('pages.agence_form' ,["agence" => $agence , 'context' => 'update' ]);
            }
        }else{
            return view('static.403');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->id ;
        if(isset($id) && $id ){
            $old = Agence::find($id);
            $old->name = $request->name;
            $old->code = $request->code;
            $old->location = $request->location;
            $old->save();
        }
        return redirect('agences/list');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agence  $agence
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $agence = Agence::find($id);
        $agence->delete();
        return response()->json([
            'id' => $id ,
            'success' => 'Record deleted successfully!'
        ]);
    }
}
