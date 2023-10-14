<?php

namespace App\Http\Controllers;
use App\Models\Form_Submit;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class Form_SubmitController extends Controller
{
    public function index()
    {
        try {
            $form_submit = Form_Submit::orderBy('id', 'desc')->get();
            if ($form_submit) {
                return response()->json([
                    'success' => true,
                    'form_submit' => $form_submit
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function create(Request $request)
    {
        try{
            $validation = Validator::make($request->all(), [
                'name_subject_id'=> ['required', 'integer', 'max:30', 'min:1'],
                'f_name' => ['required', 'string', 'max:30', 'min:1'],
                'm_name' => ['required', 'string', 'max:30', 'min:1'],
                'l_name' => ['required', 'string', 'max:30', 'min:1'],
                'email' => ['required', 'string', 'max:30', 'min:1'],
                'subject' => ['required', 'string', 'max:30', 'min:1'],
            ]);

            if ($validation->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validation->errors()->all(),
                ]);
            } else {
                $result = Form_Submit::create([
                    'name_subject_id' => $request->name_subject_id,
                    'f_name' => $request->f_name,
                    'm_name' => $request->m_name,
                    'l_name' => $request->l_name,
                    'email' => $request->email,
                    'subject' => $request->subject,
                ]);
                if ($result) {
                    return response()->json([
                        'success' => true,
                        'message' => "Form details Add Successfully"
                    ]);
                }else {
                    return response()->json([
                        'success' => true,
                        'messge' => "Some Problem"
                    ]);
                }
            }
        }catch(Exception $e){
            return responce()->json([
                'success'=> false,
                'message'=> $e->getMessage()
            ]);
        }
    }
}
