<?php

namespace App\Http\Controllers;

use Dompdf\Dompdf;
use Illuminate\Http\Request;
use App\Models\Evenementlieu;
use App\Models\Evenementartiste;
use App\Models\Prixplaceevenement;


class CPDF extends Controller
{
    public function genAffiche(){
        // Récupérer le contenu de la vue
        $data0=Evenementartiste::query()->where('evenementid','=',request('eventid'))->with("evenement")->with("artiste")->get();
        $data1=Evenementlieu::query()->where('evenementid','=',request('eventid'))->with("evenement")->with("lieu")->get();
        $data2=Prixplaceevenement::where('evenementid','=',request('eventid'))->get();
        $html = view('PDFaffiche',['data0'=>$data0,'data1'=>$data1,'data2'=>$data2]);
        // return $html;
        // Configuration de DOMPDF
        $dompdf = new Dompdf();
        $dompdf->setPaper('A4', 'portrait');

        // Génération du document PDF
        $dompdf->loadHtml($html);
        $dompdf->render();
        $dompdf->stream(request('evenement').'PDF.pdf');
    }

}
