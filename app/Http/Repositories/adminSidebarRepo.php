<?php namespace stjo\Http\Repositories;

use stjo\Model\Umat;

class adminSidebarRepo {

    public function getUserStat()
    {
        /**-----------------------------------------
         * Just counting how many user  registered
         * ------------------------------------------
         *
         */
        $userTerdaftar = \stjo\Model\User::all()->count();


        return $userTerdaftar;

    }

    public function getSemingguLogin()
    {
        $userLogOneWeek = \stjo\Model\User::where('kunjungan_terakhir','>', \Carbon\Carbon::now()->subDays(7))->count();

        return $userLogOneWeek;
    }

    public function getUmatStat()
    {
        $jumlahUmat = \stjo\Model\Umat::all()->count();

        return $jumlahUmat;
    }

    public function getUmatLingkungan()
    {
        $lingkungan = \stjo\Model\Lingkungan::all();
        return $lingkungan;

        //foreach($lingkungan as $n){
        //    $nm_ligkungan[] = $n;
        //}
    }

    public function getJumlahKeluarga()
    {
        $umat = new Umat;
        $jumlahKeluarga = $umat::all()->groupBy('id_keluarga')->count();

        return $jumlahKeluarga;
    }
}
