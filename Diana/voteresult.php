<?php
require 'adminpanel/config/db_function.php';

$vote=getLastVoteQuestion();
$choices=getVoteChoices($vote["id"]);
$total=0;
for($i=0;$i<sizeof($choices);$i++){
    $total+=$choices[$i]['count'];
}
//$total=getChoicesTotal($vote["id"]);
?>


<?php

//$rs=mysql_query("select question,id from votequestion order by id desc limit 1");//هات آخر تصويت
	//if(list($question,$qid)=mysql_fetch_array($rs)){
?>
<!DOCTYPE html>

<!-- paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/ -->
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8" />

  <!-- Set the viewport width to device width for mobile -->
  <meta name="viewport" content="width=device-width" />

  <title>Welcome to Foundation</title>
  
  <!-- Included CSS Files (Uncompressed) -->
  <!--
  <link rel="stylesheet" href="stylesheets/foundation.css">
  -->
  
  <!-- Included CSS Files (Compressed) -->
  <link rel="stylesheet" href="stylesheets/foundation.min.css">
  <link rel="stylesheet" href="stylesheets/app.css">

  <script src="javascripts/modernizr.foundation.js"></script>

  <!-- IE Fix for HTML5 Tags -->
  <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
  <![endif]-->

</head>
<body>

  <div class="row">
    <div class="twelve columns">
      <h2>PHP Course</h2>
      <p>Simple website</p>
      <hr />
    </div>
  </div>

  <div class="row">
    <div class="eight columns">
<table width="100%" border="0">
  <tr>
    <td><?php echo $vote["question"]; ?></td>
  </tr>

  <tr>
    <td><table width="100%" border="0" cellspacing="0">
      <tr>
        <td width="34%" bgcolor="#FF9900">Option</td>
        <td width="14%" bgcolor="#FF9900"># of votes</td>
        <td width="12%" bgcolor="#FF9900">Precentage %</td>
      </tr>
	  <?
	  	//$sql="select id,choice,count from votechoice where questionid=$qid";
		//echo $sql;
	  	//$rs=mysql_query($sql);$i=0;
		//$total=getTotalCount($qid);
		//while(list($id,$choice,$count)=mysql_fetch_array($rs)){
	  ?>
      
        <?php
            foreach($choices as $onechoice){
        ?> 
        <tr>
          
          
        <td><?php echo $onechoice["choice"]; ?></td>
        <td><?php echo $onechoice["count"];  ?></td>
        <td><?php echo round($onechoice["count"]/$total*100,2)." %" ?></td>
      </tr>
        
        <?php
            }
        ?>
	  <?
	  	}
	  ?>
    </table></td>
  </tr>
</table>
      </div>
    </div>
  
</body>
</html>
