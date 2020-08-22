var notifBoxes = document.querySelectorAll('div[class="notif"]');
let autoShowNotif = function (mystl = undefined) {
    if(mystl == undefined){
        var stl = {
            'transform':`translate(0,0)`,
            'transition':'transform 1s ease-in-out'
        };
    }else{
        var stl = mystl
    }
    Object.entries(stl).forEach((css)=>{
        for (let i=0;i<notifBoxes.length;i++){
            notifBoxes[i].style[css[0]] = css[1]
        }
    });
    let mystl2 = {
        'transform':`translate(-1000px,0)`,
        'transition':'transform 0.5s ease-in-out'
    };
};
let closeNotif = function (e) {
    const stl = {
        'transform':`translate(-1000px,0)`,
        'transition':'transform 0.5s ease-in-out'
    };
    Object.entries(stl).forEach((css)=>{

        e.target.parentNode.style[css[0]] = css[1]
    });

};

setTimeout(autoShowNotif(undefined),2000);