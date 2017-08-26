@extends('app')

@section('content')
<style>
  #maincontainer {
    width:100%;
    height: 100%;
  }

  #leftcolumn {
    float:left;
    display:inline-block;
    width: 100px;
    height: 100%;
 
  }

  #contentwrapper {
    float:left;
    display:inline-block;
    width: -moz-calc(100% - 100px);
    width: -webkit-calc(100% - 100px);
    width: calc(100% - 100px);
    height: 100%;
 
  }
  
</style>
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel-heading">Home</div>

				<div class="panel-body">
                                    <!-- <div id="maincontainer">
                                        <div id="leftcolumn">
                                            <img width="32px" height="32px" src="src/search.png">
                                            <input type="text" name="search" placeholder="Search">
                                        </div>
                                        <div id="contentwrapper" align="right">
                                            <button >Dodaj dokument</button>
                                        </div>
                                    </div>-->
                                    <span>
                                        <img width="32px" height="32px" src="src/search.png">
                                        <input type="search" name="search" placeholder="Search">
                                        <input type="image" width="20px" height="20px" src="src/search.png">                 
                                
                                            <button style="float: right;">Dodaj dokument</button>
                                    </span>
                                    
                                    <hr>
                                    <input type="image" width="32px" height="32px" src="src/delete.png">
                                    <input type="image" width="32px" height="32px" src="src/add.png">
                                    <input type="image" width="32px" height="32px" src="src/download.png">
                                    <input type="image" width="32px" height="32px" src="src/upload.png">
                                    <input type="image" width="32px" height="32px" src="src/search.png">
                                    <input type="image" width="32px" height="32px" src="src/success.png">
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
