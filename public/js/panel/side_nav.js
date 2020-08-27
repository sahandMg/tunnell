// let sideNav = document.querySelector('nav[class="side-nav"]');
// if(window.innerWidth < 668){
//     let navRight = window.innerWidth - sideNav.offsetLeft;
//     if(localStorage.getItem('toggle') == 1){
//         sideNav.addEventListener('mouseenter',function () {
//             // sideNav.style.transform = `translate(${-sideNav.offsetWidth}px,0)`;
//             sideNav.style.right = -sideNav.offsetWidth + localStorage.getItem('sidenav_right')+'px';
//             sideNav.style.transition = 'all 0.5s ease-in-out';
//             localStorage.setItem('toggle',0);
//         })
//     }else{
//         sideNav.addEventListener('mouseenter',function () {
//             localStorage.setItem('sidenav_right',navRight);
//             localStorage.setItem('toggle',1);
//             // sideNav.style.transform = `translate(${-sideNav.offsetWidth}px,0)`;
//             sideNav.style.right = 0;
//             sideNav.style.transition = 'all 0.5s ease-in-out'
//         })
//     }
// }
let sideNav = document.querySelector('nav[class="side-nav"]');

window.addEventListener('resize', function(event){

    if(window.innerWidth > 780){
        sideNav.style.opacity = '1';
        sideNav.style.visibility = 'visible';
    }
});
let opensideMenu = function () {

    let trigger = document.querySelector('img[class="side-nav-trigger"]');

    if(sideNav.style.visibility == 'visible'){

        trigger.style.transform = 'rotate(180deg)';
        trigger.style.transition = 'transform 0.5s ease-in-out';
        sideNav.style.opacity = '0';
        sideNav.style.transition = 'all 0.5s ease-in-out';
        sideNav.style.visibility = 'hidden';

    }else{

        trigger.style.transform = 'rotate(0deg)';
        trigger.style.transition = 'transform 0.5s ease-in-out';
        sideNav.style.opacity = '1';
        sideNav.style.transition = 'all 0.5s ease-in-out';
        sideNav.style.visibility = 'visible';
    }

    if(window.innerHeight <= sideNav.offsetHeight){
        sideNav.style.overflow = 'scroll';
    }else{
        sideNav.style.overflow = '';
    }
};