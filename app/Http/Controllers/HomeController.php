<?php

namespace App\Http\Controllers;

use App\Models\Agence;
use App\Models\Contact;
use App\Models\Service;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $agenceCount = Agence::select('id')->get()->count();
        $serviceCount = Service::select('id')->get()->count();
        $contactCount = Contact::select('id', 'is_readed')->where('is_readed' , 0)->get()->count();
        $contact = Contact::all();
        return view('dashboard' ,[
            'nb_agence' => $agenceCount ,
            'nb_service' => $serviceCount ,
            'nb_contact' => $contactCount ,
            'contacts' => $contact
        ]);
    }

    public function showContact($id)
    {
        $contact = Contact::find($id);
        $contact->is_readed = 1 ;
        $contact->save();
        return view('pages.contact_detail' , ['context' => 'preview' , 'contact' => $contact  ] );
    }
}
