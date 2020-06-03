<?php
function createTable($result, $col, $row, $colNames){
    echo"<table>";
    echo"<tr>";
    for($i = 0; $i < $col; $i++): 
        echo"<th>" . $colNames[$i] . "</th>";
    endfor;
    echo"</tr>";
    for($i = 0; $i < $row; $i++):
        echo"<tr>";
        for($j = 0; $j < $col; $j++):
            echo"<td>". $result[$i][$j] . "</td>";
        endfor;
        echo"</tr>";
    endfor; 
    echo"</table>";
};
?>
