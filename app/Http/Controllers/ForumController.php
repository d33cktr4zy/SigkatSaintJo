<?php

namespace stjo\Http\Controllers;

use Illuminate\Http\Request;
use stjo\Http\Requests;
use stjo\Http\Controllers\Controller;
use stjo\Model\ForumKategori;
use stjo\Model\ForumPost;
use stjo\Model\ForumTopik;

class ForumController extends Controller
{
        protected $Kat, $post, $topik;
    /**
     * @param \stjo\Model\ForumKategori $Kat
     * @param \stjo\Model\ForumPost     $post
     * @param \stjo\Model\ForumTopik    $topik
     */
    public function __construct(ForumKategori $Kat, ForumPost $post, ForumTopik $topik)
    {
        $this->Kat = $Kat;
        $this->post = $post;
        $this->topik = $topik;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //ambil data forum
        $Kat = $this->Kat;
        $post = $this->post;
        $topik = $this->topik;

        return view('forum.front',['kat'=>$Kat, 'post'=>$post, 'topik'=>$topik]);
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
        //
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
