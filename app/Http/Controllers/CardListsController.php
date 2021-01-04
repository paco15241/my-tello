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
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $cardlists = auth()->user()->card_lists()->with('cards')->where('name', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->orWhere('position', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $cardlists = auth()->user()->card_lists()->with('cards')->latest()->paginate($perPage);
        }

        return view('card-lists.index', compact('cardlists'));
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('card-lists.create');
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
        
        auth()->user()->card_lists()->create($requestData);

        return redirect('card-lists')->with('flash_message', 'CardList added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $cardlist = auth()->user()->card_lists()->findOrFail($id);

        return view('card-lists.show', compact('cardlist'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $cardlist = auth()->user()->card_lists()->findOrFail($id);

        return view('card-lists.edit', compact('cardlist'));
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
