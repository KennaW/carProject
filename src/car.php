<?php
class car
{
    private $make_model;
    private $price;
    private $miles;
    private $image;
    function __construct($model,$amount,$drive,$image_url){
        $this->make_model=$model;
        $this->price=$amount;
        $this->miles=$drive;
        $this->image=$image_url;
    }
    function setMake($new_make){
        $string_make =(string)$new_make;
        if($string_make != ""){
        $this->make_model=$string_make;
    }
    }
    function getMake(){
        return $this->make_model;
    }
    function setPrice($new_price){
        $float_number=(float)$new_price;
        if($floatnumber != 0){
            $formatted_price = number_format($float_price, 2);
            $this->price=$formated_price;
        }
    }
    function getPrice(){
        return $this->price;
    }
    function setMiles($new_miles){
        $float_number=(float)$new_miles;
        if($floatnumber !=0){
            $formatted_miles = number_format($float_miles, 2);
            $this->miles+$formated_price;
        }
    }
    function getMiles(){
        return $this->miles;
    }
    function setImage($new_image){
        $this->image=$new_image;
        }
    function getImage(){
        return $this->image;
    }
    function worthBuying($max_price,$max_mileage)
    {
        return $this->price< $max_price && $this->miles< $max_mileage;
    }
}
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
