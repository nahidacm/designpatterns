<?php

abstract class Shape {

    protected $_points;

    abstract public function setPoints();

    abstract public function getShape();

    public function Draw() {

        $this->setPoints();
        $image = $this->getShape();


        imagepng($image, 'shapeimage.png');
        imagedestroy($image);
    }

}

class Triangle extends Shape {

    public function setPoints() {
        $this->_points = array(50, 70, 100);
        ;
    }

    public function getShape() {

        $c = $this->_points[2]; // base 
        $b = $this->_points[1]; // sides 
        $a = $this->_points[0];

        // calculate angle, cosine rule 
        $alpha = acos((pow($b, 2) + pow($c, 2) - pow($a, 2)) / (2 * $b * $c));

        // pythag to calc height and y distance 
        $height = abs(sin($alpha)) * $b;
        $width = abs(cos($alpha)) * $b;

        $x = 0; // start point 
        $y = 100;

        $points = array(
            $x, $y, // start 
            $x + $c, $y, // base 
            $x + $width, $y - $height     // apex 
        );

        // draw 
        $image = imagecreatetruecolor(100, 100);

        // sets background to red
        $white = ImageColorAllocate($image, 255, 255, 255);
        ImageFillToBorder($image, 0, 0, $white, $white);

        $blue = imagecolorallocate($image, 0, 0, 255);
        imagefilledpolygon($image, $points, 3, $blue);

        return $image;
    }

}

class Rectangle extends Shape {

    public function setPoints() {
        $this->_points = array(4, 4, 195, 195);
    }

    public function getShape() {
        $x1 = $this->_points[0];
        $y1 = $this->_points[1];
        $x2 = $this->_points[2];
        $y2 = $this->_points[3];

        // Create a 55x30 image
        $image = imagecreatetruecolor(200, 200);
        $white = imagecolorallocate($image, 255, 255, 255);

        // Draw a white rectangle
        imagefilledrectangle($image, $x1, $y1, $x2, $y2, $white);

        return $image;
    }

}

class Ellipse extends Shape {

    public function setPoints() {
        $this->_points = array(100, 100, 100, 100);
    }

    public function getShape() {
        $cx = $this->_points[0];
        $cy = $this->_points[1];
        $width = $this->_points[2];
        $height = $this->_points[3];

        // Create a 55x30 image
        $image = imagecreatetruecolor(200, 200);
        $white = imagecolorallocate($image, 255, 255, 255);


        // choose a color for the ellipse
        $ellipseColor = imagecolorallocate($image, 0, 0, 255);

        // draw the white ellipse
        imagefilledellipse($image, $cx, $cy, $width, $height, $ellipseColor);

        return $image;
    }

}

class Polygon extends Shape {

    public function setPoints() {
        $this->_points = array(
            40, 50, // Point 1 (x, y)
            20, 240, // Point 2 (x, y)
            60, 60, // Point 3 (x, y)
            240, 20, // Point 4 (x, y)
            50, 40, // Point 5 (x, y)
            10, 10   // Point 6 (x, y)
        );
    }

    public function getShape() {
        // create image
        $image = imagecreatetruecolor(250, 250);

        // allocate colors
        $bg = imagecolorallocate($image, 0, 0, 0);
        $blue = imagecolorallocate($image, 0, 0, 255);

        // fill the background
        imagefilledrectangle($image, 0, 0, 249, 249, $bg);

        // draw a polygon
        imagefilledpolygon($image, $this->_points, 6, $blue);
        return $image;
    }

}

//$ellipse = new Ellipse;
//$ellipse->Draw();
//$rectangle = new Rectangle;
//$rectangle->Draw();
//$polygon = new Polygon;
//$polygon->Draw();
//$triangle = new Triangle;
//$triangle->Draw();

if ($_POST && $_POST['shape']) {
    $shape_name = $_POST['shape'];

    $shape = new $shape_name;
    $shape->Draw();
}
?>
<form method="POST">
    <select name="shape">
        <option>Ellipse</option>
        <option>Rectangle</option>
        <option>Polygon</option>
        <option>Triangle</option>
    </select>
    <input type="submit" value="Draw" name="Draw" />
    <img src="shapeimage.png" alt="Shape Image"/>
</form>