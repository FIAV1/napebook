(function ($) {
    "use strict";

    //We’re going to use notifications to store all notification objects
    //whether they’re retrieved via AJAX or Pusher.
    var notifications = [];

    const NOTIFICATION_TYPES = {
        friendshipRequest: 'App\\Notifications\\FriendshipRequest',
        friendshipAccepted: 'App\\Notifications\\FriendshipAccepted',
        postLiked: 'App\\Notifications\\PostLiked',
        postCommented: 'App\\Notifications\\PostCommented',
    };

    //Let's get notification via AJAX
    //With this, we’re getting the latest notifications from our API
    //and putting them inside the dropdown.
    $(document).ready(function() {

        //Check if there's a logged in user
        if (Laravel.userId) {

            $.get('/api/notifications/friendship', function (data) {

                addNotifications(data, ".friendship-notifications");
                getNotificationsCount('friendship', ".friendship-notifications-count");
            });

            $.get('/api/notifications/general', function (data) {

                addNotifications(data, ".general-notifications");
                getNotificationsCount('general', ".general-notifications-count");
            });

        }
    });

    function getNotificationsCount(type, target) {

        $.get('/api/notifications/' + type + '/count', function (data) {
            $(target).html(data);
        });

    }

    function addNotifications(newNotifications, target) {

        notifications = [];
        //We concatenate the present notifications with the new ones using Lodash
        notifications = _.concat(notifications, newNotifications);
        //and take only the latest 5 to be shown.
        notifications.slice(0, 8);
        showNotifications(notifications, target);
    }

    //This function builds a string of all notifications and puts it inside the dropdown.
    //If no notifications were received, it just shows “No notifications”.
    function showNotifications(notifications, target) {

        if (notifications.length > 0) {
            var htmlElements = notifications.map(function (notification) {
                return makeNotification(notification);
            });
            $(target + 'Menu').html(htmlElements.join(''));
            //It also adds a class to the dropdown button,
            //which will just change its color when notifications exist.
            $(target).addClass('text-warning');
        } else {
            $(target + 'Menu').html('<li class="dropdown-header">Niente da mostrare</li>');
            $(target).removeClass('text-warning');
        }
    }

    //Make a single notification string
    function makeNotification(notification) {

        var to = routeNotification(notification);

        var notificationText = makeNotificationText(notification);

        return '<li><a class="dropdown-item" href="' + to + '">' + notificationText + '</a></li><div class="dropdown-divider"></div>';
    }

    //Get the notification route based on it's type
    function routeNotification(notification) {

        var to = '?read=' + notification.id;

        if (notification.type === NOTIFICATION_TYPES.friendshipRequest || notification.type === NOTIFICATION_TYPES.friendshipAccepted) {
            to = 'profile/' + notification.data.sender_id + to;
        }
        else if (notification.type === NOTIFICATION_TYPES.postLiked || notification.type === NOTIFICATION_TYPES.postCommented) {
            to = 'post/' + notification.data.post_id + to;
        }

        return '/' + to;
    }

    //Get the notification text based on it's type
    function makeNotificationText(notification) {

        var text = '';

        switch (notification.type) {

            case NOTIFICATION_TYPES.friendshipRequest:
                var name = notification.data.sender_name;
                text += '<strong>' + name + '</strong> vuole essere tuo amico';
                break;

            case NOTIFICATION_TYPES.friendshipAccepted:
                var name = notification.data.sender_name;
                text += '<strong>' + name + '</strong> ha accettato la tua richiesta di amicizia';
                break;

            case NOTIFICATION_TYPES.postLiked:
                var name = notification.data.sender_name;
                text += 'A <strong>' + name + '</strong> piace il tuo post';
                break;

            case NOTIFICATION_TYPES.postCommented:
                var name = notification.data.sender_name;
                text += '<strong>' + name + '</strong> ha commentato il tuo post';
                break;

            default:
        }

        return text;
    }

    Echo.private(`App.User.` + Laravel.userId)
        .notification((notification) => {

            if (notification.type === NOTIFICATION_TYPES.friendshipRequest || notification.type === NOTIFICATION_TYPES.friendshipAccepted) {
                addNotifications([notification], ".friendship-notifications");
                getNotificationsCount('friendship', ".friendship-notifications-count");
            }
            else if (notification.type === NOTIFICATION_TYPES.postLiked || notification.type === NOTIFICATION_TYPES.postCommented) {
                addNotifications([notification], ".general-notifications");
                getNotificationsCount('general', ".general-notifications-count");
            }
        });

})(jQuery);