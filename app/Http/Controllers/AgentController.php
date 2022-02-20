<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agence;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Auth\RegisterController;


class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agentList = User::where('role' , 1)->get();
        return view('pages.agent_list', ['agents' => $agentList]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check() && Auth::user()->role == 0) {
            $agenceList = Agence::getAgenceList();
            $titleList = Profile::getAgentTitleList();
            return view('pages.agent_form' , ['agenceList' => $agenceList ,  "titleList" => $titleList ] );

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

            $profileData= [
                'name' => $request->name,
                'family_name' => $request->family_name,
                'title' => $request->title,
                'cin' => $request->cin,
                'sexe' => $request->genre,
                'region' => $request->region,
                'agence_id' => $request->agence
            ];

            $profile = Profile::create($profileData);
            if($profile->id){
                $random_pass = User::randomPassword();
                $userData = [
                    'name' => $request->name.' '.$request->family_name,
                    'email' => $request->email,
                    'role' => User::USER_AGENT,
                    'password' => Hash::make($random_pass),
                    'profile_id' => $profile->id
                ];
                $user = User::create($userData);
            }


            dd($user->toArray);

            return view('pages.agent_form' , ['agenceList' => '' ,  "titleList" => '' ] );

        }else{
            return view('static.403');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
