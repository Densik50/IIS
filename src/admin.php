<?php
    include_once 'header.php';
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

    <div class="lala"> <?php
        include_once 'left_bar.php';
    ?></div> 
    
    <div class="container fullscreen-container" id="admincon" style="overflow:auto; height:0px">
    

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
            if(isset($_SESSION["userid"]))
            {
                $user_data = get_info($_SESSION["userid"]);
                if($user_data["admin"] === false)
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
    </div>
    <!-- SITE END -->

<?php
    include_once 'footer.php';
?>