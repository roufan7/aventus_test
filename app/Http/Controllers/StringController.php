<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StringController extends Controller
{
    public function checkString(Request $request)
    {
        $val = '';
        $output = collect([]);
        $master_string = str_split($request->master_string);
        $master = $master_string;
        $string1 = str_split($request->string_1);
        for ($i = 0; $i < count($string1); $i++) {
            for ($j = 0; $j < count($master_string); $j++) {
                if ($string1[$i] == $master_string[$j]) {
                    $val .= $string1[$i];
                    $master_string[$j] = null;
                    break;
                }
            }
        }
        if ($val == $request->string_1) {
            $output->push(true);
            $val = '';
            $master = $master_string;
        } else {
            $output->push(false);
            $val = '';
            $master_string = $master;
        }
// return response($master_string);

        $string2 = str_split($request->string_2);
        for ($i = 0; $i < count($string2); $i++) {
            for ($j = 0; $j < count($master_string); $j++) {
                if ($string2[$i] == $master_string[$j]) {
                    $val .= $string2[$i];
                    $master_string[$j] = null;
                    break;
                }
            }
        }
        if ($val == $request->string_2) {
            $output->push(true);
            $val = '';
            $master = $master_string;
        } else {
            $output->push(false);
            $val = '';
            $master_string = $master;
        }

        $string3 = str_split($request->string_3);
        for ($i = 0; $i < count($string3); $i++) {
            for ($j = 0; $j < count($master_string); $j++) {
                if ($string3[$i] == $master_string[$j]) {
                    $val .= $string3[$i];
                    $master_string[$j] = null;
                    break;
                }
            }
        }
        if ($val == $request->string_3) {
            $output->push(true);
            $val = '';
            $master = $master_string;
        } else {
            $output->push(false);
            $val = '';
            $master_string = $master;
        }

        $string4 = str_split($request->string_4);
        for ($i = 0; $i < count($string4); $i++) {
            for ($j = 0; $j < count($master_string); $j++) {
                if ($string4[$i] == $master_string[$j]) {
                    $val .= $string4[$i];
                    $master_string[$j] = null;
                    break;
                }
            }
        }
        if ($val == $request->string_4) {
            $output->push(true);
            $val = '';
            $master = $master_string;
        } else {
            $output->push(false);
            $val = '';
            $master_string = $master;
        }
        $response = [
            'data' => $output,
        ];
        return response()->json($response);
    }
}
