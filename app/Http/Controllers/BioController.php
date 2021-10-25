<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\uDetail;
use Illuminate\Support\Facades\Auth;

class BioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idd = Auth::user()->id;
        if (uDetail::where('user_id', '=', $idd)->exists()) {
            $details = uDetail::all();
            $details = uDetail::where('user_id', $idd)->first();
            return view('admin.editbio',compact('details'));
        }
        else{
            return view('admin.bio');
        }
        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (uDetail::where('user_id', '=', Auth::user()->id)->exists()) {
            return redirect()->back()->withErrors('Already Exists');
        }

        uDetail::create($request->all());
  
        return redirect()->route('dbio')->with('success','Post created successfully.');
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
        $data = $request->except('_token');

        uDetail::whereId($id)->update($data);
        return redirect()->to('qbio');
        
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
