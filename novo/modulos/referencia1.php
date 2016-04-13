 <?php
$ss  = ' <div class="modal fade" id="myModal" role="dialog" style="border: solid 1px #E5E5E5;">';
$ss .= ' <h4 class="modal-title">Modal Header</h4>';
$ss .= '    <div class="modal-dialog modal-md">';
$ss .= '      <div class="modal-content">';
$ss .= '       	<div class="modal-header">';
$ss .= '           <button type="button" class="close" data-dismiss="modal">&times;</button>';
$ss .= '            <h4 class="modal-title">Modal Header</h4>';
$ss .= '        </div>';
$ss .= '        <div class="modal-body">';
        
$ss .= "              		 loadmodulo('dialogo','mostrar',".$_POST['idd'].")";
       	 
$ss .= '      </div>';
$ss .= '        <div class="modal-footer">';
$ss .= '          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>';
$ss .= '        </div>  ';      
$ss .= '      </div>';
$ss .= '    </div>';
    
$ss .= '</div>' ; 
  
$ss .= "<p>Brasil</p>".$_POST['idd'];
 
 echo $ss;
  ?>