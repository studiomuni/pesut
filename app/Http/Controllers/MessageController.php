<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ModelMassages;
class MessageController extends Controller
{
    public function form()
    {
        return view('contact.form');
    }
    public function send(Request $request)
    {
        // validate request
        $this->validate($request, [
            'name' => 'required|string|max:50',
            'email' => 'required|email|max:150',
            'message' => 'required|string|max:2000'
        ]);
        
        $data = new ModelMassages();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->massage = $request->message;
        $data->save();

        // print_r($data);
        

        return response()->json([
            'success' => true,
            'message' => 'Pesan berhasil dikirim.'
        ]);
    }
}