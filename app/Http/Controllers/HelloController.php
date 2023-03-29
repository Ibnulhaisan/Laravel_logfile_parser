<?php

namespace App\Http\Controllers;


use App\Models\Option;
use App\Models\Order;
use App\Models\Perfect;
use App\Models\Question;
use App\Models\SampleModel;
use App\Models\TestModel;
use GuzzleHttp\Promise\Create;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class HelloController extends Controller
{


    public function submit(Request $request)
    {
         //dd($request->all());



       $request->validate([
        'question.*' => 'required',
        'mark.*' => 'required',
        'correct.*' => 'required',
        'option.*.*' => 'required',

    ]

       );
//


//       dd($request->all());


        for ($i=1;$i<=3;$i++){
            $question = new Question();
            $question->question_text = $request->input('question.'.$i);
            $question->question_mark = $request->input('mark.'.$i);
            $question->correct_option = $request->input('correct.'.$i);

            $question->save();
            for ($o=1;$o<5;$o++){
                $option = new Option();
                $option->question_id = $question->id;
                $option->option_text = $request->input('option.'.$i.'.'.$o);
                $option->option_number = $request->input('option.'.$i.'.'.$o);
                $option->save();
            }

        }

       // dd($request->all());


//


    }

}

