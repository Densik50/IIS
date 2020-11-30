<?php
    include_once 'header.php';
?>
    <?php
        if(!isset($_GET["orderby"]) || !isset($_GET["name"]))
        {
            $_GET["orderby"] = 1;
            $_GET["name"] = "";
        }
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
                        
                        <form class="form-inline my-2 my-lg-0" action="interprets.php" method="get">
                            <ul class="sidebar_menu">
                                <input class="form-control mr-sm-2 search" name="name" type="search" placeholder="Name..." aria-label="Name" 
                                <?php echo "value=\"". $_GET["name"] ."\"";?>
                                >

                                <div>
                                    <label for="radios">Sort by:</label><br>
                                    <div class="row">
                                        <input type="radio" id="name_asc" name="orderby" value="1" <?php if($_GET["orderby"]==1)echo"checked=\"checked\"";?>>
                                        <label for="male">A-Z</label><br>   
                                    </div> 
                                    <div class="row">
                                        <input type="radio" id="name_desc" name="orderby" value="2" <?php if($_GET["orderby"]==2)echo"checked=\"checked\"";?>>
                                        <label for="female">Z-A</label><br>
                                    </div>     
                                    <div class="row">
                                        <input type="radio" id="id_desc" name="orderby" value="3" <?php if($_GET["orderby"]==3)echo"checked=\"checked\"";?>>
                                        <label for="other">Newest added</label> 
                                    </div>   
                                    <div class="row">
                                        <input type="radio" id="id_asc" name="orderby" value="4" <?php if($_GET["orderby"]==4)echo"checked=\"checked\"";?>>
                                        <label for="other">Oldest added</label> 
                                    </div>      
                                </div> 
                                

                                <li class="nav-item">
                                    <button class="btn btn-primary" name="submit" type="submit">Apply</button>
                                </li>
                            </ul>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="main fullscreen-container">
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
                    require_once "php/includes/database_handler.include.php";
                    require_once "php/includes/general_functions.include.php";
                    //write all events

                    //TODO fix search by name
                    //turned off, no time
                    /* if($_GET["name"] != "")
                    {
                        $name = $_GET["name"];
                        $where = "WHERE Name = `$name`";
                    }
                    else
                    {
                        $where = "";
                    } */
                    $name = $_GET["name"];
                    $where = "";
                    $orderby = "Name";
                    $asc_dec = "ASC";
                    if($_GET["orderby"]==1)
                    {
                        $orderby = "Name";
                        $asc_dec = "ASC";
                    }
                    else if($_GET["orderby"]==2)
                    {
                        $orderby = "Name";
                        $asc_dec = "DESC";
                    }
                    else if($_GET["orderby"]==3)
                    {
                        $orderby = "InterpretID";
                        $asc_dec = "DESC";
                    }
                    else if($_GET["Interpretby"]==4)
                    {
                        $orderby = "EventID";
                        $asc_dec = "ASC";
                    }
                    $interprets = get_all_interprets($conn, $orderby, $asc_dec, $where);
                    
                    foreach($interprets as $interpret):
                        $interpretid = $interpret["InterpretID"];
                        $name = $interpret["Name"];

                        //TODO write interprets's genres
                        //TODO write interprets's users
                        echo "
                        <div class=\"row\">
                        <div class=\"card\">
                            <div class=\"card-body\">
                                <h5 class=\"card-title\"><a href=\"interpret.php?id=$interpretid\" class=\"\">$name</a></h5>
                                <p class=\"card-text\">Metal, Rock, genres...</p>
                            </div>
                        </div>
                        </div>
                    
                        ";
                    endforeach;
                ?>

            </div> 
        </div>
    </div>
    <!-- SITE END -->

<?php
    include_once 'footer.php';
?>