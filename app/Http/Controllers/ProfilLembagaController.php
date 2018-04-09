<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfilLembagaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = 1;
        $api_request = json_decode(file_get_contents(env('API_URL') . '/lembaga/' . $id)) ;
        $profil = $api_request->data->profil;

        return view('pages.profil-lembaga.index', compact('profil'));
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
        //
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
    public function edit()
    {
        $api_request = json_decode(file_get_contents(env('API_URL') . '/lembaga/1/edit'));
        $profil = $api_request->data->profil;
        $category = $api_request->data->category;
        $sub_category = $api_request->data->sub_category;
        return view('pages.profil-lembaga.edit', compact('profil','category','sub_category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = [
            '_method' => "PATCH",
            'tutoring_agency' => $request->tutoring_agency,
            'category_id' => $request->category_id,
            'sub_category_id' => $request->sub_category_id,
            'address' => $request->address,
            'description' => $request->descriptions,
            'tags' => explode(",", $request->tags),
        ];

        return $data;
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
