<?php
	include "config/koneksi.php";
	include "config/tgl.php";
	include "config/fungsi.php";
	session_start();
?>
<script type="text/javascript">
  $(document).ready(function(e){
    var donut = new Morris.Donut({
      element: 'sales-chart',
      resize: true,
      colors: [
      <?
      	$sql=mysql_query("SELECT color FROM file_type WHERE id_type NOT LIKE '1' ORDER BY id_type DESC");
      	while($color=mysql_fetch_array($sql)){
      		echo "\"$color[0]\",";
      	}
      	echo "\"#737373\"";
      ?>
      ],
      data: [
      <?
      	$sql=mysql_query("SELECT type, id_type FROM file_type WHERE id_type NOT LIKE '1' ORDER BY id_type DESC");
      	while($color=mysql_fetch_array($sql)){
      		echo "{label: \"$color[0]\", value: ".getBanyakFile($color[1],$_SESSION['id_user'])."},";
      	}
      	echo "{label: \"Free Space\", value: ".getFreeSpace($_SESSION['id_user'])."}";
      ?>
      ],
      hideHover: 'auto'
    });
  })
</script>
<strong>Storage Capacity: 500MB</strong>
    <div class="chart" id="sales-chart" style="height: 200px; position: relative;"></div>
    <strong>FILE</strong><br />
<Ul class='list-group'>
	<?php
		$sql=mysql_query("SELECT * FROM file_type ORDER BY id_type ASC");
		while($data=mysql_fetch_array($sql)){
			echo "<li class='list-group-item'>$data[type] : ".getItems($data['id_type'],$_SESSION['id_user'])." Items</li>";
		}
	?>
	
</Ul>