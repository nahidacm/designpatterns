<?php

//Product
class Report {

    
    private $header;
    private $body;
    private $footer;
    
    public function setHeader($header) {
        $this->header = $header;
    }

    public function setBody($body) {
        $this->body = $body;
    }

    public function setFooter($footer) {
        $this->footer = $footer;
    }

    public function printReport() {

        echo $this->header . "<br/>";
        echo $this->body . "<br/>";
        echo $this->footer . "<br/>";
    }

}

//Abstruct Builder
abstract class ReportMaker {

    protected $report;
   

    public function getReport() {

        return $this->report;
    }

    public function createNewReport() {

        $this->report = new Report();
    }

    public abstract function buildHeader();

    public abstract function buildBody();

    public abstract function buildFooter();
}

//Concreate Builder
class CrystalReportMaker extends ReportMaker {
    
    private $data;
    
    public function __construct($data) {
        $this->data = $data;
    }

    public function buildHeader() {

        $this->report->setHeader("Crystal Header");
    }

    public function buildBody() {

        $this->report->setBody($this->data);
    }

    public function buildFooter() {

        $this->report->setFooter("Crystal Footer");
    }

}

//Concreate Builder
class HtmlReportMaker extends ReportMaker {
    
    private $data;
    
    public function __construct($data) {
        $this->data = $data;
    }

    public function buildHeader() {

        $this->report->setHeader("Html Header");
    }

    public function buildBody() {

        $this->report->setBody($this->data);
    }

    public function buildFooter() {

        $this->report->setFooter("Html Footer");
    }

}

//Concreate Builder
class PdfReportMaker extends ReportMaker {
    
    private $data;
    
    public function __construct($data) {
        $this->data = $data;
    }

    public function buildHeader() {

        $this->report->setHeader("PDF Header");
    }

    public function buildBody() {

        $this->report->setBody($this->data);
    }

    public function buildFooter() {

        $this->report->setFooter("PDF Footer");
    }

}

//Director
class Reporter {

    private $reportMaker;
    

    public function setReportMaker(ReportMaker $reportMaker) {

        $this->reportMaker = $reportMaker;
    }
    
    

    public function getReport() {

        return $this->reportMaker->getReport();
    }

    public function constructReport() {

        $this->reportMaker->createNewReport();
        $this->reportMaker->buildHeader();
        $this->reportMaker->buildBody();
        $this->reportMaker->buildFooter();
    }

}

//Client
class ClientApp {

    public static function main() {

        $reporter = new Reporter();
        
        $data = "Crystal Report Data";
        $crystalReportMaker = new CrystalReportMaker($data);
        $reporter->setReportMaker($crystalReportMaker);
        $reporter->constructReport();

        $report = $reporter->getReport();
        $report->printReport();

        echo "<br/>";

        $data = "Html Data";
        $htmlReportMaker = new HtmlReportMaker($data);
        $reporter->setReportMaker($htmlReportMaker);
        $reporter->constructReport();
        
        $report = $reporter->getReport();
        $report->printReport();

        echo "<br/>";

        $data = "PDF Data";
        $pdfReportMaker = new PdfReportMaker($data);
        $reporter->setReportMaker($pdfReportMaker);
        $reporter->constructReport();

        $report = $reporter->getReport();
        $report->printReport();
    }

}

ClientApp::main();