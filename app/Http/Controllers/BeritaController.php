<?php

namespace stjo\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use stjo\Http\Requests;
use stjo\Http\Controllers\Controller;
use stjo\Model\Berita;

class BeritaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        setLocale(LC_TIME, 'id');
        //menampilkan List Berita dikelompokkan oleh tanggal berita
        //$beritas =  \stjo\Model\Berita::orderBy('waktu_berita','desc')->groupBy('waktu_berita')->simplePaginate(5);
        $data   = Berita::all()->sortByDesc('waktu_berita')->groupBy(
        function ($date)
        {
            return Carbon::parse($date->waktu_berita)->format('Y-m-d');
        }, 'desc')->toArray();
        //dd(\Input::all);
        $page=\Input::get('page',1);
        $perPage =5;
        $offset = ($page * $perPage)-$perPage;
        $dataSlice = array_slice($data,$offset,$perPage,$page);

        $beritas = new \Illuminate\Pagination\LengthAwarePaginator($dataSlice,count($data),$perPage,$page);

        $beritas->setPath(action('BeritaController@index'));


        return view('listBerita', compact('beritas'));
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
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        setLocale(LC_TIME, 'ID');
        $berita =new \stjo\Model\Berita;
        $news = $berita::find($id);
        //tampilkan satu berita

        return view('dataBerita', ['berita' => $news]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
