<?php

namespace App\Http\Controllers\Lokacije;

use App\Models\Lokacije;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LokacijeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lokacije = Lokacije::orderBy('id')->get();
		
		return view('lokacije.index', ['lokacije' => $lokacije]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lokacije = Lokacije::orderBy('id')->get();
		return view('lokacije.create', ['lokacije' => $lokacije]);
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
			'ulica' => 'required',
			'kc_broj' => 'required',
			'mjesto' => 'required'
		]);
		
		$input = $request->only('ulica', 'kc_broj', 'mjesto');
		$lokacija = new Lokacije();
		try{
			
			$lokacija->ulica = $input['ulica'];
			$lokacija->kc_broj = $input['kc_broj'];
			$lokacija->mjesto = $input['mjesto'];
			$postoji = Lokacije::where('mjesto', '=', $lokacija->mjesto)->where('ulica', '=', $lokacija->ulica)->where('kc_broj', '=', $lokacija->kc_broj)->get();
			if(!$postoji){
			$lokacija->save();
			$msg = session()->flash('success', 'Uspjesno ste dodali novu lokaciju!');
			return redirect()->route('lokacije.index')->withFlashMessage($msg);
			}else{
				$msg = session()->flash('danger', "Lokacija vec postoji!");
				return redirect()->route('lokacije.index')->withFlashMessage($msg);
			}
			
		}catch(\Exception $e){
			$msg = session()->flash('danger', $e->getMessage());
			return redirect()->route('lokacije.index')->withFlashMessage($msg);
		}
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lokacije  $lokacije
     * @return \Illuminate\Http\Response
     */
    public function show(Lokacije $lokacije)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lokacije  $lokacije
     * @return \Illuminate\Http\Response
     */
    public function edit(Lokacije $lokacije)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lokacije  $lokacije
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lokacije $lokacije)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lokacije  $lokacije
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lokacije $lokacije)
    {
        //
    }
}
