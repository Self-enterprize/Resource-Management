<?php

namespace App\Http\Controllers;

use App\Models\Suggestion;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class SuggestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $suggestions = Suggestion::where('sender_id', Auth::id())->orderBy('created_at', 'DESC')->get();
        return view('pages.suggestions.index', compact('suggestions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('pages.suggestions.create');
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
            Suggestion::create([
                'sender_id' => Auth::id(),
                'title' => $request->object,
                'message' => $request->message
            ]);
        }catch (\Exception $exception){
            session()->flash('error', 'La suggestion n\' a pas pu etre cree, une erreur interne est survenue');
        }

        session()->flash('success', 'La suggestion a ete cree avec succes');

        return redirect()->route('suggestions.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $suggestion_id
     * @return View
     */
    public function show(int $suggestion_id): View
    {
        $suggestion = Suggestion::findOrFail($suggestion_id);
        return view('pages.suggestions.show', compact('suggestion'));
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
     * @param Request $request
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
