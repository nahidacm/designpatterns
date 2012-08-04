<?php
//Stategy
interface IStrategy {

    function draw($data);
}
//Concreate Strategy
class LineGraph implements IStrategy {

    public function draw($data) {
        $graph = "Line Graph";

        return $graph;
    }

}
//Concreate Strategy
class BarChart implements IStrategy {

    public function draw($data) {
        $graph = "Bar Chart";

        return $graph;
    }

}
//Context
class GraphTool {

    private $_data = array();

    public function __construct($data) {
        $this->_data = $data;
    }

    public function drawGraph($tool) {
        $graph = $tool->draw($this->_data);

        return $graph;
    }

}

$data = array(5, 9, 10, 35);

$gt = new GraphTool($data);

$graph = $gt->drawGraph(new LineGraph());
echo $graph;

echo "<br/>";

$graph = $gt->drawGraph(new BarChart());
echo $graph;
?>
