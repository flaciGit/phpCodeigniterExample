<div class="form-wrapper">
	<form id="dateform" method="post" action="calendar/createdate">

		<div class="row">
			<label for="title">Title</label>
			<input name="title" type="text"/>
		</div>
		<div class="row">
			<label for="description">Description</label>
			<input name="description" type="text"/>
		</div>
		<div class="row">
			<label for="start_date">Start Date</label>
			<input id="start_date" name="start_date" type="datetime-local"/>
		</div>
		<div class="row">
			<label for="end_date">End Date</label>
			<input id="end_date" name="end_date" type="datetime-local"/>
		</div>
		<div class="row">
			<label for="activity">Activity</label>
			<!--<input id="activity" name="activity" type="number"/>
-->
			<select name="activity">
				<option value="">PLEASE SELECT ONE ACTIVITY</option>
				<?php
				foreach($activities as $key => $value):
				echo '<option value="'.$value->id.'">'.$value->name.'</option>';
				endforeach;
				?>
			</select>

		</div>

		<div class="row">
			<input class="btn btn-danger" type="reset" value="Reset"/>
		</div>
		<div class="row">
			<input class="btn btn-success" type="submit" value="Submit"/>
		</div>
	</form>
</div>


<div class="table-responsive">
<?php

	if(isset($dates) && !empty($dates)){
		echo "<div class='title'>Date list:</div>";
		echo  "<table id='listtable' class='table'>
    		<thead>
    			<tr>
    				<td>Title</td>
    				<td>Description</td>
    				<td>Start Date</td>
    				<td>End Date</td>
    				<td>Activity</td>

					
    				<td>Delete</td>
    			</tr>
    		</thead>
    		<tbody>";

	
		foreach ($dates as $row) {
			echo "<tr>
    				<td>" . $row->title . "</td>
					<td>" . $row->description . "</td>
					<td>" . date('Y-m-d H:i', $row->start_date) . "</td>
					<td>" . date('Y-m-d H:i', $row->end_date) . "</td>
					<td>" .  $this->CalendarModel->getAvtivityById($row->activity_id) . "</td>


    				<td>" .
						anchor("pages/deletedate/".$row->id,"Delete",array('onclick' => "return confirm('Do you want delete this record')")) .
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