<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class triangleController extends Controller
{

    public function process(Request $request)
    {
        $tipe = $request->tipe;
        $jumlah  = $request->jumlah;
        $validator = Validator::make($request->all(), [
            'jumlah' => 'required|numeric',
            ]);
        if ($validator->fails()) {
                $out = [
                "message" => $validator->messages()->all(),
                ];
                return response()->json($out, 422);
        }
        if($tipe==1){
            for($a=$jumlah;$a>0;$a--){
            for($b=$jumlah;$b>=$a;$b--){
                echo "*";
            }
            echo "<br>";
            }
        }
        if($tipe==2){
            for($a=1; $a<=$jumlah; $a++){
            for($c=$jumlah; $c>=$a; $c-=1){
                echo "*";
            }
            echo "<br>";
            }
        }
        if($tipe==3){
            for ($i=0; $i<$jumlah; $i++){      
                for ($j=$jumlah; $j>$i ; $j--) {
                echo " &nbsp ";
                }
                for ($k=0; $k>$i ; $k++) {
                echo  " * ";
                }
                for ($l=0; $l<=$i ; $l++) {
                echo  " * ";
            }
                echo "<br/>";
            }
        } else {
            return response('Type Not Found');
        }
           
    }
}
