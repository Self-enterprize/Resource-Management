<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class ComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $complaints = Complaint::where('sender_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        return view('pages.complaints.index', compact('complaints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('pages.complaints.create');
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
            'object'       => 'required|string|min:5',
            'message'      => 'required|string|min:10',
        ]);

        try {
            Complaint::create([
                'sender_id' => Auth::id(),
                'title' => $request->object,
                'message' => $request->message
            ]);
        }catch (\Exception $exception){
            session()->flash('error', 'La plainte n\' a pas pu etre cree, une erreur interne est survenue');
        }

        session()->flash('success', 'La plainte a ete cree avec succes');

        return redirect()->route('complaints.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $complaint_id
     * @return View
     */
    public function show(int $complaint_id): View
    {
        $complaint = Complaint::findOrFail($complaint_id);
        return view('pages.complaints.show', compact('complaint'));
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
