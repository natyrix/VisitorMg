<?php
if (isset($_SESSION['depart'])){
    include_once ("regheaddep.php");
}
else{
    $query=query("SELECT * FROM department");
    confirm($query);
    echo "<div id='form'>";
    echo "<form method='post'>";
    echo "<select name='Department'>";
    while ($row=fetch_array($query)){
        echo "<option value='{$row['Name']}'>{$row['Name']}</option>";
    }
    echo "</select>";
    if(isset($_SESSION['deperr'])){
        echo "<label style='color: red'>".$_SESSION['deperr']."</label>";
    }
    checkDep();
    echo "<input type='submit' name='submit' value='submit'  class='button'>";
    echo "</form>";
    echo "</div>";
}
