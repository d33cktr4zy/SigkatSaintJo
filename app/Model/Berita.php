<?php

namespace stjo\Model;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    //
	protected $primaryKey = 'id_berita';
	protected $table = 'tbl_berita';
	public $timestamps = false;

	protected $fillable = [
		'waktu_berita',
		'id_pengirim',
		'jdl_berita',
		'isi_berita',
		'id_sakramen',
		'id_kategorial'
	];

	public function penulis() {
		return $this->hasOne('\stjo\Model\User', 'id', 'id_pengirim');
	}
}
