//  **------tab js**
$(document).on('click','.tab-link',function () {
	var tabID = $(this).attr('data-tab');
	
	$(this).addClass('active').siblings().removeClass('active');
	
	$('#tab-'+tabID).addClass('active').siblings().removeClass('active');
}); 


//  **------toggle js**

  document.querySelector('.toggle-btn').addEventListener('click', () => {
 	var chatcontainer = document.querySelector(".chat-div");
 	chatcontainer.classList.toggle("chattoggle");
 });

 document.querySelector('.close-toggle').addEventListener('click', () => {
 	var chatcontainer = document.querySelector(".chat-div");
 	chatcontainer.classList.remove("chattoggle");
 });

// "use strict";
$(function() {
    var tooltip_init = {
        init: function () {
            $("a").tooltip();
        }
    };
    tooltip_init.init()
});



/*====================================================================================*/
// document.addEventListener('DOMContentLoaded', function() {
// 	loadChatHistory();

// 	document.getElementById('chatbot-form').addEventListener('submit', async function (e) {
// 		e.preventDefault();
// 		const consulta = document.getElementById('consulta').value;
// 		if (!consulta.trim()) return;

// 		addMessage(consulta, 'user-message');

// 		const response = await fetch('chatbot.php', {
// 			method: 'POST',
// 			headers: {
// 				'Content-Type': 'application/x-www-form-urlencoded'
// 			},
// 			body: `consulta=${encodeURIComponent(consulta)}`
// 		});

// 		const data = await response.json();
	   
// 		if (data.error) {
// 			addMessage(data.error, 'error-message');
// 		} else {
// 			addFormattedMessage(data.respuesta, 'bot-message');
// 		}

// 		document.getElementById('consulta').value = '';
// 	});
// });

// function addMessage(text, className) {

//    const chatMessages = document.getElementById('chat-messages');
//    const messageElement = document.createElement('div');
//    messageElement.classList.add('message', className);
//    messageElement.textContent = text;
//    chatMessages.appendChild(messageElement);
//    chatMessages.scrollTop = chatMessages.scrollHeight;
// }

// function addFormattedMessage(html, className) {
// 	const chatMessages = document.getElementById('chat-messages');
// 	const messageElement = document.createElement('div');
// 	messageElement.classList.add('message', className);
// 	messageElement.innerHTML = html;
// 	chatMessages.appendChild(messageElement);
// 	chatMessages.scrollTop = chatMessages.scrollHeight;
// }

// async function loadChatHistory() {
// 	const response = await fetch('chatbot.php?action=get_history');
// 	const history = await response.json();
   
// 	history.forEach(item => {
// 		addMessage(item.consulta, 'user-message');
// 		addFormattedMessage(item.respuesta, 'bot-message');
// 	});
// }