<?php


 
foreach ($result2 as $key => $value) {
?>
<div class="test" style="background-color: red; width: 200px;">
<?php
echo '<br>id: ' . $value ['ID'];
echo '<br>productnaam: ' . $value ['productnaam'];
echo '<br>prijs: ' . $value ['prijs'];
}
?>
</div>