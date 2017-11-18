<?php include 'inc/header.php'; ?>
<?php include 'inc/sidebar.php'; ?>

        <div class="grid_10">
		
            <div class="box round first grid">
                <h2> Dashbord</h2>
                <div class="block">               
                  Welcome admin panel  

                  <?php 

                  	
                  //echo date("Y-m-d H:i:s");
                  
                  echo Session::get('studentId');
                  echo Session::get('username');
                  echo Session::get('isAdmin');
                  


                  ?>      
                </div>
            </div>
        </div>
<?php include 'inc/footer.php'; ?>