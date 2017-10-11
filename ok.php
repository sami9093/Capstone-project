<!DOCTYPE html>
<link rel="stylesheet" href="style.css" />
<html>
<head>
    <title>ok</title>
</head>
<body>
    <img class="irc_mi" src="http://ccojubilee.org/am-site/media/larochelogoweb.png" alt="Image result for laroche logo" onload="typeof google==='object'&amp;&amp;google.aft&amp;&amp;google.aft(this)" width="304" height="134" style="margin-top: 100px;">
<form  method="post" action="ok.php">
<input type="hidden" name="submitted" value="true" />
<h3> <center>La Roche College
<br> Department of Chemistry
    <br> Course Assessment Form</center></h3>

<label>
  <center>  choose a course: 
<select id='' name="coursecode"  style="width: 170px" onchange="this.form.submit()">
<option value="chose course">chose course</option>
<option value="Chemistry">Chemistry</option>
    <option value="Math">Math</option>
    </select>
    </center>
    </label>

    <noscript><input type="submit" value ="Submit"></noscript>
    
<br>
</form>
<?php

if(isset($_POST["submitted"])){
   
include('phpconnect2.php');
$coursecode = $_POST["coursecode"];
$CourseSec = 'CourseSec';
$query = "SELECT * FROM coursetable WHERE '$coursecode' = $CourseSec";    
$result = mysqli_query($conn, $query) or die("error: $query");
while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
    
    echo"<br>CourseSec: ";
    echo"<input id='' type='text'  name='CourseSec' value={$row['CourseSec']} size='30' />";
    
    echo"<label id=s>Course Title: </label>";
    echo"<input type='text'  name='Course Title' value={$row['Course Title']} size='30' />";
    
    echo"<br>Semester: ";
    echo"<input id='' type='text'  name='semester' value={$row['Semester']} size='31' />";
    
    echo"<label id=s>Instructor  : </label>";
      echo "<input type='text' id='' name='Instructor' value={$row['Instructor']} size='32' />";
}
}
?>
    <?php
    
    if (isset($_POST['submitted2'])){
        
    include('phpconnect2.php');
        
    $SLOID = $_POST['SLOID'];
    $Knowledge_Base = $_POST['Knowledge_Base'];
    $Lab_Skills = $_POST['Lab_Skills'];
    $Practice = $_POST['Practice'];
    $Societal_connactions = $_POST['Societal_connactions'];
    $Capstone = $_POST['Capstone'];
    $sqlinsert = "INSERT INTO test (SLOID, Knowledge_Base, Lab_Skills, Practice, Societal_connactions, Capstone) VALUES ('$SLOID', '$Knowledge_Base', '$Lab_Skills', '$Practice', '$Societal_connactions', '$Capstone')";
     
        if(!mysqli_query($conn,$sqlinsert)){
            die('error inserting');
        }
    }
    ?>
    <form action="ok.php" method="post">
    <input type="hidden" name="submitted2" value="true" />
    <fieldset>
    <legend>Student Learning Outcomes (SLOs) addressed in this course (Please input Yes or No):</legend>
        <label>SLOID: <input type = text name = "SLOID" /></label>
        <label>Knowledge_Base: <input type = text name = "Knowledge_Base" /></label>
        <label>Lab_Skills: <input type = text name = "Lab_Skills" /></label><br>
        <label>Practice: <input type = text name = "Practice" /></label>
        <label>Societal_Connects: <input type = text name = "Societal_connactions" /></label>
        <label>Capstone: <input type = text name = "Capstone" /></label>
    </fieldset>
    <input type= "submit" value="Update SLO" />
    
    
    </body>
</html>