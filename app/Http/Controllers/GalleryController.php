<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use File;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// Intervention\Image\ImageManagerStatic as Image;


class GalleryController extends Controller {

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
		return view('gallery');
	}

        public function upload(Request $request)
        {
    
        
        if($request->hasFile('slika'))
        {
            
            $user = Auth::user()->name;
            $file = $request->file('slika');
            $path= 'files/'.$user.'/pic/';
            $ext=$file->getClientOriginalExtension();
            $fileName=$file->getClientOriginalName();
            $name= date("h:i:s")."-".date("Y.m.d").".".$ext;
            $nameFile = $fileName.$ext;

            if($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "gif" || $ext == "bmp")
            {
                $file->move($path,$fileName);
                DB::table($user.'_slike')->insert(
                           ['naslov' => $fileName,
                            'path' => 'files/'.$user.'/pic/'.$fileName,
                            'path_thumb'=> 'files/'.$user.'/pic/'.$fileName]
                           );
                 return Redirect::to('/gallery')->with('message', 'Slika je spremljena');
            }
            else 
             {
                 return Redirect::to('/gallery')->with('messageBad', 'Slika nije odgovarajućeg formata(png,jpeg,jpg,gif,bmp).');
             }
            
  /*          $img = Image::make('files/'.$user.'/pic/'.$file);
           
          //  $img = Image::make($request->file('slika')->getRealPath());
            $img->resize(1024, 1024);
           $img->save('files/'.$user.'/pic/'.$file);
		   $img->resize(128,128);
           $img->save('files/'.$user.'/pic/thumb-'.$file);
           //$path = $request->slika->store('slike');
*/		   
            
        }
        
      
       
    }

    public function delete($nazivSlike)
    {
        $naziv = $nazivSlike;
        
        File::delete('files/'.Auth::user()->name.'/pic/'.$naziv);
        DB::table(Auth::user()->name.'_slike')->where ('naslov', '=', $naziv)->delete();
        return Redirect::to('/gallery')->with('message', 'Slika obrisana');
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
