/**
 * Created by Sahand on 8/20/20.
 */
const burgerLoginBtn = document.querySelector('nav[class="burger-nav"]  a[class="login"]');
const burgerRegBtn = document.querySelector('nav[class="burger-nav"]  a[class="reg"]');
const burgerNav = document.querySelector('nav[class="burger-nav"]');
document.querySelector('img[class="burger-plugin-text"]').style.top = burgerRegBtn.getBoundingClientRect().top  + 'px';
document.querySelector('img[class="burger-plugin-text"]').style.left = burgerLoginBtn.getBoundingClientRect().left/3 + 'px';
const burgerPlugin = document.querySelector('img[class="burger-plugin"]');
let triggerIcon = document.querySelector('img[class="burger-trigger"]');
triggerIcon.style.top = burgerPlugin.getBoundingClientRect().top * 1.1 + 'px';

burgerNav.style.transform = `translate(0,${-burgerNav.offsetHeight}px)`;



// window.addEventListener('click',function (e) {
//     console.log(e.target);
//     const stl = {
//         'transform':`translate(0,${0}px)`,
//         'transition':'all 0.5s ease-in-out'
//     };
//     Object.entries(stl).forEach(function (css) {
//         burgerNav.style[css[0]] = css[1]
//     });
//     const stl2 = {
//         'transform':`rotate(180deg)`,
//         'transition':'all 0.5s ease-in-out'
//     };
//     Object.entries(stl2).forEach(function (css) {
//         triggerIcon.style[css[0]] = css[1]
//     })
// })

let triggerMenu = function () {

    if(triggerIcon.getBoundingClientRect().top > 200){
        const stl = {
            'transform':`translate(0,-${burgerNav.offsetHeight}px)`,
            'transition':'all 0.5s ease-in-out'
        };
        Object.entries(stl).forEach(function (css) {
            burgerNav.style[css[0]] = css[1]
        });
        const stl2 = {
            'transform':`rotate(0deg)`,
            'transition':'all 0.5s ease-in-out'
        };

        Object.entries(stl2).forEach(function (css) {
            triggerIcon.style[css[0]] = css[1]
        });



    }else{

        const stl = {
            'transform':`translate(0,${0}px)`,
            'transition':'all 0.5s ease-in-out'
        };
        Object.entries(stl).forEach(function (css) {
            burgerNav.style[css[0]] = css[1]
        });
        const stl2 = {
            'transform':`rotate(180deg)`,
            'transition':'all 0.5s ease-in-out'
        };
        Object.entries(stl2).forEach(function (css) {
            triggerIcon.style[css[0]] = css[1]
        });
    }

};

let closeMenu = function () {

    triggerMenu()
};
