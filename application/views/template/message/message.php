<div class="pcoded-content">
                      <!-- Page-header start -->
                      <div class="page-header">
                          <div class="page-block">
                              <div class="row align-items-center">
                                  <div class="col-md-8">
                                      <div class="page-header-title">
                                          <h5 class="m-b-10">Dashboard</h5>
                                          <p class="m-b-0">Welcome to ChatRoom</p>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <ul class="breadcrumb-title">
                                          <li class="breadcrumb-item">
                                              <a href="<?=base_url();?>dashboard"> <i class="fa fa-home"></i> </a>
                                          </li>
                                          <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                                          </li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <!-- Page-header end -->
                        <div class="pcoded-inner-content">
                            <!-- Main-body start -->
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <!-- Page-body start -->
                                    <div class="page-body">
                                    <div class="content-body">
            <!-- Base style table -->
            <section id="base-style">
                <div class="row">
                    <div class="col-12">
                    <section id="main" class="bg-dark">
		<div id="chat_user_list">
			<div id="owner_profile_details">
				<div id="owner_avtar">
				<img src="<?=IMGS_URL.$_SESSION['MLogo']?>"  onerror="this.src='<?=base_url()?>images/noimg.png';"  style="width:100%;height:50px;border-radius:50%">
				<div>
						<div id="online"></div>
					</div>
				</div>
				<div id="owner_profile_text" class="">
					<h6 id="owner_profile_name" class="m-0 p-0"><?php echo $_SESSION['MName'];?></h6>
					<div id="bio">
						<p id="owner_profile_bio" class="m-0 p-0"></p>
						<i class="fa fa-edit" id="edit_icon"></i>
					</div>
				</div>
			</div>
			<div id="search_box_container" >
				<input type="text" name="txt_search" class="form-control" autocomplete="off" placeholder="Search User" id="search">
			</div>
			<hr/>
			<div id="user_list" >
			</div>
		</div>
		<div id="chatbox">
			<div id="data_container" class="">
				<div id="bg_image"></div>
				<h2 class="mt-0">Hi There! Welcome To</h2>
				<h2>Real-Time Chat with customers</h2>
				<!-- <p class="text-center my-2">Connect to your device via Internet. Remember that you <br> must have a stable Internet Connection for a<br> greater experience.</p> -->
			</div>
			<div class="chatting_section mt-2" id="chat_area" style="display: none">
				<div id="header" class="py-2">
					<div id="name_details" class="pt-2">
						<div id="chat_profile_image" class="mx-2" style="background-size: 100% 100%">
							<div id="online"></div>
						</div>
						<div id="cus_name">
							
						</div>
						<div id="name_last_seen">
							<h6 class="m-0 pb-2"></h6>
							<div id="send_mail">
							<a href="" id="mail_link"><i class="la la-envelope-o text-dark"></i></a>
							<a href="" id="tel_link"><i class="la la-phone-square text-primary"></i></a>
						   </div>
							<!-- <p class="m-0 py-1"></p> -->
						</div>
					</div>
					<div id="icons" class="px-4 pt-2">
						<!-- <div id="send_mail">
							<a href="" id="mail_link"><i class="la la-envelope-o text-dark"></i></a>
						</div> -->
						<div id="details_btn" class="ml-3">
							<i class="fa fa-info-circle text-dark"></i>
						</div>
					</div>
				</div>
				<div id="chat_message_area">

				</div>
				<div id="messageBar" class="py-4 px-4">
					<div id="textBox_attachment_emoji_container">
						<div id="text_box_message">
							<input type="text" maxlength = "200" name="txt_message" id="messageText" class="form-control" placeholder="Type your message">
						</div>
						<div id="text_counter">
							<p id="count_text" class="m-0 p-0"></p>
						</div>
					</div>
					<div id="sendButtonContainer">
						<button class="btn" id="send_message">
							<span class="material-icons">send</span>
						</button>
					</div>
				</div>
			</div>
		</div>
	
	</section>
	
                    </div>
                </div>
            </section>
            <!--/ Base style table -->

        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    <script src="<?=base_url();?>chat-assets/js/message/main.js"></script>