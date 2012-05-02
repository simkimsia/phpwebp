<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=8" />
        <title></title>

        <style type="text/css">
        /**********************\
         * MOZILLA FIREFOX STYLE
        \**********************/
        /*pre{font-family:Tahoma;font-size:px;}*/
        .tagName{color:purple;}
        .tagAttribute{color:red;}
        .tagValue{color:blue;}
        .HTMLComment{font-style:italic;color:green;}

#table{
display: table;
}
#row {
    display: table-row;
}
#cell{
    display: table-cell;
    border: 1px black solid;
    padding: 10px;
}

table#chosen
{
border-collapse:collapse;
}
table#chosen, table#chosen th, table#chosen td
{
border: 1px solid black;
}







        </style>
    </head>
    <body>

        <?php
            /*************************************\
             CODE PANE 1.0 - SILVERWINGS - D. Suissa
            \*************************************/

            class HTMLcolorizer{
                private $pointer = 0; //Cursor position.
                private $content = null; //content of document.
                private $colorized = null;
                function __construct($content){
                    $this->content = $content;
                }
                function colorComment($position){
                    $buffer = "&lt;<span class='HTMLComment'>";
                    for($position+=1;$position < strlen($this->content) && $this->content[$position] != ">" ;$position++){
                        $buffer.= $this->content[$position];
                    }
                    $buffer .= "</span>&gt;";
                    $this->colorized .= $buffer;
                    return $position;
                }
                function colorTag($position){
                    $buffer = "&lt;<span class='tagName'>";
                    $coloredTagName = false;
                    //As long as we're in the tag scope
                    for($position+=1;$position < strlen($this->content) && $this->content[$position] != ">" ;$position++){
                        if($this->content[$position] == " " && !$coloredTagName){
                            $coloredTagName = true;
                            $buffer.="</span>";
                        }else if($this->content[$position] != " " && $coloredTagName){
                            //Expect attribute
                            $attribute = "";
                            //While we're in the tag
                            for(;$position < strlen($this->content) && $this->content[$position] != ">" ;$position++){
                                if($this->content[$position] != "="){
                                    $attribute .= $this->content[$position];
                                }else{
                                    $value="";
                                    $buffer .= "<span class='tagAttribute'>".$attribute."</span>=";
                                    $attribute = ""; //initialize it
                                    $inQuote = false;
                                    $QuoteType = null;
                                    for($position+=1;$position < strlen($this->content) && $this->content[$position] != ">" && $this->content[$position] != " "  ;$position++){
                                        if($this->content[$position] == '"' || $this->content[$position] == "'"){
                                            $inQuote = true;
                                            $QuoteType = $this->content[$position];
                                            $value.=$QuoteType;
                                            //Read Until next quotation mark.
                                            for($position+=1;$position < strlen($this->content) && $this->content[$position] != ">" && $this->content[$position] != $QuoteType  ;$position++){
                                                $value .= $this->content[$position];
                                            }
                                            $value.=$QuoteType;
                                        }else{//No Quotation marks.
                                            $value .= $this->content[$position];
                                        }
                                    }
                                    $buffer .= "<span class='tagValue'>".$value."</span>";
                                    break;
                                }

                            }
                            if($attribute != ""){$buffer.="<span class='tagAttribute'>".$attribute."</span>";}
                        }
                        if($this->content[$position] == ">" ){break;}else{$buffer.= $this->content[$position];}

                    }
                    //In case there were no attributes.
                    if($this->content[$position] == ">" && !$coloredTagName){
                        $buffer.="</span>&gt;";
                        $position++;
                    }
                    $this->colorized .= $buffer;
                    return --$position;
                }
                function colorize(){
                    $this->colorized="";
                    $inTag = false;
                    for($pointer = 0;$pointer<strlen($this->content);$pointer++){
                        $thisChar = $this->content[$pointer];
                        $nextChar = $this->content[$pointer+1];
                        if($thisChar == "<"){
                            if($nextChar == "!"){
                                $pointer = $this->colorComment($pointer);
                            }else if($nextChar == "?"){
                                //colorPHP();
                            }else{
                                $pointer = $this->colorTag($pointer);
                            }
                        }else{
                            $this->colorized .= $this->content[$pointer];
                        }
                    }
                    return $this->colorized;
                }
            }

            function colorSyntaxHTML($html) {
                $HTMLinspector = new HTMLcolorizer($html);
                $document = $HTMLinspector->colorize();
                echo  "<pre>" . $document . "</pre>";
            }

            function goBackToTop() {
                echo '<a href="#0">Back to Top</a>';
            }

            ?>


        <a name="0"></a>
        <p>How arrays are used</p>

        <div id="table">

            <div id="row">

                <div id="cell" style="text-align: center">PHP</div>
                
                <div id="cell" style="text-align: center">Description</div>
            </div>
            <div id="row">
                <div id="cell">
                    <?php $code = '
<?php 
	
	$funnyArray = array();
				
?>';
				
				highlight_string($code);
                    ?>
            
                    
                </div>
                
                <div id="cell">
                    
                    This is an empty array. Note the use of round brackets
                    
                </div>
            </div>
            <div id="row">
                <div id="cell">
                    <?php $code = '
<?php
	$arrayOf1Element = array(\'happy\');
?>
';
                    highlight_string($code);
                    ?>
                </div>
                <div id="cell">
                    
                    This array contains 1 element.<br />
					The element is a string with the value of 'happy'<br />
                    
                    
                </div>
            </div>
               
            <div id="row">
                <div id="cell">
                    <?php $code = '
<?php
	$arrayOf2Elements = array(
							\'happy\', 
							2
						);
?>
';
                    highlight_string($code);
                    ?>
                </div>
                <div id="cell">

                    This array contains 2 element.<br />
					The elements are a string with the value of 'happy' and a integer with value 2<br />


                </div>
            </div>

            <div id="row">
                <div id="cell">
                    <?php $code = '
<?php
	$arrayOf3Elements = array(
							\'haha\', 
							XXX, 
							XXX
						);
?>
';
                    highlight_string($code);
                    ?>
                </div>
                <div id="cell">

                    This array contains 3 elements.<br />
					The elements are <br />
					a string with the value of 'haha', <br />
					an integer with value 7 and <br />
					an empty array<br />


                </div>
            </div>

            <div id="row">
                <div id="cell">
                    <?php $code = '
<?php
	count($arrayOf3Elements) // this gives us back 3
	echo count($arrayOf3Elements) // this will echo the number 3
?>
';
                    highlight_string($code);
                    ?>
                </div>
                <div id="cell">

                    we use the function count to find out the number of elements. See <a href="http://sg.php.net/manual/en/function.count.php">sg.PHP.net</a>


                </div>
            </div>

            <div id="row">
                <div id="cell">
                    <?php $code = '
<?php
	sqrt(9) // get back 3
	sqrt(4) // get back 2
	sqrt(5) // get back 2.2360679774998
	ceil(2.2360679774998) // get back 3
	floor(2.2360679774998) // get back 2
?>
';
                    highlight_string($code);
                    ?>
                </div>
                <div id="cell">

                    useful math functions:<br />
					sqrt means square root<br />
					ceil stands for ceiling as in round up<br />
					floor stands for floor as in round down<br />
					See <a href="http://sg.php.net">sg.php.net</a> about <br/>
					<a href="http://sg.php.net/manual/en/function.sqrt.php">sqrt</a>
					<a href="http://sg.php.net/manual/en/function.ceil.php">ceil</a>
					<a href="http://sg.php.net/manual/en/function.floor.php">floor</a>

                </div>
            </div>
            

            <div id="row">
                <div id="cell">
                    <?php $code = '
<?php
	$inputString = \'now,i,have,a,string\'; // this is what i have
	$outputArray = explode(",", $inputString);

?>
';
                    highlight_string($code);
                    ?>
                </div>
                <div id="cell">

                    explode is to explode a string into smaller pieces<br />
					explode returns an array of the smaller pieces<br />
					explode requires to take in at least 2 input<br />
					first input is the delimiter -- how we explode the string<br />
					2nd input is the actual string to be exploded<br />
					See <a href="http://sg.php.net">sg.php.net</a> about <br/>
					<a href="http://sg.php.net/manual/en/function.explode.php">explode</a> <br />
					Now $outputArray becomes

					<?php $code = '
<?php 
	array(
		\'now\',
		\'i\',
		\'have\',
		\'a\',
		\'string\'
		);
					
?>'
					;
					highlight_string($code);
					?>

                </div>
            </div>

            <div id="row">
                <div id="cell">
                    <?php $code = '
<?php
	$inputArray = array(
		\'now\',
		\'i\',
		\'have\',
		\'a\',
		\'string\'
		); // this is what I have
	$outputString = implode(" ", $inputArray);

?>
';
                    highlight_string($code);
                    ?>
                </div>
                <div id="cell">

                    implode is the opposite of explode.
 					implode is to take an array of smaller strings and glue back into a longer 
string<br />
					implode returns a string<br />
					implode requires to take in at least 2 input<br />
					first input is the glue -- how we join back the smaller strings<br />
					2nd input is the actual array of strings <br />
					See <a href="http://sg.php.net">sg.php.net</a> about <br/>
					<a href="http://sg.php.net/manual/en/function.implode.php">implode</a> <br />
					Now $outputString becomes

					<?php $code = '
<?php 
	\'now i have a string\'

?>'
					;
					highlight_string($code);
					?>

                </div>
            </div>



        </div>

    </body>
</html>
