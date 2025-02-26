<?php

include('dbcalls/conn.php')

?>
<form action="dbcalls/create.php" method="post">
    <input type="text" name="productnaam" />
    
    <select name="soep">
<option value="groenten">groenten</option>
<option value="tomaat">tomaat</option>
<option value="chinese tomaten">chinese tomaten</option>

<input type="checkbox" name="check" />
<input type="number" name="number" />
    </select>
    <input type="submit" />

</form>