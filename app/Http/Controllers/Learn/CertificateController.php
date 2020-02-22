<?php

namespace App\Http\Controllers\Learn;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use PDF;

class CertificateController extends Controller
{
    /**
     * @var \App\User
     */
    protected $user;

    public function __construct () {
        $this->user = app(\App\User::class);
    }

    public function make ($user, $uid) {

        //return view('app::invoice.cert');
        /*$pdf = \App::make('dompdf.wrapper');

        //return view('app::invoice.certificate');

        $pdf = \PDF::loadView('app::invoice.certificate');
        
        $pdf->setPaper(array(0, 0, 612, 396), 'portrait')->setWarnings(false);

        return $pdf->stream();*/

        $pdf = \App::make('dompdf.wrapper');

		//$pdf->setWatermarkImage(public_path('img/logo.png'), 0.165, '2%', '100%');

        $view =  \View::make('app::invoice.tmp01')->render();
        

        /**
         * image size
         * 1125 x 800
         */
        $pdf->loadHTML($view)->setPaper('a4', 'landscape')->setWarnings(false);

        return $pdf->stream();

    }
}
