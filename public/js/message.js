async function message() {
    // viewに埋め込んだmessageデータを取得
    const messages = JSON.parse($('.messages').val());

    let content = "";
    messages.forEach(msg => {
        let user_icon = $('.sender_icon').val();
        let user_name = $('.sender_name').val();
        if (msg.user_id == $('.recipient_id').val()) {
            user_icon = $('.recipient_icon').val();
            user_name = $('.recipient_name').val();
        }
        const val = {
            'message': msg,
            'user_icon': user_icon,
            'user_name': user_name
        }
        content += tag(val)
    });

    $('.msgArea').html(content);
}

message();


$('.btn').on('click', function () {
    async function submit() {
        const params = {
            content: $('.form-control').val(),
            conversation_id: $('.conversation_id').val(),
            user_id: $('.user_id').val(),
        }

        await axios.post(`/conversations/${params.conversation_id}/messages`, params)
            .then(res => {
                const content = tag(res.data);
                $('.msgArea').append(content);
                $('.form-control').val('');
            })
            .catch(e => {
                alert(e.response);
            });
    }

    submit();
})

function tag(val) {
    return `<li>
            <img src="/storage/user_icon/${val.user_icon}" alt="icon" class="icon rounded-circle img-fluid">
            <p class="user_name">${val.user_name}</p>
            <p class="content">${val.message.content}</p>
            <p class="date">${val.message.created_at}</p>
            </li>`;
}