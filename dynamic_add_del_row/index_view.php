<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />        
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		
	 </head>

    <body>       
		<table id="myTable" style="border: 1px solid black">
		<tbody>
    <tr>
        <td>
            <input class="numbers" type="text" class="fname" />
        </td>
        <td>
            <input type="button" value="Delete" />
        </td>
    </tr>
    
	</tbody>
</table>
<p>
    <input type="button" value="Insert row">
</p>
<script type="text/javascript">
			$(document).ready(function(){		
				
				$('#myTable').on('click', 'input[type="button"]', function () {
    $(this).closest('tr').remove();
});
var id = 0;
$('p input[type="button"]').click(function () {
	id++;
    $('#myTable tbody').append('<tr><td><input type="text" class="numbers" value='+id+' class="fname" /></td><td><input type="button" value="Delete" /></td></tr>')
});       
			});
			$(".numbers").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl+A
            (e.keyCode == 65 && e.ctrlKey === true) ||
             // Allow: Ctrl+C
            (e.keyCode == 67 && e.ctrlKey === true) ||
             // Allow: Ctrl+X
            (e.keyCode == 88 && e.ctrlKey === true) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
		</script>
    </body>
</html>
