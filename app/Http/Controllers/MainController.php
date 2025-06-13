<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        echo 'Apresentar página inicial';
    }

    public function generateExercises(Request $request)
    {
        echo 'Gerar exercícios';
    }

    public function printExercises()
    {
        echo 'Imprimir exercícios no navegador';
    }

    public function exportExercise()
    {
        echo 'Exportar exercícios para um arquivo de texto ';
    }
}
