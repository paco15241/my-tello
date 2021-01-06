<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\CardList;
use Illuminate\Http\Request;

class CardListsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $cardlists = auth()->user()->card_lists()->with('cards')->get()->makeHidden(['created_at', 'updated_at']);
        return $cardlists->toJson();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function move(Request $request, $id)
    {
        $cardlist = auth()->user()->card_lists()->findOrFail($id);
        $cardlist->insertAt((int)$request->input('position'));

        return $cardlist;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        $card_list = auth()->user()->card_lists()->create($requestData);

        return $card_list;
        // return redirect('card-lists')->with('flash_message', 'CardList added!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $cardlist = auth()->user()->card_lists()->findOrFail($id);
        $cardlist->update($requestData);

        return redirect('card-lists')->with('flash_message', 'CardList updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        auth()->user()->card_lists()->destroy($id);

        return redirect('card-lists')->with('flash_message', 'CardList deleted!');
    }
}
