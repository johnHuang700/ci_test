<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;    
}
</style>
</head>
<body>
<h1><?=$locationName?>三十六小時天氣預報</h1>
<table style="width:100%">
<tr>
<th>time</th>
    <?php foreach($weatherElement as $value){
            echo '<th>'.$value['elementName'].'</th>';
    }?>
  </tr>
<tr>
  <td>
    <?=$weatherElement[0]['time'][0]['startTime']?>
    <br>
    到
    <br>
    <?=$weatherElement[0]['time'][0]['endTime']?>
  </td>
  <?php foreach($weatherElement as $value){
            echo '<td>';
            echo $value['time'][0]['parameter']['parameterName'];
            echo '</td>';
  }?>
</tr>
<tr>
  <td>
    <?=$weatherElement[0]['time'][1]['startTime']?>
    <br>
    到
    <br>
    <?=$weatherElement[0]['time'][1]['endTime']?>
  </td>
   <?php foreach($weatherElement as $value){
            echo '<td>';
            echo $value['time'][1]['parameter']['parameterName'];
            echo '</td>';
  }?>
</tr>
<tr>
  <td>
    <?=$weatherElement[0]['time'][2]['startTime']?>
    <br>
    到
    <br>
    <?=$weatherElement[0]['time'][2]['endTime']?>
  </td>
  <?php foreach($weatherElement as $value){
            echo '<td>';
            echo $value['time'][2]['parameter']['parameterName'];
            echo '</td>';
  }?>

</tr>

</table>
</body>
</html>
