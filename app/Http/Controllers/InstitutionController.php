<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institution;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        return Institution::all();
        
        // SQL equivalent: SELECT * FROM institutions;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'name' => 'required',
            'region' => 'required',
            'country' => 'required'
        ]);
    
        return Institution::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return Institution::find($id);
    
        // SQL equivalent: SELECT * FROM institutions WHERE id = $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $institution = Institution::find($id);
        $institution->update($request->all());
        return $institution;
    
        // SQL equivalent:
        // UPDATE institutions
        // SET name = $request->name, region = $request->region, country = $request->country
        // WHERE id = $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        return Institution::destroy($id);
        
        // SQL equivalent:
        // DELETE FROM institutions 
        // WHERE id = $id;
    }
}
