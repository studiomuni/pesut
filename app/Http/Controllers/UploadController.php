<?php 
namespace App\Http\Controllers;
use App\ModelUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class UploadController extends Controller {

	public function getAllData(){
        $data = ModelUpload::all();
        return response($data);
    }

	public function upload(Request $request){

		if(Input::hasFile('file')){

			$data = new ModelUpload();
			$file = Input::file('file');
			$fileName = $file->getClientOriginalName();
			$format = $file->getClientOriginalExtension();
			$path = "/uploads"."/".$fileName;

			if($format == 'jpeg' || $format == 'JPEG' || $format == 'JPG' || $format == 'jpg' || $format == 'png') {
				$data->name = $request->input('nama');
				$data->description = $request->input('description');
				$data->path = $path;
				$data->save();
				
				$file->move('uploads', $file->getClientOriginalName());
				return redirect('/galeri');
			} else {
				return response('Format Tidak Valid');
			}
	

		}

	}
}