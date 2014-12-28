$(function() {
    $('header .save-btn').click(getUserAlerts);

    function getUserAlerts() {
        var userInfo = [];
        $('#myModal table tbody tr').each(function() {
            var check = $(this).find('input').is(':checked');
            var login = $(this).find('td.login').html();
            var email = $(this).find('td.email').html();
            var user = {
                'check': check,
                'login': login,
                'email': email
            };
            userInfo.push(user);
        });
        updateUserAlerts(userInfo);
    }

    function updateUserAlerts(userInfo) {
        console.log(userInfo);
        
        $.ajax({
            url: 'users/update_user_alerts',
            type: 'POST',
            dataType: 'json',
            response: "json",
            data: {data: userInfo},
            success: onGetData
        }).done(function() {
        });

        function onGetData(response){
            //TODO: success false -> view alert
            console.log(response);
        }
    }
});