<?php 
if ($items_per_page < $total_items) 
			{
				echo "<table align = 'center' width='50%'><tr><td align='left' width='30%'>";
				if($back >=0) 
				{
					print "<a href='$page_name?start=$back'><font face='Verdana' size='2'>PREV</font></a>";
				}
				echo "</td><td align=center width='30%'>";
				$i=0;
				$l=1;
				for($i=0;$i < $total_items;$i=$i+$items_per_page){
				if($i != $start)
				{
					echo " <a href='$page_name?start=$i'><font face='Verdana' size='2'>$l</font></a> ";
				}
				else 
				{ 
					echo "<font size='4' color='#343a40'>$l</font>";} //Current page is not displayed as link and given font color red
					$l=$l+1;
				}
				echo "</td><td align='right' width='30%'>";
				if($this1 < $total_items) 
				{
					print "<a href='$page_name?start=$next'><font face='Verdana' size='2'>NEXT</font></a>";
				}
				echo "</td></tr></table>";
			}
 ?>
