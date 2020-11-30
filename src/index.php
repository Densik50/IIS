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
                    <h5>First slide label</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
            </div>
            <!-- SLIDE 1 end -->

            <!-- SLIDE 2 -->
            <div class="carousel-item">
                <img src="img/carousel/carousel2.jpg" class="d-block w-100 carouselimage" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                </div>
            </div>
            <!-- SLIDE 2 end -->

            <!-- SLIDE 3 -->
            <div class="carousel-item">
                <img src="img/carousel/carousel3.jpg" class="d-block w-100 carouselimage" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
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
        <div class="section bg-dark" id="events">
            <h2 class="text-center text-uppercase">Newest added events:</h2>
            <div class="container row">
                <?php 
                    require_once "php/includes/database_handler.include.php";
                    require_once "php/includes/general_functions.include.php";

                    $data = six_newest_events($conn);

                    foreach($data as $event):
                        $eventid = $event["EventID"];
                        $evetname = $event["Name"];
                        $describtion =  $event["Describtion"];
                        $starts = $event["Start_date"]." ".$event["Start_time"];
                        echo "
                        <div class=\"card-index mx-auto card-index\" style=\"width: 18rem; margin-top: 10px; margin-bottom: 60px;\">
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

                    echo "<div class=\"text-center\"> <a href=\"events.php\" class=\"btn btn-primary event-btn\">More events</a> </div>";
                ?>
        </div>
        <!-- EVENTS SECTION END -->
        <!-- INTERPRETS SECTION -->
        <div class="section bg-light" id="interprets">

        </div>
        <!-- INTERPRETS SECTION END -->
        <div class="bg-dark" id="are_u_organizer">

        </div>
        <div class="bg-light" id="partners">

        </div>
    </div>
    <!-- SITE END -->

<?php
    include_once 'footer.php';
?>