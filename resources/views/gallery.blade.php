
@extends('app')

@section('content')


 <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    
    <?php
            /* if(isset($_FILES["slika"]))
            {
                $file_name = $_FILES['slika']['name'];
                $file_temp = $_FILES['slika']['tmp_name'];
                $pathSlika = "files/".Auth::user()."/pic/".$file_name;
                $pathSlikaThumb = "files/".Auth::user()."/pic/".$file_name;
                if(empty($errors)==true)
                {
                   move_uploaded_file($file_temp, $tmpSlika);
                   
                $sql = "INSERT INTO ".Auth::user()."_slike (naslov, path, path_thumb) VALUES ('".$filename."','".$pathSlika."','".$path."')";
                $stmt = $conn->query($sql);
         
                }
                else
                {
                   print_r($errors);   
                }           
            }
        
    */
    ?>
    
    
    
 
<div class="container">
       @if (session('message'))
                                    <div id="messageUploadedPhoto">
                                        <div class="alert alert-success">
                                        <b>{{ session('message') }}</b>
                                        </div>
                                    </div>
                                    @endif
                                     @if (session('messageBad'))
                                    <div id="messageUploadedPhoto">
                                        <div class="alert alert-danger">
                                        <b>{{ session('messageBad') }}</b>
                                        </div>
                                    </div>
                                    @endif
                                        <script>
                                            setTimeout(function() {
                                                        $('#messageUploadedPhoto').fadeOut('fast');
                                                        }, 8000); // <-- vrijeme u milisekundama
                                         </script>
    
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading" style="overflow: hidden;">
                                    <h3 style="display:inline;">Slike</h3> 
                                    <form style="display: inline; "  method="POST" enctype="multipart/form-data" action="{{url('/galleryUpload')}}" >
                                          <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input style=" display: inline; float: right; "  type="submit" class="btn btn-default" value="Upload">
                                        <input name="slika" style=" display: inline; float: right; " type="file" class="btn btn-default" multiple />
                                       
                                    </form>
                                </div>
				<div class="panel-body">
                                        
                                    
                                                        <?php
         
                                                        
                                                        
                           // $dsn = 'mysql:host=localhost; dbname=organizator_biljezaka; charset=utf8';
                                                        
                            require 'connect.php';
                            $sql_selectPhoto = "SELECT path_thumb,naslov FROM ".Auth::user()->name."_slike ORDER BY id DESC";
                            $stmt = $conn->query($sql_selectPhoto);
                            $counter = $stmt ->rowCount();
                            $i=0;
                                
                            foreach($stmt as $slika)
                            {
                                
                                $url = url('/gallery/'.$slika['naslov']);
                                
                                  $i++;
                                  echo '<div style="text-align:center;" class="col-lg-3 col-md-4 col-xs-6 thumb">';
                                  echo    '<a class="thumbnail" href="#">';
                                  echo        '<img width="150" height="150" class="img-responsive" src="'.$slika['path_thumb'].'" alt="">';
                                  echo    '</a>';
                                  echo '<form method="POST" action="'.$url.'">';
                                  echo '<input type="hidden" name="_token" value="'.csrf_token().'">';
                                  echo '<input  type="submit" class="btn btn-default" name="'.$slika['naslov'].'" value="Obriši">';
                                  echo '</form>';
                                  echo '</div>';
                                  if($i==16)
                                  {
                                      break;
                                  }
                            }
                                         
                                         
                                         
                                  ?>       
                                </div>
			</div>
		</div>
	</div>
</div>



    
@endsection
