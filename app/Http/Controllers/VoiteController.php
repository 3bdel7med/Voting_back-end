<?php

namespace App\Http\Controllers;

use App\Models\Voite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UpdateVoiteRequest;

class VoiteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $first_voite=Voite::get()->where('vote','1');
        $second_voite=Voite::get()->where('vote','2');
        $third_voite=Voite::get()->where('vote','3');
        $forth_voite=Voite::get()->where('vote','4');
        $first_voite=$first_voite->count();
        $second_voite= $second_voite->count();
        $third_voite=$third_voite->count();
        $forth_voite=$forth_voite->count();
        $voite=[[$first_voite,$second_voite,$third_voite,$forth_voite]];


        return response()->json($voite);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fileds=$request->validate([
            "first_name" => 'required || max:122 ||min:3',
            "last_name" => 'required || max:122 ||min:3',
            "vote" => 'required ',
            "phone" => 'required || max:11 ||min:3',
            "email" => 'required ||  max:122 ||min:3 ',
            "address" => 'required || max:122 ||min:3',
        ]);
        $voite=Voite::create($fileds);
        return ([$voite,'message' =>"Successfully voted process"]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Voite $voite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateVoiteRequest $request, Voite $voite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Voite $voite)
    {
        //
    }
}
