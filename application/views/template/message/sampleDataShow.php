<?php
$count = count($data);
for ($i=0; $i < $count ; $i++) {

	if($data[$i]['is_deleted'] == 'NOT_DELETED'){
		?>
			<div class='innerBox'>
					<div class='user px-3 py-2'>
						<div id='avtar_and_details' class=''>
							<div id='user_avtar' style="background-image: url('assets/photo/<?php echo $data[$i]['photo'];?>'); background-size: 100% 100%;">
                            <?php if($data[$i]['photo']!=''){?>
                            <img src="<?php echo IMGS_URL.$data[$i]['photo'];?>"   alt="" style="height:50px ;border-radius:50%">
								<?php }else{?>
                                    <img src="<?=base_url()?>images/noimg.png"  alt="" style="height:50px ;border-radius:50%">
                                <?php }?>
								<input type='hidden' name='hdn' id='hidden_id' value="<?php echo $data[$i]['id'];?>">
							</div>
							<div id='user_details' class='px-2'>
								<h6 class='m-0' id='name'><?php echo $data[$i]['name']?></h6>
								<p class='m-0' id="title">
									<?php
										$output = "";
										for($j = 0; $j < count($last_msg); $j++){
											if($data[$i]['id'] == $last_msg[$j]['sender_id']){

												$output = ($last_msg[$j]['message']);

											}elseif($data[$i]['id'] == $last_msg[$j]['receiver_id']){

												$output = "You : ".$last_msg[$j]['message'];
												
											}else{
												// $output = "No message yet..";
												
											}
										}
										if(strlen($output) > 20){
											echo substr($output,0,20)."...";
										}else{
											echo $output;
										}
									?>
								</p>
							</div>
						</div>
						<div>
							<p id="time">
							<?php
								$messageTime = "";
								for($j = 0; $j < count($last_msg); $j++){
									if($data[$i]['id'] == $last_msg[$j]['sender_id'] || $data[$i]['id'] == $last_msg[$j]['receiver_id']){
										$messageTime = $last_msg[$j]['time'];
									}
								}
								echo $messageTime;
							?>
							</p>
						</div>
					</div>
				</div>
		<?php
	}else{
		?>
		<div class='innerBox'>
					<div class='user px-3 py-2'>
						<div id='avtar_and_details' class=''>
							<div id='user_avtar' style="background-image: url('../upload/<?php echo $data[$i]['user_avtar'];?>'); background-size: 100% 100%;">
								<input type='hidden' name='hdn' id='hidden_id' value="<?php echo $data[$i]['unique_id'];?>">
							</div>
							<div id='user_details' class='px-2'>
								<h6 class='m-0' id='name'><?php echo $data[$i]['user_fname']." ".$data[$i]['user_lname']?></h6>
								<p class='m-0' id="message">
								<?php
										$output = "";
										for($j = 0; $j < count($last_msg); $j++){
											
											if($data[$i]['unique_id'] == $last_msg[$j]['sender_id']){

												$output = $last_msg[$j]['message'];

											}elseif($data[$i]['unique_id'] == $last_msg[$j]['receiver_id']){

												$output = "You : ".$last_msg[$j]['message'];
												
											}else{
												// $output = "No message yet..";
												
											}
											
										}
										if(strlen($output) > 20){
											echo substr($output,0,20)."...";
										}else{
											echo $output;
										}
										
									?>
								</p>
							</div>
						</div>
						<div>
							<p id="time">
							<?php

								$messageTime = "";
								for($j = 0; $j < count($last_msg); $j++){
									if($data[$i]['unique_id'] == $last_msg[$j]['sender_id'] || $data[$i]['unique_id'] == $last_msg[$j]['receiver_id']){

										$messageTime = $last_msg[$j]['time'];

									}
								}
								echo $messageTime;
							?>
							</p>
						</div>
					</div>
				</div>
		<?php
	}
}
	?>