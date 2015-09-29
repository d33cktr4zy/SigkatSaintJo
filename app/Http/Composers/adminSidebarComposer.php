<?php
namespace stjo\Http\Composers;

use Illuminate\Foundation\Providers\ComposerServiceProvider;
use Illuminate\View\View;
use \stjo\Http\Repositories\adminSidebarRepo;

class adminSidebarComposer extends ComposerServiceProvider{

    protected $repo;

    public function __construct(adminSidebarRepo $repo)
    {
        $this->repo = $repo;
    }

    public function compose(View $view)
    {
        $view->with('userStat', $this->repo->getUserStat());
        $view->with('lastWeek', $this->repo->getSemingguLogin());
        $view->with('umatLingkungan', $this->repo->getUmatLingkungan());
        $view->with('umatStat', $this->repo->getUmatStat());
        $view->with('jumlahKeluarga', $this->repo->getJumlahKeluarga());



        //dd('Composing');
    }
}
