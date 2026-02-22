@extends('layouts.app')

@section('content')

<div style="background:white; color:black; padding:30px; margin:30px; border-radius:10px;">

    <h2 style="font-size:24px; margin-bottom:20px;">
        InfiCode AI Chat
    </h2>

    <div id="chatBox"
         style="height:350px; overflow-y:auto; border:1px solid black; padding:15px; margin-bottom:15px; background:#f9f9f9;">
    </div>

    <form id="chatForm">

        @csrf

        <input
            type="text"
            id="message"
            placeholder="Type your message..."
            required
            style="width:100%; padding:12px; border:1px solid black; margin-bottom:10px;"
        >

        <button
            type="submit"
            style="background:black; color:white; padding:10px 20px; border:none; cursor:pointer;"
        >
            Send
        </button>

    </form>

</div>

<script>

document.getElementById("chatForm").addEventListener("submit", async function(e){

    e.preventDefault();

    let messageInput = document.getElementById("message");

    let message = messageInput.value.trim();

    if(!message) return;

    let chatBox = document.getElementById("chatBox");

    chatBox.innerHTML += `<div><b>You:</b> ${message}</div>`;

    messageInput.value = "";

    let formData = new FormData();

    formData.append("message", message);

    formData.append("_token", "{{ csrf_token() }}");

    try {

        let response = await fetch("{{ route('chat.send') }}", {

            method: "POST",

            body: formData

        });

        let data = await response.json();

        chatBox.innerHTML += `<div><b>InfiCode:</b> ${data.reply}</div>`;

        chatBox.scrollTop = chatBox.scrollHeight;

    } catch(error){

        chatBox.innerHTML += `<div style="color:red;">Error getting response</div>`;

        console.error(error);

    }

});

</script>

@endsection