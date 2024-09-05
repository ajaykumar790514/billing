$(document).ready(function () {
	var oldDate, newDate, days, hours, min, sec, unique_id, bg_image, inter, inter3, inter2,
		chatBox = document.getElementById('chat_message_area'),
		main = document.getElementById('main'),
		owenerProfileBio = document.getElementById('owner_profile_bio'),
		dob, phone, addr, bio;


	//Main funtion which will run at the time of page load
	//UserSidebarIn
	function barIn() {
		$('#details_of_user').css('width', '20%');
		$('#chatbox').css('width', '55%');
		$('#details_of_user').children().show();
	}
	//UserSidebarOut
	function barOut() {
		$('#details_of_user').children().hide();
		$('#details_of_user').css('width', '0');
		$('#chatbox').css('width', '75%');
	}

	//getting all user list except me
	function getUserList() {
		return new Promise(function (resolve, reject) { //Creating new Promise Chain
			$.ajax({
				url: 'admin-allUser/allUser',
				type: 'get',
				async: false,
				success: function (data) {
					if (data != "") {
						resolve(data);
					}
				}
			})
		}).then(function (data) { //This function setting the user list
			document.getElementById('user_list').innerHTML = data; //setting data to the user list
			$.get('admin-ownerDetails/ownerDetails', function (data) {
				jsonData = JSON.parse(data);
				dob = jsonData[0]['dob'];
				phone = jsonData[0]['phone'];
				addr = jsonData[0]['address'];
				bio = jsonData[0]['bio'];
				if (dob.length != 0 && addr.length != 0 && phone.length != 0 && bio.length != 0) {
					owenerProfileBio.classList.remove('text-warning');
					owenerProfileBio.innerHTML = (bio.length > 28) ? bio.slice(0, 28) + "..." : bio;
				} else {
					owenerProfileBio.innerHTML = "Profile isn't completed";
					owenerProfileBio.classList.add('text-warning');
				}
			})
			$('.innerBox').click(function () {

				barIn();
				$('.chatting_section').css('display', '');

				unique_id = $(this).find('#user_avtar').children('#hidden_id').val();
				bg_image = $(this).find('#user_avtar').css('background-image').split('"')[1];
				clearInterval(inter);
				clearInterval(inter3);

				// getBlockUserData();
				// setInterval(getBlockUserData, 100);

				getUserDetails(unique_id);
				inter2 = setInterval(getUserList, 3000);
				inter3 = setInterval(function () {
					getUserDetails(unique_id)
				}, 3000);
				sendUserUniqIDForMsg(unique_id, bg_image);

				inter = setInterval(function () {
					sendUserUniqIDForMsg(unique_id, bg_image);
				}, 3000);
			})
			$('.innerBox').mouseover(function () {
				clearInterval(inter2);
			})
			$('.innerBox').mouseleave(function () {
				inter2 = setInterval(getUserList, 3000);
			})
		})
	}
	function getUserDetails(uniq_id) {
		$.post('admin-getIndividual/getIndividual', { data: uniq_id }, function (data) {
			var res_data = JSON.parse(data);
			setUserDetails(res_data);
		})
	}
	function setUserDetails(data) {
		
		var user_name = `${data[0]['name']}`;
		var status = data[0]['status'];
		var avtar = `uploads/photo/${data[0]['photo']}`;
		var last_seen = data[0]['last_logout'];
		offlineOnlineIndicator(status, last_seen);
		$('#name_last_seen h6').html(user_name);
		$('#cus_name h3').html(user_name);
		$('#chat_profile_image').css('background-image', `url(${avtar})`);
		$('#new_message_avtar').css('background-image', `url(${avtar})`);
		$('#mail_link').attr('href', `mailto:${data[0]['email']}`);
		$('#tel_link').attr('href', `mailto:${data[0]['email']}`);

		$('#user_details_container_avtar').css('background-image', `url(${avtar})`);
		$('#details_of_user h5').html(user_name);
		(data[0]['bio'].length > 1) ? $('#details_of_bio').html(data[0]['bio']) : $('#details_of_bio').html("--Not Given--");

		$('#details_of_created').html(`Created at : ${data[0]['created_at']}`);
		$('#details_of_email').html(`<span><i class="fas fa-envelope text-dark pr-2"></i></span>${data[0]['user_email']}`);

		(data[0]['dob'].length > 1) ?
			$('#details_of_birthday').html(`<span><i class="fas fa-birthday-cake text-dark pr-2"></i></span>${data[0]['dob']}`) :
			$('#details_of_birthday').html(`<span><i class="fas fa-birthday-cake text-dark pr-2"></i></span>--Not Given--`);

		(data[0]['phone'].length > 1) ?
			$('#details_of_mobile').html(`<span><i class="fas fa-mobile-alt text-dark pr-2"></i></span>${data[0]['phone']}`) :
			$('#details_of_mobile').html(`<span><i class="fas fa-mobile-alt text-dark pr-2"></i></span>--Not Given--`);

		(data[0]['address'].length > 1) ?
			$('#details_of_location').html(`<span><i class="fas fa-map-marker-alt text-dark pr-2"></i></span>${data[0]['address']}`) :
			$('#details_of_location').html(`<span><i class="fas fa-map-marker-alt text-dark pr-2"></i></span>--Not Given--`);


	}

	function offlineOnlineIndicator(data, last_seen) {
		if (data == 'active') {
			$('#name_last_seen p').html("Active now");
			$("#chat_profile_image #online").show();
		} else {
			$("#chat_profile_image #online").hide();
			getLastSeen(last_seen);
		}
	}
	function getLastSeen(data) {
		var { hours, min, sec } = calculateTime(data);
		if (days > 0) {
			$('#name_last_seen p').html(`Last active on ${data}`);
		}
		else {
			(hours > 0) ? $('#name_last_seen p').html(`Last seen at ${hours} hours ${min} minutes ago`) :
				(min > 0) ? $('#name_last_seen p').html("Last seen at " + min + " minutes ago") :
					$('#name_last_seen p').html("Last seen just now");
		}
	}
	function calculateTime(data) {
		oldDate = new Date(data).getTime();
		newDate = new Date().getTime();
		differ = newDate - oldDate;
		days = Math.floor(differ / (1000 * 60 * 60 * 24));
		hours = Math.floor((differ % (1000 * 60 * 60 * 24)) / (60 * 60 * 1000));
		min = Math.floor((differ % (1000 * 60 * 60)) / (60 * 1000));
		sec = Math.floor((differ % (1000 * 60)) / 1000);
		var obj = {
			hours: hours,
			min: min,
			sec: sec
		};
		return obj;
	}
	//sending unique_id which is clicked for messages
	function sendUserUniqIDForMsg(uniq_id, bg_image) {
		$.post('admin-getmessage/getmessage', { data: uniq_id, image: bg_image }, function (data) {
			setMessageToChatArea(data, bg_image);//setting messages to the chatting section
		});
	}
	function setMessageToChatArea(data, bg_image) {
		scrollToBottom();
		var res_data;
		if (data.length > 5) {
			$('#chat_message_area').html(data);
		} else {
			var profileName = $('#name_last_seen h6').html();
			$.ajax({
				url: 'admin-setNoMessage/setNoMessage',
				type: 'post',
				async: false,
				data: { image: bg_image, name: profileName },
				success: function (data) {
					res_data = data;
				}
			})
			$('#chat_message_area').html(res_data);
		}
	}
	$('#chat_message_area').mouseenter(function () {
		chatBox.classList.add('active');
	});
	$('#chat_message_area').mouseleave(function () {
		chatBox.classList.remove('active');
	});
	function scrollToBottom() {
		inter4 = setInterval(() => {
			if (!chatBox.classList.contains('active')) {
				chatBox.scrollTop = chatBox.scrollHeight;
			}
		});
	}
	$('#search').keyup(function (e) {
		alert();
		var user = document.querySelectorAll('.user');
		var name = document.querySelectorAll('#user_list h6');
		var val = this.value.toLowerCase();
		if (val.length > 0) {
			clearInterval(inter2);
			for (let i = 0; i < user.length; i++) {
				nameVal = name[i].innerHTML
				if (nameVal.toLowerCase().indexOf(val) > -1) {
					user[i].style.display = '';
				} else {
					user[i].style.display = 'none';
				}
			}
		} else {
			inter2 = setInterval(getUserList, 1000);
		}
	});
	function getCharLength() {
		const MAX_LENGTH = 200;
		var len = document.getElementById('messageText').value.length;
		if (len <= MAX_LENGTH) {
			$('#count_text').html(`${len}/200`);
		}
	}
	setInterval(getCharLength, 10);

	//send message after button click
	$('#send_message').click(function (e) {
		var d = new Date(),
			messageHour = d.getHours(),
			messageMinute = d.getMinutes(),
			messageSec = d.getSeconds(),
			messageYear = d.getFullYear(),
			messageDate = d.getDate(),
			messageMonth = d.getMonth() + 1,
			actualDateTime = `${messageYear}-${messageMonth}-${messageDate} ${messageHour}:${messageMinute}:${messageSec}`;
		var message = $('#messageText').val();
		var data = {
			message: message,
			datetime: actualDateTime,
			uniq: unique_id
		}
		var jsonData = JSON.stringify(data);
		$.post('admin-sendMessage/sendMessage', { data: jsonData }, function (data) {
			$('#messageText').val('');
		})
	})


	
	
	getUserList(); //Calling the root function without interval
	inter2 = setInterval(getUserList, 3000); //Calling the root function with interval
})

