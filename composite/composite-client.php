<!DOCTYPE html>
<?php require_once 'compositepattern.php'; ?>
<html>
    <head>
        <title></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="Sourcerer-1.2.css" />
        <script src="jquery-1.7.1.min.js" type="text/javascript"></script>
        <script src="Sourcerer-1.2.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function(){
 
                $('.mycode').sourcerer('html');
 
            });    
        </script>
    </head>
    <body>
        <pre class="mycode">
            <?php
            $root = new Div();
            $root->setInnerHtml('The Root Div');
            $root->addNode(new Div());
            $root->addNode(new Div());

            $span1 = new Span();
            $br1 = new Br();

            $span1->addNode(new Div());
            $span1->addNode(new Br());

            $root->addNode($span1);

            $root->display();
            ?>
        </pre>
    </body>
</html>
