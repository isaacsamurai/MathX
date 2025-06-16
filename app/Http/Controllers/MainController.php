<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    public function home(): View
    {
        return view('home');
    }

    public function generateExercises(Request $request)
    {
        $request->validate([
        'check_sum'            => 'required_without_all:check_subtraction, check_multiplication, check_division',
        'check_subtraction'    => 'required_without_all:check_sum, check_multiplication, check_division',
        'check_multiplication' => 'required_without_all:check_sum, check_subtraction, check_division',
        'check_division'       => 'required_without_all:check_sum, check_multiplication, check_subtraction',
        'number_one'           => 'required|integer|min:0|max:999|lt:number_two',
        'number_two'           => 'required|integer|min:0|max:999',
        'number_exercises'     => 'required|integer|min:5|max:50',
        ]);

        $operations = [];
        $operations [] = $request->check_sum ? 'sum' : '';
        $operations [] = $request->check_subtraction ? 'subtraction' : '';
        $operations [] = $request->check_multiplication ? 'multiplication' : '';
        $operations [] = $request->check_division ? 'division' : '';

        $min = $request->number_one;
        $max = $request->number_two;

        $numberExercises = $request->number_exercises;

        $exercises = [];
        for($index = 1; $index <= $numberExercises; $index++){

            $operation =  $operations[array_rand($operations)];
            $number1   = rand($min, $max);
            $number2   = rand($min, $max);

            $exercise = '';
            $sollution  = '';

            switch($operation){
                case 'sum':
                    $exercises = "$number1 + $number2 = ";
                    $sollution  = "$number1 + $number2";
                    break;
                case 'subtraction':
                    $exercises = "$number1 - $number2 = ";
                    $sollution  = "$number1 - $number2";
                    break;
                case 'multiplication':
                    $exercises = "$number1 * $number2 = ";
                    $sollution  = "$number1 * $number2";
                    break;
                case 'division':
                    $exercises = "$number1 / $number2 = ";
                    $sollution  = "$number1 / $number2";
                    break;
            }

            $exercises = [
                'exercise_number' => $index,
                'exercise'        => $exercises,
                'sollution'       => "$exercises $sollution",
            ];
            dd($exercises);
        }
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
