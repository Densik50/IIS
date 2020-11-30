<?php
    include_once 'header.php';
?>


    <!-- SITE START -->
    <link href="css/browse.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet">

    <script src="http://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/77c7778c25.js" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            //otvoranie a zatvaranie topbaru po kliknuti na bar icon
            $(".hamburger .fas").click(function(){
                if($(".topbar_menu").hasClass("active"))
                {
                    $(".topbar_menu").removeClass("active")
                }
                else {
                    $(".topbar_menu").addClass("active")
                }  
            })

            //zatvorenie topbaru po kliknuti na nejaku sekciu
            $(".menubutton").click(function(){
                if($(".topbar_menu").hasClass("active"))
                {
                    $(".topbar_menu").removeClass("active")
                }
            })
        })
    </script>
    
    <div class="container">
        <div class="sidebar">
            <div class="sidebar_background navbar navbar-dark bg-dark">
                <div class="sidebar_vnutri">
                    <div class="sidebar_informationContainer">
                        <div class="sidebar_profile_image">
                        </div>
                        <ul class="sidebar_menu">
                            <li><a href="#about" class="sidemenubutton" id="button_about"><h3 class="sidebar_nadpis">About</h3></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="main">
            <div class="top_navbar navbar navbar-dark bg-dark">
                <div class="hamburger">
                    <div class="hamburger_vnutri">
                        <i class="fas fa-bars" aria-hidden="true"></i>
                    </div>
                </div>
                <ul class="topbar_menu">
                    <li><a href="#about" class="menubutton">About</a></li>
                </ul>
            </div>
            <div class="content">
                
                <?php
                    //write all events
                    $orderby = "Name";
                    $asc_dec = "ASC";
                    $where = "";
                    $events = get_all_events($conn, $orderby, $asc_dec, $where);
                ?>

            </div> 
        </div>
    </div>
    <!-- SITE END -->

<?php
    include_once 'footer.php';
?>