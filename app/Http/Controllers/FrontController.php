<?php

namespace Carnet\Http\Controllers;

use Illuminate\Http\Request;

use Carnet\Http\Requests;
use Carnet\Student;
use Carnet\Escolaridad;
use Carnet\Ano;
use Carnet\Seccion;
use Carnet\Register;

class FrontController extends Controller
{
    public function index()
    {
        $dias = [
            '01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05',
            '06' => '06', '07' => '07', '08' => '08', '09' => '09', '10' => '10',
            '11' => '11', '12' => '12', '13' => '13', '14' => '14', '15' => '15',
            '16' => '16', '17' => '17', '18' => '18', '19' => '19', '20' => '20',
            '21' => '21', '22' => '22', '23' => '23', '24' => '24', '25' => '25',
            '26' => '26', '27' => '27', '28' => '28', '29' => '29', '30' => '30',
            '31' => '31'
        ];
        $meses = [
            '01' => '01', '02' => '02', '03' => '03', '04' => '04', '05' => '05',
            '06' => '06', '07' => '07', '08' => '08', '09' => '09', '10' => '10',
            '11' => '11', '12' => '12'
        ];
    	return view('front.index', compact('dias', 'meses'));
    }

    public function test_carnet()
    {
        $register = Register::find(1);
        return view('front.pdf_carnet', ['register' => $register]);
        //$pdf = \PDF::loadView('front.pdf_carnet', ['register' => $register]);
        //return $pdf->download('carnet.pdf');
        //return $pdf->stream('carnet.pdf')
            //->header('Content-Type','application/pdf');
    }

    public function pdf_carnet(Request $request)
    {
        $register = Register::find($request->session()->get('carnet'));
        $request->session()->forget('carnet');

        //$pdf = \PDF::loadView('front.pdf_carnet', ['register' => $register]);
        //return $pdf->download('carnet.pdf');
        //return $pdf->stream('carnet.pdf')
            //->header('Content-Type','application/pdf');

        $view =  \View::make('front.pdf_carnet', (['register' => $register]))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view)->setPaper('letter');
        $pdf->loadHTML($view)->setPaper('a4')->setOrientation('landscape');
        return $pdf->stream('carnet.pdf');
            //->header('Content-Type','application/pdf');
    }

    public function postBuscarEstudiante(Request $request)
    {
        $fecha = $request->ano_nac . '-' . $request->mes . '-' . $request->dia;
        $estudiante = Student::where('ci', $request->cedula)
            ->where('gender', $request->genero)
            ->where('birthday', $fecha)
            ->first();

        if ($estudiante)
        {
            $escolaridad = Escolaridad::where('active', 1)->first();
            $ano = Ano::where('ano', $request->ano_curso)
                ->lists('id');
            $seccion = Seccion::where('seccion', $request->seccion)
                ->lists('id');

            $register = Register::where('escolaridad_id', $escolaridad->id)
                ->whereIn('ano_id', $ano)
                ->whereIn('seccion_id', $seccion)
                ->where('student_id', $estudiante->id)
                ->first();
            
            if($register)
            {
                $request->session()->put('carnet', $register->id);
                return response()->json([
                    'error' => false,
                    'register' => $register
                ]);
            }else
            {
                return response()->json([
                    'error' => true,
                    'message' => 'El estudiante no se encuentra inscrito'
                ]);
            }            
        }else
        {
            return response()->json([
                'error' => true,
                'message' => 'El estudiante no se encuentra registrado'
            ]);
        }    	
    }

    public function admin()
    {
        return view('front.admin');
    }
}
