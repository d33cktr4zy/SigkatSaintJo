<?php

namespace stjo\Http\Controllers;

use Illuminate\Http\Request;
use stjo\Http\Requests;
use stjo\Http\Controllers\Controller;
use stjo\Http\Requests\ForumKategoriRequest;
use stjo\Model\ForumKategori;

class ForumKategoriController extends Controller
{
    ////
    ///**
    // * @var ForumKategori
    // */
    //private $katforum;
    //
    //
    ///**
    // * @param ForumKategori $katforum
    // */
    //public function __construct(ForumKategori $katforum) {
    //
    //    $this->katforum = $katforum;
    //}
    //

    public function index(){
        return view('forum.front');
    }
    /**
     * @return \Illuminate\View\View
     */
    public function showManKat(){
        $kat = ForumKategori::simplePaginate(3);

        return view('form.manajemenKategori' , compact('kat'));
    }


    /**
     * @param ForumKategoriRequest $request
     */
    public function simpanKategori(ForumKategoriRequest $request){
        //dd(\Request::all());
        if($request->simpan=="simpan"){
            ForumKategori::create(['nm_kategori'=>$request->get('namaKategori'),'kat_desc' => $request->get('desc')]);

        }elseif($request->edit=="edit"){
            $kats = ForumKategori::where('id_kategori',$request->get('id'))->first();
            $kats->nm_kategori = $request->get('namaKategori');
            $kats->kat_desc = $request->get('desc');
            $kats->update();

        }


        return redirect(route('manKategoriForum'));

    }


    /**
     * @param $id
     *
     * @return \Illuminate\View\View
     */
    public function editKategori($id){
        $katEdit = ForumKategori::where('id_kategori', $id)->first();
        $kat = ForumKategori::simplepaginate(3);
        $edit=1;
        //dd($kat,$katEdit,$edit);
        return view('form.manajemenKategori', compact('katEdit','kat','edit'));
    }
}
