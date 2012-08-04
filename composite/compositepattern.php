<?php
interface iHtmlDom{
    function addNode(iHtmlDom $dom);
    function removeNode($index);
    function render(); //The operation
    function display();
    function getChildren();
    function getHtml();
    function setInnerHtml($html);
    function getInnerHtml();
    
}
//Component
abstract class HtmlDom implements iHtmlDom
{
    protected $_children = array();
    protected $_tagName;
    protected $_innerHtml='';


    public function __construct($tagName) {
        $this->_tagName = $tagName;
    }
    public function addNode(iHtmlDom $dom){
        return array_push($this->_children, $dom);
    }
    public function removeNode($index) {
        unset ($this->_children[$index]);
    }
    public function setInnerHtml($html){
        $this->_innerHtml = $html;
    }
    public function render() {
        $html = '';
        foreach ($this->_children as $child) {
            $html .= $child->render();
        }
        return '<'.$this->_tagName.'>'.$this->_innerHtml.$html.'</'.$this->_tagName.'>';
    }
   

    public function getChildren() {
        return $this->_children;
    }
    public function getInnerHtml() {
        return $this->_innerHtml;
    }
    public function getHtml() {
        return $this->render();
    }
    public function display() {
        echo $this->render();
    }
}

//Composite
class Div extends HtmlDom{
    public function __construct() {
        parent::__construct('div');
    }
}

class Span extends HtmlDom{
    public function __construct() {
        parent::__construct('span');
    }
}

//Leaf
class Br extends HtmlDom{
    public function __construct() {
        parent::__construct('br');
    }
    public function addNode(iHtmlDom $dom){
        throw new Exception('Invalid Method');
    }
    public function removeNode($index) {
        throw new Exception('Invalid Method');
    }
    public function setInnerHtml($html){
        throw new Exception('Invalid Method');
    }
    public function render() {
        
        return '<br/>';
    }
    public function getChildren() {
        throw new Exception('Invalid Method');
    }
    public function getInnerHtml() {
        throw new Exception('Invalid Method');
    }
    public function getHtml() {
        return $this->render();
    }
    public function display() {
        echo $this->render();
    }
}
