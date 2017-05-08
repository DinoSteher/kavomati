<?php

namespace App\Http\Controllers\Kavomati;

use App\Models\Kavomati;
use App\Models\Lokacije;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class KavomatiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kavomati = Kavomati::orderBy('naziv')->get();
		
		return view('kavomati.index', ['kavomati' => $kavomati]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lokacije = Lokacije::orderBy('mjesto')->get();
		return view('kavomati.create', ['lokacije' => $lokacije]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $result = $this->validate($request, [
			'naziv' => 'required',
			'lokacija' => 'required'
		]);
		
		$input = $request->only('naziv', 'lokacija');
		$kavomat = new Kavomati();
		try{
			
			$kavomat->naziv = $input['naziv'];
			$kavomat->lokacija_id = $input['lokacija'];
			$kavomat->save();
			$msg = session()->flash('success', 'Uspješno ste dodali novi kavomat!');
			return redirect()->route('kavomati.index')->withFlashMessage($msg);
			
		}catch(\Exception $e){
			$msg = session()->flash('danger', $e->getMessage());
			return redirect()->route('kavomati.index')->withFlashMessage($msg);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kavomati  $kavomati
     * @return \Illuminate\Http\Response
     */
    public function show(Kavomati $kavomati)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kavomati  $kavomati
     * @return \Illuminate\Http\Response
     */
    public function edit(Kavomati $kavomati)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kavomati  $kavomati
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kavomati $kavomati)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kavomati  $kavomati
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kavomati $kavomati)
    {
        //
    }
}
