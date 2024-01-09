
<div class="page-header headertext">
               <h3><strong>List Of Business Directories</strong></h3>
        </div>

      <div class="container">
        <div class="row">
          <div class="col-lg-3">
            
          </div>
          <div class="col-lg-6">
            
            <table class="table table-bordered table-striped">
			<?php foreach($this->bizness as $key=>$value){
                   echo '<tr>';
                   echo     '<td>';
                   echo         '<div class="row">';
                   echo             '<div class="col-xs-6 col-md-3" style="margin: 10px 0px -10px 0px;">';
                   echo                 '<a style="height: 120px;padding-top: 5px;" href="login/index/'. $value['bizid'] .'"   class="thumbnail">';
                   echo                 '<img src="'. URL .'public/images/bizdir/'. $value['bizid'] .'.jpg" alt="">';
                   echo                 '</a>';
                   echo             '</div>';
                   echo             '<p style="margin: 10px 0 0 0;"><strong>'. $value['bizlong'] .'</strong></p>';
                   echo             '<p>'. $value['bizadd1'] .'</p>';
                   echo         '</div>';
                   echo     '</td>';
                   echo '</tr>';
            }?>        
            </table>
          </div>
          <div class="col-lg-3">
            
          </div>
        </div> 
      </div>
     <!-- /container -->

