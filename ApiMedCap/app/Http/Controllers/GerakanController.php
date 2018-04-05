<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gerakan;
use App\FrameGerakan;

class GerakanController extends Controller
{

	/*Register function*/
	
	public function create_gerakan(Request $request)
	{
		$nama_gerakan = $request->input('nama_gerakan');
		$fisioterapis_id = $request->input('id');
		
		$create = Gerakan::create([
			'nama_gerakan' => $nama_gerakan,
			'fisioterapis_id' => $fisioterapis_id,
		]);
		
		if($create)
		{
			$res['success'] = true;
			$res['status'] = 'Gerakan Berhasil Disimpan';
			$res['message'] = $create;
			
			return response($res);
		}
		else
		{
			$res['success'] = false;
			$res['status'] = 'Gerakan Gagal Disimpan';
			
			return response($res);
		}
	}
	
	/* Get User Information by id */
	public function set_frame_gerakan(Request $request)
	{
		$parent = $request->input('parent');
		$frame_data = $request->input('frame_data');
		
		$set_frame = FrameGerakan::create([
			'parent' => $parent,
			'frame_data' => $frame_data,
		]);
		
		if($set_frame)
		{
			$res['success'] = true;
			$res['status'] = 'Frame Gerakan Berhasil Disimpan';
			$res['message']= $set_frame;
			
			return response($res);
		}
		else
		{
			$res['success'] = false;
			$res['status'] = 'Frame Gerakan Gagal Disimpan';
			
			return response($res);
		}
	}
	
	/* Update data user by id */
	public function get_gerakan(Request $request, $id_gerakan)
	{
		$get_gerakan = Gerakan::where('id', $id_gerakan)->first();
		
		if($get_gerakan)
		{
			$get_frame_gerakan = FrameGerakan::where('parent',$id_gerakan)->get();
			$count = FrameGerakan::where('parent',$id_gerakan)->get()->count();
		}
		
		if($get_gerakan && $get_frame_gerakan)
		{
			$res['success'] = true;
			$res['status'] = 'Frame Gerakan Berhasil Didapatkan';
			$res['gerakan'] = $get_gerakan;
			$res['count'] = $count;
			$res['frame_gerakan'] = $get_frame_gerakan;
			
			
			return response($res);
		}
		else
		{
			$res['success'] = false;
			$res['status'] = 'Frame Gerakan Gagal Didapatkan';
			
			return response($res);
		}
	}

}