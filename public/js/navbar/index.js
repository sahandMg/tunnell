/**
 * Created by Sahand on 8/20/20.
 */
const burgerLoginBtn = document.querySelector('nav[class="burger-nav"]  a[class="login"]');
const burgerRegBtn = document.querySelector('nav[class="burger-nav"]  a[class="reg"]');
const burgerNav = document.querySelector('nav[class="burger-nav"]');
document.querySelector('img[class="burger-plugin-text"]').style.top = burgerRegBtn.getBoundingClientRect().top  + 'px';
document.querySelector('img[class="burger-plugin-text"]').style.left = burgerLoginBtn.getBoundingClientRect().left/3 + 'px';
const burgerPlugin = document.querySelector('img[class="burger-plugin"]');
burgerPlugin.style.top = burgerNav.offsetHeight + 'px';
let triggerIcon = document.querySelector('img[class="burger-trigger"]');
triggerIcon.style.top = burgerPlugin.getBoundingClientRect().top  + 'px';
burgerNav.style.transform = `translate(0,${-burgerNav.offsetHeight}px)`;
localStorage.setItem('navHeight',burgerNav.offsetHeight);
let triggerMenu = function () {

    if(triggerIcon.getBoundingClientRect().top > 200){

        burgerNav.style.overflow = '';
        burgerNav.style.height = Number(localStorage.getItem('navHeight'))+'px';
        burgerPlugin.style.top = burgerNav.style.height;
        const stl = {
            'transform':`translate(0,-${localStorage.getItem('navHeight')}px)`,
            'transition':'transform 0.1s ease-in-out'
        };
        Object.entries(stl).forEach(function (css) {
            burgerNav.style[css[0]] = css[1]
        });
        // const stl2 = {
        //     'transform':`rotate(0deg)`,
        //     'transition':'transform 0.5s ease-in-out'
        // };
        //
        // Object.entries(stl2).forEach(function (css) {
        //     triggerIcon.style[css[0]] = css[1]
        // });
    }else{

        const stl = {
            'transform':`translate(0,${0}px)`,
            'transition':'transform 0.5s ease-in-out'
        };
        Object.entries(stl).forEach(function (css) {
            burgerNav.style[css[0]] = css[1]
        });
        // const stl2 = {
        //     'transform':`rotate(180deg)`,
        //     'transition':'transform 0.5s ease-in-out'
        // };
        // Object.entries(stl2).forEach(function (css) {
        //     triggerIcon.style[css[0]] = css[1]
        // });
        //    check if window height < meun hight => create scrollable menu
        if(window.innerHeight < burgerNav.offsetHeight){
            burgerNav.style.height = window.innerHeight + 'px';
            burgerNav.style.overflow = 'scroll';
        }
    }

};
// close the menu by clicking every where on the screen
let closeMenu = function () {

    if(triggerIcon.getBoundingClientRect().top > 200) {
        triggerMenu()
    }
};

let openMenu = function () {

    if(triggerIcon.getBoundingClientRect().top < 200) {
        triggerMenu()
    }
};