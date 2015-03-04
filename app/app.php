<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/car.php";
    $app = new Silex\Application();
    $app->get("/cars_display", function(){
        return "
        <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
        <html xmlns='http://www.w3.org/1999/xhtml'>
    <head>
        <meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
        <title>Search By price</title><!-- Latest compiled and minified CSS -->
        <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css'>

        </head>

    <body>
        <div class='container'>
        <h1>Find A car</h1>
        <form   action='/view_cars'>
            <label for='price'>Enter Max Price</label>
            <div class='form-group'>
            <input id='price'  name='price' class='form-control' type='number'/>
            </div>
            <label for='miles'>Enter Max miles</label>
            <div class='form-group'>
            <input id='miles'  name='miles' class='form-control' type='number'/>
            </div>
            <button type='submit' class='btn-success'>Submit</button>
        </form>
        </div>
    </body>
</html>
        ";
    });

    $app->get("/view_cars", function(){
        $porche= new car("porche 2014",99090,98,"porsche.jpg");
        $bmw= new car("BMW 2012",5609,500,"bmw.jpeg");
        $ford= new car("Ford 1914",45689999,6000,"ford.jpg");
        $cars=array($bmw,$ford,$porche);
        $car_match_search=array();
        if(empty($_GET['price']) && empty($_GET['miles'])){
            echo "Please enter maximum number of miles &  The maximum Price!!!!!!!!!!!!!!!";
        }
        elseif(empty($_GET['price']))
        {
            echo "Please enter a Price!!!!!!!!!!!!!!!";
        }
        elseif(empty($_GET['miles'])){
            echo "Please enter maximum number of miles!!!!!!!!!!!!!!!";
        }
        else{
        foreach ($cars as $car){
            if($car->worthBuying($_GET['price'], $_GET['miles'])){
                array_push($car_match_search,$car);
            }
        }
    }
        ?>

        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Cars</title>
        </head>

        <body>
        <?php
        if (empty($car_match_search)){
                echo "There are  no cars to display";
        }
        else{
                foreach ($car_match_search as $car){
                    $getmake=$car->getMake();
                    $getpic=$car->getImage();
                    $getprice=$car->getPrice();
                    $getmiles=$car->getMiles();
                    echo "<ul>";
                        echo "<li>";
                            echo $getmake;
                                echo "</li>";
                                echo "<img src='$getpic'/>";
                            echo "<ul>";
                                echo "<li>";
                                    echo $getprice;
                                echo "</li>";
                                echo "<li>";
                                    echo $getmiles;
                                echo "</li>";
                            echo "</ul>";
                    echo "</ul>";
                  }
        }
        ?>
        </body>
        </html>


    });

    return $app;


?>
