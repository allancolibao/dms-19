    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true

    var pusher = new Pusher('c2ee088f9eac324dd3e4', {
      cluster: 'ap1',
      forceTLS: true
    });

    var channel = pusher.subscribe('contactUs');
    channel.bind('App\\Events\\NewMessage', function(data) {
      
    // Let's check if the browser supports notifications
    if (!("Notification" in window)) {
    alert("This browser does not support desktop notification");
    }

    // Let's check if the user is okay to get some notification
    else if (Notification.permission === "granted") {
    
    // If it's okay let's create a notification
    var options = {
        body: "Received new notification",
        icon: "img/dbicon.png",
        dir : "ltr"
    };

    var notification = new Notification("Dashboard 2019",options);
        notification.onclick = function() {
        window.open(window.location = 'https://mail.google.com/mail');
    };
    }  

    else if (Notification.permission !== 'denied') {
    Notification.requestPermission(function (permission) {
      // Whatever the user answers, we make sure we store the information
      if (!('permission' in Notification)) {
        Notification.permission = permission;
      }

      // If the user is okay, let's create a notification
      if (permission === "granted") {
    var options = {
        body: "Received new notification",
        icon: "img/dbicon.png",
        dir : "ltr"
    };
    var notification = new Notification("Dashboard 2019",options);
        notification.onclick = function() {
        window.open(window.location = 'https://mail.google.com/mail');
    };
    }
    });
    }
    });