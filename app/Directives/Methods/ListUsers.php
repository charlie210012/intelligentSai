<?php

namespace App\Directives\Methods;

use App\Http\Controllers\SaiController;
use Sidevtech\Directives\Implementations\DirectivesAnswers;
use Sidevtech\Sai\Sai;

class ListUsers implements DirectivesAnswers
{
    public function outPut($request)
    {
        return [
            'message' => 'Aqui esta la lista de usuarios',
            'link' => 'https://www.google.com'
        ];
    }

    private function getUser($name)
    {
       
    }

    // private function extractName($string)
    // {
    //     preg_match('/para\s+(\w+\s+\w+)/i', $string, $matches);

    //     return !empty($matches[1]) ? $matches[1] : "Desconocido";
    // }

    // private function extractDate($string)
    // {
    //      // Extraer la fecha
    //      if (preg_match('/del mes\s+(\d{2}\/\d{4})/i', $string, $matches)) {
    //         $fecha = $matches[1];
    //     }else if(preg_match('/del\s+(\d{2}\/\d{4})/i', $string, $matches)){
    //         $fecha = $matches[1];
    //     } else {
    //         $fecha = false;
    //     }

    //     if(!$fecha){
            
    //         preg_match('/mes de (\w+)/i', $string, $matches);
    //         $mes = $matches[1];
          
    //         $year = date('Y');
    //         if(preg_match('/^[a-zA-Z]+$/', $mes)){ // Si el mes está escrito en letras
    //             $month = $this->monthToNumber($mes);
    //             if($month !== false){
    //                 $fecha = $year . '-' . $month;
    //             } else {
    //                 $fecha = false;
    //             }
    //         } else { // Si el mes está escrito en números
    //             $fecha = $year . '-' . str_pad($mes, 2, '0', STR_PAD_LEFT);
    //         }
    //     }

    //     return $fecha;
    // }

    // private function monthToNumber($month)
    // {
    //     $months = array('enero'=>'01', 'febrero'=>'02', 'marzo'=>'03', 'abril'=>'04', 'mayo'=>'05', 'junio'=>'06', 'julio'=>'07', 'agosto'=>'08', 'septiembre'=>'09', 'octubre'=>'10', 'noviembre'=>'11', 'diciembre'=>'12');

    //     return isset($months[strtolower($month)]) ? $months[strtolower($month)] : false;
    // }
}
