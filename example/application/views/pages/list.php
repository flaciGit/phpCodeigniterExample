<div class="table-responsive">
<?php

	if(isset($users) && !empty($users)){
		echo "<div class='title'>User list:</div>";
		echo  "<table id='listtable' class='table'>
    		<thead>
    			<tr>
    				<td>Name</td>
    				<td>Username</td>
					<td>E-mail</td>
					
    				<td>Delete</td>
					<td>Edit</td>
    			</tr>
    		</thead>
    		<tbody>";

	
		foreach ($users as $row) {
			echo "<tr>
    				<td>" . $row->name . "</td>
					<td>" . $row->username . "</td>
					<td>" . $row->email . "</td>

    				<td>" .
						anchor("users/delete/".$row->id,"Delete",array('onclick' => "return confirm('Do you want delete this record')")) .
						"</td>" . 
					"<td>" .
						"<a href='". base_url('users/update/'.$row->id) . "'>Edit</a>" . 
						"</td>" . 
    			"</tr>";
		}

		echo "</tbody>
    	</table>";
	}
	else
		echo "NO DATA FOUND";

?>
</div>