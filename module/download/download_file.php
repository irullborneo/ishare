<?php
	$sql=mysql_query("SELECT * FROM file WHERE id='$id[1]' AND code='$id[0]'");
	$cekdata=mysql_num_rows($sql);
	if($cekdata==1){
	$data=mysql_fetch_array($sql);
?>
<div class="row" style="margin-top: 100px">
	<div class="col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1">
		<div class="panel panel-primary">
			<div class="panel-heading">
			DOWNLOAD FILE
			</div>
			<div class="panel-body">
			<h4><?php echo $data['name_file'];?></h4>
				<div class="row">
					<div class="col-xs-4">
						<img src="<?php echo getIconDetail($data['id_type']) ?>" style="width: 100%; height: auto;" />
					</div>
					<div class="col-xs-8">
						<table border="1">
							<tr>
								<td style="font-weight: bold; width: 50%">Type</td>
								<td style="width: 50%">.<?php echo getTypeFile($data['id_type']) ?></td>
							</tr>
							<tr>
								<td style="font-weight: bold">Size</td>
								<td><?php echo getSizeFile($data['id']) ?></td>
							</tr>
							<tr>
								<td style="font-weight: bold">Download Date</td>
								<td><?php echo $data['date_download'] ?></td>
							</tr>
							<tr>
								<td style="font-weight: bold">Download By</td>
								<td><?php echo getUsers($data['download_by'],"name") ?></td>
							</tr>
						</table>
					</div>
				</div>
			</div>
			<div class="panel-footer">
			<a target="_blank" href="./?download=url&id=<?php echo $data['code']."-".$data['id']; ?>" class="btn btn-primary btn-lg btn-block"><span class="glyphicon glyphicon-download"></span> Download</a>
			</div>
		</div>
	</div>
</div>
<?php
	}
	else{
?>
<div class="row" style="margin-top: 100px">
	<div class="col-sm-4 col-sm-offset-4 col-xs-10 col-xs-offset-1">
		<div class="panel panel-primary">
			<div class="panel-heading">
			DOWNLOAD FILE
			</div>
			<div class="panel-body">
				<div class="alert alert-warning"><span class="glyphicon glyphicon-warning-sign"> </span> <b>FILE NOT FOUND</b></div>
			</div>
		</div>
	</div>
</div>
<?php
	}
?>