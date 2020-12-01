<?php
    include_once 'header.php';
    include_once 'left_bar.php';
?>

<style>
    a{
        text-decoration: none;
        color: black;
        font-weight: 600;
        
    }

    a:hover{
        text-decoration: solid;
        color: white;
    }

    .fullscreen-container{
        overflow: auto;
    }

    .lala{
        position: inline;
        width: 10%;
    }

</style>

    <!-- SITE START -->

    
    

    <div class="container fullscreen-container" id="admincon" style="overflow:auto; height:0px">
    
    <!-- Displaying administration sections in container of admin.php-->
    <script>
        $(document).ready(function(){
            $('#sb li').click(function(){
            $('#admincon').load($(this).attr("id")+'.php', function() {
                $('#admincon').fadeIn('slow') ;
                });
            return false;
            });
        })
    </script>

    


    <?php            
        //suppress notice in this php   
        function handle_trash(){}
        set_error_handler("handle_trash");
        
        //set booo to 0 if it is NULL
        if(($booo = $_GET['boo'])==null){$booo=0;}
        
        //check the value of booo and load corresponding div into page container
        if($booo==1){
            echo '<script>$(document).ready(function(){
                
                $(\'#admincon\').load(\'user_control.php\', function()
                {
                    $(\'#admincon\').fadeIn(\'slow\') ;
                });
                return false;
                })
                </script>';
        $booo = 0;
        }
        elseif($booo==2){
            echo '<script>$(document).ready(function(){
                
                $(\'#admincon\').load(\'event_control.php\', function()
                {
                    $(\'#admincon\').fadeIn(\'slow\') ;
                });
                return false;
                })
                </script>';
        $booo = 0;
        }
        elseif($booo==3){
            echo '<script>$(document).ready(function(){
                
                $(\'#admincon\').load(\'interpret_control.php\', function()
                {
                    $(\'#admincon\').fadeIn(\'slow\') ;
                });
                return false;
                })
                </script>';
        $booo = 0;
        }
    ?>
    
    <?php


        if(isset($_SESSION["UserID"]))
        {
            $user_data = get_info($_SESSION["UserID"]);
            if(!isset($_SESSION["admin"]))
            {
                echo "Restricted access!";
            }
            else
            {
                
            }
        }
        else
        {
            header("location: login.php");
            exit();
        }
    ?>
    


    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

    
    </div>

    
    <!-- SITE END -->

<?php
    include_once 'footer.php';
?>