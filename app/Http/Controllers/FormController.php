<?php

namespace App\Http\Controllers;
use App\Http\Controllers\FormController;
use App\Models\Form;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index()
    {
        try {
            $forms = Form::orderBy('id', 'desc')->get();
            if ($forms) {
                return response()->json([
                    'success' => true,
                    'forms' => $forms
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
                'name' => ['required', 'string', 'max:20', 'min:6'],
                'types' => ['required', 'string', 'max:20', 'min:10'],
                'middle_name' => ['string', 'max:20', 'min:10'],
                'last_name' => ['string', 'max:20', 'min:10'],
                'email' => ['required', 'string', 'max:20', 'min:10'],
                'subject' => ['required', 'string', 'max:30', 'min:10'],
                'message' => ['required', 'string', 'max:30', 'min:10'],
                'number' => ['required', 'integer'],
                'telephone' => ['required', 'integer'],
                'checkbox' => ['required', 'string'],
                'select' => ['required', 'string'],
                'radio' => ['required', 'string'],
                'file' => ['required'],
            ]);
            if ($validation->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validation->errors()->all(),
                ]);
            } else {
                $result = Form::create([
                    'name' => $request->name,
                    'types' => $request->types,
                    'middle_name' => $request->middle_name,
                    'last_name' => $request->last_name,
                    'email' => $request->email,
                    'subject' => $request->subject,
                    'message' => $request->message,
                    'number' => $request->number,
                    'telephone' => $request->telephone,
                    'checkbox' => $request->checkbox,
                    'select' => $request->select,
                    'radio' => $request->radio,
                    'file' => $request->file,

                ]);
                if ($result) {
                    return response()->json([
                        'success' => true,
                        'message' => "Form Add Successfully"
                    ]);
                } else {
                    return response()->json([
                        'success' => true,
                        'messge' => "Some Problem"
                    ]);
                }
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'messge' => $e->getMessage(),
            ]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $forms = Form::findOrFail($id);
            $validation = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:20', 'min:6'],
                'types' => ['required', 'string', 'max:20', 'min:10'],
                'middle_name' => ['string', 'max:20', 'min:10'],
                'last_name' => ['string', 'max:20', 'min:10'],
                'email' => ['required', 'string', 'max:20', 'min:10'],
                'subject' => ['required', 'string', 'max:30', 'min:10'],
                'message' => ['required', 'string', 'max:30', 'min:10'],
                'number' => ['required', 'integer'],
                'telephone' => ['required', 'integer'],
                'checkbox' => ['required', 'string'],
                'select' => ['required', 'string'],
                'radio' => ['required', 'string'],
                'file' => ['required', 'string'],
            ]);
            if ($validation->fails()) {
                return response()->json([
                    'success' => false,
                    'message' => $validation->errors()->all()
                ]);
            } else {
                //$categorys->category_name = $request->category_name;
                $forms->name = $request->name;
                $forms->types = $request->types;
                $forms->middle_name = $request->middle_name;
                $forms->last_name = $request->last_name;
                $forms->email = $request->email;
                $forms->subject = $request->subject;
                $forms->message = $request->message;
                $forms->number = $request->number;
                $forms->telephone = $request->telephone;
                $forms->checkbox = $request->checkbox;
                $forms->select = $request->select;
                $forms->radio = $request->radio;
                $forms->file = $request->file;
                $result = $forms->save();
                if ($result) {
                    return response()->json([
                        'success' => true,
                        'message' => 'Form Update Successfully'
                    ]);
                } else {
                    return response()->json([
                        'success' => false,
                        'message' => 'Some Problem!'
                    ]);
                }
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    public function delete($id)
    {
        try {
            $result = Form::findOrFail($id)->delete();
            if ($result) {
                return response()->json([
                    'success' => true,
                    'message' => 'Form Delete Successfully'
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Some Problem '
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

}
