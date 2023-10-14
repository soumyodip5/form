<?php

namespace App\Http\Controllers;
use App\Models\Optional;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class OptionController extends Controller
{

    public function index()
    {
        try {
            $optional = Optional::orderBy('id', 'desc')->get();
            if ($optional) {
                return response()->json([
                    'success' => true,
                    'optional' => $optional
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }


    public function optionstore(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'name_subject_id' => ['required', 'integer', 'max:20', 'min:1'],
                'level' => ['required', 'string', 'max:20', 'min:2'],
                'placeholder' => ['required', 'string', 'max:30', 'min:2'],
                'class' => ['required', 'string', 'max:30', 'min:2'],
                'length' => ['required', 'integer'],
            ]);
            if ($validation->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validation->errors()->all(),
                ]);
            } else {
                $result = Optional::create([
                    'name_subject_id' => $request->name_subject_id,
                    'level' => $request->level,
                    'placeholder' => $request->placeholder,
                    'class' => $request->class,
                    'length' => $request->length,
                ]);
                if ($result) {
                    return response()->json([
                        'success' => true,
                        'message' => "optional Add Successfully"
                    ]);
                }else {
                    return response()->json([
                        'success' => true,
                        'messge' => "Some Problem"
                    ]);
                }
            }
        }catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }
    
}
