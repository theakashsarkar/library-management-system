<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\publishers;
use App\Http\Requests\PublishersRequest;

class PublishersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Admin.pages.publishers.index', ['publishers' => publishers::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.pages.publishers.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PublishersRequest $request)
    {
        $publishers = new publishers();
        $publishers->publisher_name  = $request->publisher_name;
        $publishers->publisher_email = $request->publisher_email;
        $publishers->save();
        return redirect('/admin/publishers')->with('success','publishers successfully create');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('Admin.pages.publishers.index',['publishers' => publishers::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PublishersRequest $request, $id)
    {
        $publisher = publishers::find($id);
        $publisher->publisher_name  = $request->publisher_name;
        $publisher->publisher_email = $request->publisher_email;
        $publisher->save();
        return redirect('/admin/publishers')->with('success', 'publishers successfully create');
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
