<?php
$page = $_REQUEST['page'];
switch($page){

case 1:
?>
<table border="1" width="500" height="500">
<tr>
<td align="center"><h2>This is page 1</h2></td>
</tr>
</table>
<?php
break;

case 2:
?>
<table border="1" width="500" height="500">
<tr><td align="center"><h3>This is page 2</h3></td></tr>
</table>
<?php
break;


case 3:
?>
<table border="1" width="500" height="500">
<tr><td align="center"><h4>This is page 3</h4></td>
</tr>
</table>
<?php
break;


default :
?>
<table border="1" width="500" height="500">
<tr>
<td align="center"><h2>This is page 10</h2></td>
</tr>
</table>
<?php
break;


}
?>