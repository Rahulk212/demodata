
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <div id="wrapper">
		<div class="wrap_box">
			<?php
			if($list->num_rows() > 0){
				?>
				<table>
					<tr>
						<td>
							<select onchange="selectState(this.options[this.selectedIndex].value)">
								<option value="">Select country</option>
								<?php
								foreach($list->result() as $listElement){
									?>
									<option value="<?php echo $listElement->id?>"><?php echo $listElement->country_name?></option>
									<?php
								}
								?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<select id="state_dropdown" onchange="selectCity(this.options[this.selectedIndex].value)">
								<option value="">Select state</option>
							</select>
							<span id="state_loader"></span>
						</td>
					</tr>
					
					<tr>
						<td>
							<select id="city_dropdown">
								<option value="-1">Select city</option>
							</select>
							<span id="city_loader"></span>
						</td>
					</tr>
				</table>
				<?php
			}else{
				echo 'No Country Name Found';
			}
			?>
				
		</div>
    </div>

    <script>
	function selectState(country_id){
	if(country_id!=""){
		loadData('state',country_id);
		$("#city_dropdown").html("<option value='-1'>Select city</option>");	
	}else{
		$("#state_dropdown").html("<option value='-1'>Select state</option>");
		$("#city_dropdown").html("<option value='-1'>Select city</option>");		
	}
}

function selectCity(state_id){
	if(state_id!=""){
		loadData('city',state_id);
	}else{
		$("#city_dropdown").html("<option value='-1'>Select city</option>");		
	}
}
function loadData(loadType,loadId){
	var dataString = 'loadType='+ loadType +'&loadId='+ loadId;
	/* $("#"+loadType+"_loader").show();
    $("#"+loadType+"_loader").fadeIn(400).html('Please wait... <img src="image/loading.gif" />'); */
	$.ajax({
		type: "POST",
		url: "controller/loadData",
		data: dataString,
		cache: false,
		success: function(result){
			/* $("#"+loadType+"_loader").hide(); */
			$("#"+loadType+"_dropdown").html("<option value='-1'>Select "+loadType+"</option>");  
			$("#"+loadType+"_dropdown").append(result);  
		}
	});
}
	</script>
