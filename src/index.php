<?php
    include_once 'header.php';
?>

    <!-- CAROUSEL -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">

            <!-- SLIDE 1 -->
            <div class="carousel-item active">
                <img src="img/carousel/carousel1.jpg" class="d-block w-100 carouselimage" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <a href="#events"> <h5>Check out newest events!</h5> </a> 
                </div>
            </div>
            <!-- SLIDE 1 end -->

            <!-- SLIDE 2 -->
            <div class="carousel-item">
                <img src="img/carousel/carousel2.jpg" class="d-block w-100 carouselimage" alt="...">
                <div class="carousel-caption d-none d-md-block">
                <a href="#interprets"> <h5>Check out newest interprets!</h5> </a> 
                </div>
            </div>
            <!-- SLIDE 2 end -->

            <!-- SLIDE 3 -->
            <div class="carousel-item">
                <img src="img/carousel/carousel3.jpg" class="d-block w-100 carouselimage" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <a href="#are_u_organizer"> <h5>Are u an organizer?</h5> </a> 
                </div>
            </div>
            <!-- SLIDE 3 end -->
        </div>

        <!-- NEXT / PREV buttons -->
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- CAROUSEL END -->

    <!-- SITE START -->
    <div class="container">
        <!-- EVENTS SECTION -->
        <div class="bg-dark" id="events">
            <h2 class="text-center text-uppercase">Newest added events:</h2>
            <div class="container row">
                <?php 
                    require_once "php/includes/database_handler.include.php";
                    require_once "php/includes/general_functions.include.php";

                    $data = six_newest_events($conn);
                    //TODO vypisovanie zanrov podla db
                    foreach($data as $event):
                        $eventid = $event["EventID"];
                        $evetname = $event["Name"];
                        $describtion =  $event["Describtion"];
                        $starts = $event["Start_date"]." ".$event["Start_time"];
                        echo "
                        <div class=\"card-index mx-auto card-event-index\" style=\"width: 18rem; margin-top: 10px; margin-bottom: 60px;\">
                            <img src=\"img/carousel/carousel1.jpg\" class=\"card-img-top\">
                            <div class=\"card-body\">
                                <h5 class=\"card-title\">$evetname</h5>
                                <p class=\"card-text\">$describtion</p>
                                <a href=\"event.php?id=$eventid\" class=\"btn btn-primary\">More info</a>
                            </div>
                            <div class=\"card-footer bg-light\">
                                $starts
                            </div>
                        </div>

                        ";
                    endforeach;
                    echo "
            </div>
                    ";

                    echo "<div class=\"text-center\"> <a style=\"margin-bottom: 25px;\" href=\"events.php\" class=\"btn btn-primary event-btn\">More events</a> </div>";
                ?>
        </div>
        <!-- EVENTS SECTION END -->
        <!-- INTERPRETS SECTION -->
        <div class="bg-light" id="interprets">
        <h2 class="text-center text-uppercase">Newest added interprets:</h2>
            <div class="container row">
                <?php 
                    require_once "php/includes/database_handler.include.php";
                    require_once "php/includes/general_functions.include.php";

                    $data = six_newest_interprets($conn);

                    foreach($data as $interpret):
                        $interpretid = $interpret["InterpretID"];
                        $interpretname = $interpret["Name"];
                        //TODO vypisovanie zanrov podla db
                        echo "
                        <div class=\"card-index mx-auto card-interpret-index\" style=\"width: 18rem; margin-top: 10px; margin-bottom: 60px;\">
                            <img src=\"img/carousel/carousel1.jpg\" class=\"card-img-top\">
                            <div class=\"card-body\">
                                <h5 class=\"card-title\">$interpretname</h5>
                                <a href=\"interpret.php?id=$interpretid\" class=\"btn btn-primary\">More info</a>
                            </div>
                            <div class=\"card-footer bg-light\">
                                Rock, Metal, Rap...
                            </div>
                        </div>

                        ";
                    endforeach;
                    echo "
            </div>
                    ";

                    echo "<div class=\"text-center\"> <a style=\"margin-bottom: 25px;\" href=\"interprets.php\" class=\"btn btn-primary event-btn\">More interprets</a> </div>";
                ?>
        </div>
        <!-- INTERPRETS SECTION END -->
        <div class="bg-dark" id="are_u_organizer">
            <div class="container">
                <div class="row text-center text-white">
                    <div style="margin-top: 22vh;" class="col">
                        Are you an organizer?
                    </div>
                    <div style="margin-top: 22vh;" class="col">
                        Add your event simply!
                    </div>
                    <div style="margin-top: 22vh;" class="col">
                        It was never easier!
                    </div>
                </div>
            </div>
            <div class="text-center"> <a style="margin-top:20vh; margin-bottom: 25px;" href="create_event.php" class="btn btn-primary event-btn">Create event</a> </div>
        </div>
        <div class="bg-light" id="partners">
            <div class="container">
                <div class="text-center">
                <div class="row text-center">
                    <div style="margin-top: 22vh;" class="col">
                        Partners: This is VUT project for IIS.
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- SITE END -->

<?php
    include_once 'footer.php';
?>