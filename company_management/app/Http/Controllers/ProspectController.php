<?php

namespace App\Http\Controllers;

use App\Models\Prospect;
use App\Models\School;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProspectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index(): View
    {
        $prospects = Prospect::where('agent_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        $schools = School::all();
        return view('pages.prospects.index', compact(['prospects', 'schools']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('pages.prospects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        request()->validate([
            'name'         => 'required|string|min:2',
            'surname'      => 'required|string|min:3',
            'phoneNumber'  => 'required|string|unique:prospects,phoneNumber|min:9|max:9',
            'email'        => 'required|email|nullable',
            'school_id'    => 'required|exists:schools,id|integer'
        ]);

        try {
            Prospect::create([
                'name' => $request->name,
                'surname' => $request->surname,
                'phoneNumber' => $request->phoneNumber,
                'email' => $request->email,
                'agent_id' => Auth::id(),
                'school_id' => $request->school_id
            ]);
        }catch (\Exception $exception){
            session()->flash('error', 'Le prospect n\' a pas pu etre cree, une erreur interne est survenue');
        }

        session()->flash('success', 'Le prospect a ete cree avec succes');

        return redirect()->route('prospects.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $Prospect_id
     * @return View
     */
    public function show(int $Prospect_id): View
    {
        $prospect= Prospect::findOrFail($Prospect_id);
        return view('pages.prospects.show', compact('prospect'));
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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
