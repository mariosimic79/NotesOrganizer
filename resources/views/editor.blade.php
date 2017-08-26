
@extends('app')

@section('content')


<!--

<style type="text/css">
body {
font-family:verdana;
font-size:15px;
}

a {color:#333; text-decoration:none}
a:hover {color:#ccc; text-decoration:none}

#mask {
  position:absolute;
  left:0;
  top:0;
  z-index:9000;
  background-color:#000;
  display:none;
}  
#boxes .window {
  position:absolute;
  left:0;
  top:0;
  width:440px;
  height:200px;
  display:none;
  z-index:9999;
  padding:20px;
}
#boxes #dialog {
  width:375px; 
  height:203px;
  padding:10px;
  background-color:#ffffff;
}
</style>
-->

       <?php
          $data = \Session::get('open');
          if($data != null)
          {
              $sadrzajDec = explode ("|1236#54789%%9874#56321|", $data);
              $naziv = substr($sadrzajDec[0], 0, -5);
              echo '<script type="text/javascript">';
            echo 'var naziv = '.$naziv;
              echo ' openedFile(); </script>';
          }
        ?>

<link href='css/chosePic.css' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="js/editor.js"></script>    
<!-- <script type="text/javascript" src="js/openFile.js"></script>    -->
 <script type="text/javascript">
                       function send()
                              {
                                var iframe = document.getElementById("richTextField");
                                var iframe_contents = iframe.contentDocument.body.innerHTML;    
                                document.getElementById('myTextArea').value=iframe_contents;
                              }
                                    
                                    </script>
<div class="container" >
                              @if (session('message'))
                                    <div id="messageSavedFile">
                                        <div class="alert alert-success">
                                        <b>{{ session('message') }}</b>
                                        </div>
                                    </div>
                 
                                  
                               @endif
                                        <script>
                                            setTimeout(function() {
                                                        $('#messageSavedFile').fadeOut('fast');
                                                        }, 8000); // <-- vrijeme u milisekundama
                                         </script>
                                         
 
                                         
	<div class="row">
           <!-- action="{{url('/editor')}} -->
            <form method="POST"  action="save.php" >
                   
               
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
		  
                            <div class="panel-heading" style="overflow: hidden;">
                               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <p style="display:inline;"><b>Naziv dokumenta:</b></p> 
                                    <input style=" display: inline;" type="text" id="nazivDoc" name="nazivDoc" value="<?php 
                                     if($data != null)
                                     {
                                       echo $naziv;  
                                     }
                                    ?>">
                                    <input style=" display: inline; float: right; " type="submit" class="btn btn-default" onclick="send()" name="spremi" value="Spremi"/>
                                    <input style="display:none;" type="text" name="user" value="{{Auth::user()->name}}">
                            </div>
				<div class="panel-body">
 <?php 
 if($data == null){

        
 }?>
                                    

                                    	<body  onload="iFrameOn();">
	<div id="kont_ploca" style="padding:8px; width:700px;">
		<input class="btn btn-default" type="button" onClick="iBold()" value="B">
		<input class="btn btn-default" type="button" onClick="iUnderline()" value="U">
		<input class="btn btn-default" type="button" onClick="iItalic()" value="I">
		<input class="btn btn-default" type="button" onClick="iFontSize()" value="Font">
		<input class="btn btn-default" type="button" onClick="iHorizontalLine()" value="HR">
		<input class="btn btn-default" type="button" onClick="iUnorderedList()" value="UL">
		<input class="btn btn-default" type="button" onClick="iOrderedList()" value="OL">
		<!--<input type="button" onClick="openedFile()" value="Link">
                <input type="button" onClick="iFontColor()" value="Boja">
		<input type="button" onClick="iUnLink()" value="UnLink"> -->
		<input  class="btn btn-default" type="button" data-popup-open="popup-1" id="myBtn" value="Slika">
            
	</div>
	<!-- zamjena txt field s iframe "-->
        <textarea  name="myTextArea" style="display:none;" id="myTextArea" cols="100" rows="14"><?php 
                                     if($data != null)
                                     {
                                       echo $sadrzajDec[1];  
                                     }
                                    ?> </textarea></p>
        <iframe name="richTextField" id="richTextField" style="border:#000000 1px solid; width:100%; height:600px;"></iframe>                          
                                </div>

			</div>
		</div>
            </form>      
	</div>
                                         <script>
                                             var sadrzaj = document.getElementById("myTextArea").value;
                                             var doc = document.getElementById('richTextField').contentWindow.document;
                                            doc.open();
                                            doc.write(sadrzaj);
                                            doc.close();
                                             </script>
                                     
</div>

 <!-- Odabir slika -->
 
<div class="popup" data-popup="popup-1">
    <div class="popup-inner">
        
         <?php           
         
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
                                  echo '<button name="odabir" class="btn btn-default" value="files/'.Auth::user()->name."/pic/".$slika['naslov'].'" onclick="chosePic(this)" data-popup-close="popup-1">Odaberi</button>';
                                  echo '</div>';
                                  if($i==16)
                                  {
                                      break;
                                  }
                            }
                                         
                                         
                                         
                                  ?>  
        
        <a class="popup-close" data-popup-close="popup-1" href="#">x</a>
    </div>
</div>


 

 <script>


     </script>

@endsection
