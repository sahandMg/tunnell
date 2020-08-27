let sendConfirmationEmail = function () {
    axios.post(url,{'token':token}).then(function (resp) {
        console.log(resp.data);
        if(resp.data == 200){

            let notifBox =  document.querySelector('div[class="notif-box"]').innerHTML = '';
            notifBox =  document.querySelector('div[class="notif-box"]').innerHTML =
                '<div class="notif">'+
                '<span onclick="closeNotif(event)" class="close-notif">X</span>'+
                '<p>ایمیل تایید ارسال شد</p>'+
                '</div>';
            autoShowNotif(undefined);
        }else{
            notifBox =  document.querySelector('div[class="notif-box"]').innerHTML =
                '<div class="notif">'+
                '<span onclick="closeNotif(event)" class="close-notif">X</span>'+
                '<p>خطای سرور</p>'+
                '</div>';
            autoShowNotif(undefined);
        }
    })
};
