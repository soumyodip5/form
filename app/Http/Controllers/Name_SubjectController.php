<?php

namespace App\Http\Controllers;
use App\Models\Name_Subject;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class Name_SubjectController extends Controller
{
    public function index()
    {
        try {
            $name_subject = Name_Subject::orderBy('id', 'desc')->get();
            if ($name_subject) {
                return response()->json([
                    'success' => true,
                    'name_subject' => $name_subject
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function store(Request $request)
    {
        try {
            $validation = Validator::make($request->all(), [
                'name_of_subject' => ['required', 'string', 'max:30', 'min:1'],
            ]);

            if ($validation->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validation->errors()->all(),
                ]);
            } else {
                $result = Name_Subject::create([
                    'name_of_subject' => $request->name_of_subject,
                ]);
                if ($result) {
                    return response()->json([
                        'success' => true,
                        'message' => "Form Name Add Successfully"
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
