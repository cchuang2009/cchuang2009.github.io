<?Php 
$myFile = "upload/participants.html";

$fh = fopen($myFile, 'w') or die("can't open file");

$R="<html>\n";
$R=$R.'<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
$R=$R."<link rel=\"stylesheet\" href=\"css/pure-min.css\">\n";
$R=$R."<body>\n<div align=\"center\">\n";
//echo "<table border=1>";
$f = fopen("upload/register.csv", "r");
//$f = fopen($_FILES['file']['tmp_name'], "r");
$fr = fread($f, filesize("upload/register.csv"));
fclose($f);
$lines = array();
$lines = explode("\n",$fr); // IMPORTANT the delimiter here just the "new line" \r\n, use what u need instead of... 
$R=$R."<div align=\"center\"><h1>SS2014 Participants</h1></div>\n";
$R=$R."<table class=\"pure-table\">\n<thead>\n<tr><th></th><th>Last Name</th><th>First Name</th><th>Affiliation</th><th>Position</th></tr>\n</thead>\n<tbody>\n";
for($i=1;$i<count($lines);$i++)
{
    if ($i%2==0)
       {$R=$R."<tr class=\"pure-table-odd\">";}
    else {$R=$R."<tr>";}  
    $cells = array(); 
    $cells = explode(",",$lines[$i]); // use the cell/row delimiter what u need!
    //for($k=0;$k<count($cells);$k++)
    //{
    //   echo "<td>".$cells[$k]."</td>";
    $i2=$i;
    $R=$R."<td>".$i2."</td>"."<td>".$cells[3]."</td>"."<td>".$cells[2]."</td>"."<td>".$cells[6]."</td>"."<td>".$cells[4]."</td>";
    //echo $Rstring;
    $R=$R."</tr>\n";
    //}
    // for k end
    //$R=$R."</tr>\n";
}
// for i end
//echo "</tbody></table>\n</div>\n</body>\n</html>\n";
$R=$R."</tbody></table>\n";
$time=date("Y-m-d")." Updated";
$R=$R.'<div align="center">'.$time.'</div>';
$R=$R."</div>\n</body>\n</html>\n";
echo $R;
fwrite($fh, $R);
fclose($fh);
?> 