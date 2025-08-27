<?php
$title = "چت‌بات فروشگاه";
include('includes/header.php');


?>

<main class="container py-5" style="max-width:800px;">
    <h3 class="text-center mb-4"><i class="fa fa-robot text-info"></i> چت‌بات فروشگاه</h3>

    <div id="chat-box" class="border rounded p-3 mb-3" >
        <div class="text-center text-muted">سوال خود را وارد کنید...</div>
    </div>

    <form id="chat-form" class="d-flex">
        <input type="text" id="user-input" class="form-control me-2" placeholder="سؤالت رو بپرس..." required>
        <button type="submit" class="btn btn-success">ارسال</button>
    </form>
</main>

<style>

#chat-box{
    height:400px; 
    overflow-y:auto; 
    background:#b8b8b8;
}

#chat-box .user-msg {
    display: inline-block;
    background-color: #198754;
    color: #fff;
    padding: 8px 12px;
    border-radius: 15px;
    margin: 5px 0;
    max-width: 70%;
    text-align: right;
    float: right;
    clear: both;
}

#chat-box .bot-msg {
    display: inline-block;
    background-color: #0dcaf0;
    color: #000;
    padding: 8px 12px;
    border-radius: 15px;
    margin: 5px 0;
    max-width: 70%;
    text-align: left;
    float: left;
    clear: both;
}

#chat-box::-webkit-scrollbar {
    width: 6px;
}
#chat-box::-webkit-scrollbar-thumb {
    background-color: rgba(0,0,0,0.2);
    border-radius: 3px;
}
</style>

<script>
const form = document.getElementById('chat-form');
const input = document.getElementById('user-input');
const chatBox = document.getElementById('chat-box');

form.addEventListener('submit', async function(e){
    e.preventDefault();
    const userMsg = input.value.trim();
    if(!userMsg) return;

    // نمایش پیام کاربر
    chatBox.innerHTML += `<div class="user-msg">${userMsg}</div>`;
    chatBox.scrollTop = chatBox.scrollHeight;
    input.value = '';

    // ارسال به API پایتون
    let reply = "متاسفم، خطایی رخ داد.";
    try {
        const res = await fetch("http://127.0.0.1:5000/chat", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ question: userMsg })
        });
        const data = await res.json();
        reply = data.answer;
    } catch (err) {
        reply = "خطا در ارتباط با سرور.";
    }

    // نمایش پاسخ بات
    chatBox.innerHTML += `<div class="bot-msg">${reply}</div>`;
    chatBox.scrollTop = chatBox.scrollHeight;
});
</script>

<?php include('includes/footer.php'); ?>
