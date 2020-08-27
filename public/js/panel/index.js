/**
 * Created by Sahand on 8/24/20.
 */
let openInfoWindow = function (e) {
    let modal = document.querySelector('ul[class="user-info-modal-ul"]');
    let stl;
    if(e.target.className === 'name-li') {

        if (modal.style.visibility == 'hidden') {
            stl = {
                'visibility': 'visible',
                'opacity': 1,
                'transition': 'visibility 0s,opacity 0.2s ease-in-out'
            };
            localStorage.setItem('modal', 1)
        } else {
            stl = {
                'visibility': 'hidden',
                'opacity': 0,
                'transition': 'opacity 0.2s ease-in-out,visibility 0s'
            };
            localStorage.setItem('modal', 0)
        }

        Object.entries(stl).forEach(function (css) {
            modal.style[css[0]] = css[1]
        });
    }
};
let openTopup = function(e){

    let topup = document.querySelector('div[class="topup"]');
    let stl;
    if(e.target.nodeName === 'LI'){
        if(topup.style.visibility === 'hidden' || topup.style.visibility.length == 0){
            stl = {
                'visibility':'visible',
                'opacity':1,
                'transition':'visibility 0s,opacity 0.2s ease-in-out'
            };
        }else{
            stl = {
                'visibility':'hidden',
                'opacity':0,
                'transition':'opacity 0.2s ease-in-out,visibility 0s'
            };
        }

        Object.entries(stl).forEach(function (css) {
            topup.style[css[0]] = css[1]
        });
    }
};
let closeTopup = function () {

    document.querySelector('div[class="topup"]').style.visibility = 'hidden';
}

let changeStatus = function (e,userToken,token) {

    axios.post(tokenStateURL,{'temp_token':userToken,'token':token}).then(function (resp) {

        if(resp.status == 200){
            console.log(resp.data)
            e.target.className == 'green-status-td' ? e.target.className = 'red-status-td':e.target.className = 'green-status-td'
        }
    }).catch(function (err) {
        console.log(err)
    })


};

let createToken = function (e) {

    axios.post(createTokenURL).then(function (resp) {

        if(resp.status == 200){
            if(resp.data.type == 'error'){

                console.log(resp.data.message);
                let alert = document.querySelector('div[class="charge-alert"]');
                alert.style.display = 'block';
                alert.innerHTML = resp.data.message;
                // alert.setAttribute('class','charge-alert');
                // alert.appendChild(document.createTextNode(resp.data.message));
                // document.querySelector('div[class="table-container"]').prepend(alert)
            }else{
                window.location.reload();
            }
        }
    }).catch(function (err) {
        console.log(err)
    })
};

// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.querySelector('li[class="charge-btn-nav"]');

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal
btn.onclick = function() {
    modal.style.display = "block";
};

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
    modal.style.display = "none";
};

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};

window.addEventListener('resize',function () {

    if(window.innerWidth > 780){

        document.querySelector('li[class="charge-btn-nav"]').style.display = 'none';
    }else{
        document.querySelector('li[class="charge-btn-nav"]').style.display = 'flex';
    }
});