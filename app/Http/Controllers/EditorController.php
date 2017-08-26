<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use mPDF;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Knp\Snappy\Pdf;

class EditorController extends Controller {

    public function __construct()
	{
		$this->middleware('auth');
	}
    
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view ('editor');
	}

        public function save($nazivDoc)
        {

  // $path= file_get_contents("files/".Auth::user()->name."/tmp/tmp.html");		
  //$pathSave = "files/".Auth::user()->name."/doc/".$nazivDoc.".pdf";
  
 
	/*	
		$snappy = new Pdf('/vendor/h4cc/wkhtmltopdf-amd64/bin/wkhtmltopdf-amd64');
			$snappy->generateFromHtml('<p><b>Bok</b></p>', $pathSave);
*/
           return Redirect::to('/editor')->with('message', 'Datoteka spremljena pod nazivom '.$nazivDoc.'.');
            
        }
        /**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
