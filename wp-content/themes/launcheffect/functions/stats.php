<?php
/**
 * Functions: stats.php
 *
 * @package WordPress
 * @subpackage Launch_Effect
 *
 */
 
function build_le_stats_page() {
    
    if (!current_user_can('manage_options')) {
		wp_die( __('You do not have sufficient permissions to access this page.') );
    }

	$wordpressapi_db_version = "1.0";
	 
	global $wpdb;
	global $wordpressapi_db_version;
	
	// To Delete Rows
	// wpdbQuery("DELETE FROM wp_launcheffect WHERE id>'xxx'", query);

?>

<div class="wrap">

	<div id="stats-wrapper">
	
		<?php 
		
		$stats_table = $wpdb->prefix . 'launcheffect';
		
		if (isset($_GET['view'])) { 
			
			$view = $_GET['view'];
			
			$results = getDetail($stats_table, 'referred_by', $view);
			
			if (!$results) : ?>
		    	
			<?php lefx_tabs('stats'); ?>
			
			<div class="stats-header">
			<?php 
			$emails = getDetail($stats_table, 'code', $view); 
			foreach ($emails as $email) { 
				
				echo '<h3>' . $email->email . '</h3>'; 	
				
				if($email->referred_by != 'direct') { 
	
					echo '<br /><span class="refby">Signed Up Via: <a href="?page=lefx_stats&view=' . $email->referred_by . '">';
					
					$referred_by = $email->referred_by;
					$referrers = getDetail($stats_table, 'code', $referred_by);
					foreach ($referrers as $referrer) {
						echo $referrer->email; 
					}
				
					echo '</a></span>';
				}
			} ?>
			</div>
					    	
			<p>Nothing to see here yet. <a href="?page=lefx_stats">Return to previous page.</a></p>
			
			<?php else: ?>
		
			<?php lefx_tabs('stats'); ?>
			
			<a href="?page=lefx_stats" class="stats-back">&laquo; Back to Main</a>
			
			<div class="stats-header">
			<?php 
			$emails = getDetail($stats_table, 'code', $view); 
			foreach ($emails as $email) { 
				
				echo '<h3>' . $email->email . '</h3>'; 	
				
				if($email->referred_by != 'direct') { 
	
					echo '<br /><span class="refby">Signed Up Via: <a href="?page=lefx_stats&view=' . $email->referred_by . '">';
					
					$referred_by = $email->referred_by;
					$referrers = getDetail($stats_table, 'code', $referred_by);
					foreach ($referrers as $referrer) {
						echo $referrer->email; 
					}
				
					echo '</a></span>';
				}
			} ?>
			</div>
					
			<table id="individual">
				<thead>
					<th class="nosort">ID</th>
					<th class="nosort">Time</th>
					<th class="nosort">Converted To</th>
					<th class="nosort">IP</th>
				</thead>
				
				<?php foreach ($results as $result) : ?>
				
					<tr>
						<td><?php echo $result->id; ?></td>
						<td style="white-space:nowrap;"><?php echo $result->time; ?></td>
						<td><a href="?page=lefx_stats&view=<?php echo $result->code; ?>"><?php echo $result->email; ?></a></td>
						<td><?php echo $result->ip; ?></td>
					</tr>	
			
				<?php endforeach; ?>
			</table> 
		<?php endif;
		
		} else { 
		
		?>
	
		<?php lefx_tabs('stats'); ?>
		
		<ul class='subsubsub' style="float:none; border:none;">
			<li><a class="current" href="?page=lefx_stats">Stats</a> |</li>
			<li><a href="?page=lefx_export">Export as CSV</a></li>
		</ul>
	
		<table id="signups">
			<thead>
			
				<?php 
					if (isset($_GET['ad'])) { 
						$ad = mysql_real_escape_string($_GET['ad']);
						$ad = ($ad == 'desc') ? 'asc' : 'desc';	
					} else { $ad = 'desc'; }
				?>
			
				<th><a href="?page=lefx_stats&order=id&ad=<?php echo $ad; ?>">ID</a></th>
				<th><a href="?page=lefx_stats&order=time&ad=<?php echo $ad; ?>">Time</a></th>
				<th><a href="?page=lefx_stats&order=mail&ad=<?php echo $ad; ?>">Email</a></th>
				<th><a href="?page=lefx_stats&order=v&ad=<?php echo $ad; ?>">Visits</a></th>
				<th><a href="?page=lefx_stats&order=conv&ad=<?php echo $ad; ?>">Conversions</a></th>
				<th class="nosort">Conversion Rate</th>
				<th><a href="?page=lefx_stats&order=ip&ad=<?php echo $ad; ?>">IP</a></th>
				<?php if(lefx_version() == 'premium'):?> 
				<?php
					$custom_fields =array();
					for($i=0;$i<10;$i++)
					{
						$option = get_option("lefx_cust_field$i");
						if($option != '')
						{
						$custom_fields[$i] = $option;
						$field = "custom_field$i";
						?>
				<th><a href="?page=lefx_stats&order=<?php echo $field; ?>&ad=<?php echo $ad; ?>"><?php echo $option?></a></th>
						<?php 
						}
					}?>
				<?php endif; ?>
			</thead>
			
			<?php 
			
			// SET UP PAGINATION
			$totalcount = countData($stats_table, 'email');
			$numrows = $totalcount;
			
			$rowsperpage = 20;
			$totalpages = ceil($numrows / $rowsperpage);
			
			if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
				$currentpage = (int) $_GET['currentpage'];
			} else {
			  	$currentpage = 1;
			}
			
			if ($currentpage > $totalpages) {
				$currentpage = $totalpages;
			}
			
			if ($currentpage < 1) {
				$currentpage = 1;
			}
			
			$offset = ($currentpage - 1) * $rowsperpage;
			
			// GET DATA
			
			if (isset($_GET['order'])) { 
			
				$order = mysql_real_escape_string($_GET['order']);
				$ad = mysql_real_escape_string($_GET['ad']);
				
				switch ($order) {
					case 'id':
						$order_name = 'id';
						break;
					case 'time':
						$order_name = 'id';
						break;
					case 'mail':
						$order_name = 'email';
						break;
					case 'ip':
						$order_name = 'ip';
						break;
					case 'v':
						$order_name = 'visits';
						break;
					case 'conv':
						$order_name = 'conversions';
						break;
					default:
						$order_name = $order;
				}
				
				$results = getPaginatedData($stats_table, $order_name, $ad, $offset, $rowsperpage);
				
			} else {
				
				$order = 'time';
				$ad = 'desc';
				$results = getPaginatedData($stats_table, 'id', 'desc', $offset, $rowsperpage);
	
			}
			foreach ($results as $result) : 
			
			?>
			
			<tr>
				<td><?php echo $result->id; ?></td>
				<td style="white-space:nowrap;"><?php echo $result->time; ?></td>
				<td><a href="?page=lefx_stats&view=<?php echo $result->code; ?>"><?php echo $result->email; ?></a></td>
				<td><?php if($result->visits != 0) { echo $result->visits; }?></td>
				<td><?php if($result->conversions != 0) { echo $result->conversions; } ?></td>
				<td><?php if($result->visits + $result->conversions != 0 ) { $conversionRate = ($result->conversions/$result->visits) * 100; echo round($conversionRate, 2) . '%'; } ?></td>
				<td><?php echo $result->ip; ?></td>
				<?php
				if(isset($custom_fields))
					foreach($custom_fields as $k => $field):?>
						<td>
						<?php 	$field = "custom_field$k";
								echo $result->{$field};
						?>
						</td>
					<?php endforeach;?>
			</tr>	
		
			<?php endforeach;?>
			
		</table>
		
		<ul class="pagination">
			
			<?php 
			
			
			// BUILD PAGINATION
			$range = 8;
			
			if ($currentpage > 1) {	   
			   echo "<li><a href='?page=lefx_stats&order=$order&ad=$ad&currentpage=1'>&laquo; First</a></li>";	   
			   $prevpage = $currentpage - 1;
			   echo "<li><a href='?page=lefx_stats&order=$order&ad=$ad&currentpage=$prevpage' class='prev'>&lsaquo; Prev</a></li>";
			}
			
			for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
			   if (($x > 0) && ($x <= $totalpages)) { 
			      if ($x == $currentpage) {
			         echo "<li><a href=\"#\" class='currentpage'>$x</a></li>";     
			      } else {	         
			         echo "<li><a href='?page=lefx_stats&order=$order&ad=$ad&currentpage=$x'>$x</a></li>";
			      } 
			   } 
			}
			     
			if ($currentpage != $totalpages) {
			   $nextpage = $currentpage + 1;
			   echo "<li><a href='?page=lefx_stats&order=$order&ad=$ad&currentpage=$nextpage' class='next'>Next &rsaquo;</a></li>";
			   echo "<li><a href='?page=lefx_stats&order=$order&ad=$ad&currentpage=$totalpages'>Last &raquo;</a></li>";
			} 
				
			?>
		
		</ul>
		
	<?php } ?>
	
	</div>

</div>

<?php

	add_option("wordpressapi_db_version", $wordpressapi_db_version);
 
}

function build_le_export_page() {

	$wordpressapi_db_version = "1.0";
	 
	global $wpdb;
	global $wordpressapi_db_version;

	$dbhost  = DB_HOST;
	$dbname  = DB_NAME;
	$dbuser  = DB_USER;
	$dbpass  = DB_PASSWORD;
	
	mysql_connect($dbhost, $dbuser, $dbpass) or ("No bueno:" . mysql_error());
	mysql_select_db($dbname) or die("No bueno:" . mysql_error());
	
	function exportMysqlToCsv($table,$filename = 'export.csv') {
	
		$csv_terminated = "\n";
		$csv_separator = ",";
		$csv_enclosed = '"';
		$csv_escaped = "\\";
		$sql_query = "select * from $table";
	 
		// Gets the data from the database
		$result = mysql_query($sql_query);
		$fields_cnt = mysql_num_fields($result);
	 
		$schema_insert = '';
	 
		for ($i = 0; $i < $fields_cnt; $i++)
		{
			$l = $csv_enclosed . str_replace($csv_enclosed, $csv_escaped . $csv_enclosed,
				stripslashes(mysql_field_name($result, $i))) . $csv_enclosed;
			$schema_insert .= $l;
			$schema_insert .= $csv_separator;
		} // end for
	 
		$out = trim(substr($schema_insert, 0, -1));
		$out .= $csv_terminated;
	 
		// Format the data
		while ($row = mysql_fetch_array($result))
		{
			$schema_insert = '';
			for ($j = 0; $j < $fields_cnt; $j++)
			{
				if ($row[$j] == '0' || $row[$j] != '')
				{
	 
					if ($csv_enclosed == '')
					{
						$schema_insert .= $row[$j];
					} else
					{
						$schema_insert .= $csv_enclosed .
						str_replace($csv_enclosed, $csv_escaped . $csv_enclosed, $row[$j]) . $csv_enclosed;
					}
				} else
				{
					$schema_insert .= '';
				}
	 
				if ($j < $fields_cnt - 1)
				{
					$schema_insert .= $csv_separator;
				}
			} // end for
	 
			$out .= $schema_insert;
			$out .= $csv_terminated;
		} // end while
		
		echo $out;
	 
	} ?>
	
	<div class="wrap">
		
		<?php lefx_tabs('export'); ?>
		
		<ul class='subsubsub' style="float:none; border:none;">
			<li><a href="?page=lefx_stats">Stats</a> |</li>
			<li><a class="current" href="?page=lefx_export">Export as CSV</a></li>
		</ul>
		
		<div id="le-export">
	 		
		 	<h3>Save Your Stats Data as a CSV</h3>
		 	
			<p>Use this option if you'd like to save your stats data to your computer as an Excel-friendly file.</p>
		 	
		 	<form method="post" action="../wp-content/themes/launcheffect/functions/create-csv.php" id="csvform">
			 	<textarea name="csvexport" id="csvexport" style="display:none;"><?php exportMysqlToCsv($wpdb->prefix . 'launcheffect'); ?></textarea>
			 	<span class="submit export-button"><input type="submit" name="submit" value="<?php esc_attr_e('Export as CSV &rarr;'); ?>"/></span>
		 	</form>
	 	
	 	</div>
	
	</div>
 	
<?php

	add_option("wordpressapi_db_version", $wordpressapi_db_version);

}
?>