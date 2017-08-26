<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Auth;
use File;
use mPDF;
use Illuminate\Support\Facades\Redirect;

class FilemanagerController extends Controller {

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
            return view('filemanager');
	}

        public function delete($user,$folder, $file)
	{
          File::delete('files/'.$user.'/doc/'.$file);
          return Redirect::to('/filemanager')->with('message', 'Datoteka obrisana');  
	}
        
        
        public function upload(Request $request)
        {
    
        
        if($request->hasFile('datoteka'))
        {
            
            
      
            
            $user = Auth::user()->name;
            $file = $request->file('datoteka');
            $path= 'files/'.$user.'/doc/';
           $ext=$file->getClientOriginalExtension();
           $fileName=$file->getClientOriginalName();
           
           if($ext == "doc" || $ext == "docx")
           {
               $file->move($path,$fileName);
               return Redirect::to('/filemanager')->with('message', 'Datoteka uspiješno uploadana');    

               }
           else
           {
               return Redirect::to('/filemanager')->with('messageBad', 'Pogrešan tip datoteke. Moguće uploadati samo .doc ili .docx datoteku');  
       
           }
           
        } 
        }
        
        
        
      public function open($user,$folder, $file)
      {
          $path="files/".$user."/".$folder."/".$file;
          $sadrzaj = file_get_contents($path);
          $sadrzajEnc = $file."|1236#54789%%9874#56321|".$sadrzaj;
          
          return Redirect::to('/editor')->with('open', $sadrzajEnc);      
      }
      
        public function download($user,$folder, $file)
      {
          $path="files/".$user."/".$folder."/".$file;
          $sadrzaj = file_get_contents($path);
          $naziv =   $naziv = substr($file, 0, -5);
        
            $mpdf=new mPDF('c','A4','','' , 0 , 0 , 0 , 0 , 0 , 0);
            $mpdf->SetDisplayMode('fullpage');
            $mpdf->list_indent_first_level = 1;  
            $html = '<html><head><meta charset="UTF-8" /></head><body><br><br><div '
                    . 'style=" margin: 20pt 25pt 20pt 25pt;">'.$sadrzaj.'</div></body></html>'; 
            $mpdf->WriteHTML($html);
            $orderPdfName = "order-".$singleOrder[0]['display_name'];
            $mpdf->Output($naziv.".pdf",'D');
            header('Content-type: application/pdf');
            header("Content-Disposition: attachment; filename=".$naziv.".pdf");
          
           return Redirect::to('/filemanager');          
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
