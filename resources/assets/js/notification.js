Echo.private(`App.User.` + userId)
    .notification((notification) => {
        console.log(notification.type)
    });