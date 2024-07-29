document.addEventListener('DOMContentLoaded', function() {
    const chatList = document.querySelector('.chat-list');
    const chatMessages = document.getElementById('chat-container');
    const messageInput = document.getElementById('message-input');
    const sendButton = document.getElementById('send-button');
    const currentChatName = document.getElementById('current-chat-name');
    const currentChatImage = document.getElementById('current-chat-image');
    
    let currentCategoryId = null;

    // Cargar lista de categorías de chat
    fetch('../chatbot.php?action=get_categories')
        .then(response => response.json())
        .then(categories => {
            categories.forEach(category => {
                const chatItem = document.createElement('div');
                chatItem.className = 'chat-item';
                chatItem.innerHTML = `
                    <div class="d-flex border-b mb-3">
                        <div>
                            <span class="h-35 w-35 d-flex-center b-r-50 position-relative">
                                <img src="../src/imagenes/${category.id}.png" alt="${category.nombre}" class="img-fluid b-r-50">
                                <span class="position-absolute top-0 end-0 p-1 bg-success border border-light rounded-circle"></span>
                            </span>
                        </div>
                        <div class="flex-grow-1 text-start ps-2">
                            <p class="f-w-500 mb-0">${category.nombre}</p>
                        </div>
                    </div>`    
                    // <img src="../src/imagenes/${category.id}.png" alt="${category.nombre}">
                    // <span>${category.nombre}</span>
                    // <div class="app-divider-v justify-content-center"></div>
                ;
                chatItem.dataset.categoryId = category.id;
                chatItem.addEventListener('click', () => loadCategory(category.id, category.nombre));
                chatList.appendChild(chatItem);
            });
        });

    function loadCategory(categoryId, categoryName) {
        currentCategoryId = categoryId;
        currentChatName.textContent = categoryName;
        currentChatImage.src = `../src/imagenes/${categoryId}.png`;
        document.querySelectorAll('.chat-item').forEach(item => item.classList.remove('active'));
        document.querySelector(`.chat-item[data-category-id="${categoryId}"]`).classList.add('active');

        // Cargar historial de consultas para esta categoría
        fetch(`../chatbot.php?action=get_history&category_id=${categoryId}`)
            .then(response => response.json())
            .then(messages => {
                chatMessages.innerHTML = '';
                messages.forEach(message => {
                    addMessage(message.consulta, 'user', '../src/imagenes/user.png');
                    addMessage(message.respuesta, 'bot', `../src/imagenes/${categoryId}.png`);
                });
                chatMessages.scrollTop = chatMessages.scrollHeight;
            });
    } 

    function addMessage(text, className, imageUrl) {
        // const messageElement = document.createElement('div');
        // messageElement.classList.add('message', className);
        // messageElement.innerHTML = `
        //     <img src="${imageUrl}" alt="Profile">
        //     <div class="border-message" >${text}</div>
        // `;
        const messageElement = document.createElement('div');
        messageElement.classList.add('position-relative');
        
        if (className === 'bot') {
            messageElement.style.paddingRight = '10%';
            messageElement.innerHTML = `
                <span class="chatdp h-50 w-50 b-r-50 position-absolute start-0">
                    <img src="${imageUrl}" alt="Profile" class="img-fluid b-r-50">
                </span>
                <div class="chat-box">
                    <div>
                        <p class="chat-text">${text}</p>
                    </div>
                </div>
            `;
        } else if (className === 'user') {
            messageElement.style.paddingLeft = '10%';
            messageElement.innerHTML = `
                <div class="chat-box-right">
                    <div>
                        <p class="chat-text">${text}</p>
                    </div>
                </div>
                <span class="chatdp h-50 w-50 b-r-50 position-absolute top-0 end-0">
                    <img src="${imageUrl}" alt="Profile" class="img-fluid b-r-50">
                </span>
            `;
        }

        chatMessages.appendChild(messageElement);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }
        
    function sendMessage() {
        const message = messageInput.value.trim();
        if (message && currentCategoryId) {
            addMessage(message, 'user', '../src/imagenes/user.png');
            messageInput.value = '';
    
            const formData = new FormData();
            formData.append('consulta', message);
            formData.append('category_id', currentCategoryId);
    
            fetch('../chatbot.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    addMessage(data.error, 'bot', '../src/imagenes/error.png');
                } else {
                    addMessage(data.respuesta, 'bot', `../src/imagenes/${currentCategoryId}.png`);
                }
            })
            .catch(error => {
                console.error('Error:', error);
                addMessage('Hubo un error al procesar tu mensaje.', 'bot', '../src/imagenes/error.png');
            });
        }
    }
    sendButton.addEventListener('click', sendMessage);
    messageInput.addEventListener('keypress', function(e) {
        if (e.key === 'Enter') {
            sendMessage();
        }
    });
});

document.getElementById('chatbot-form').addEventListener('submit', function(e) {
    e.preventDefault();
    sendMessage();
});
