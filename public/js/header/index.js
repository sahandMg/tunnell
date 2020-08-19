/**
 * Created by Sahand on 8/16/20.
 */

//
let header = document.querySelector('header');
let headerHeight = document.querySelector('header').offsetHeight;
document.querySelector('img[class="plugin"]').style.top = headerHeight;
let pluginHeight = document.querySelector('img[class="plugin"]').height;
document.querySelector('div[class="body"]').style.top += 1.7 * headerHeight +'px';
let terminalWindow = document.querySelector('div[class="terminalBox"]');
let webWindow = document.querySelector('img[class="web-window"]');
let terminalCss = terminalWindow.getBoundingClientRect();
let navPlugin = document.querySelector('img[class="nav-plugin"]');
// NavBar
let navBar = document.querySelector('nav');
let navPluginText = document.querySelector('img[class="nav-plugin-text"]');
let regBtn = document.querySelector('a[class="reg"]');
navPluginText.style.top = regBtn.getBoundingClientRect().bottom + 5 + 'px';
navPluginText.style.left = regBtn.getBoundingClientRect().left + 'px';
header.style.paddingTop = navBar.getBoundingClientRect().height/1.5+'px';
navPlugin.style.top = navBar.getBoundingClientRect().height+'px';
window.addEventListener('scroll', function (event) {
    if(document.body.getBoundingClientRect().top < -headerHeight/20){

        // navBar.style.backgroundImage = 'linear-gradient(45deg,rgb(40, 93, 109),#03A293)';
        navBar.style.backgroundColor = '#03A293';
        navBar.style.transition = 'all 0.2s ease-in-out';
        navPlugin.style.opacity = '1';
        navPluginText.style.opacity = '1';
        navPlugin.style.transition = 'all 0.2s ease-in-out';
    }else{
        // navBar.style.backgroundImage = 'none';
        navBar.style.backgroundColor = 'transparent';
        navPlugin.style.opacity = '0';
        navPluginText.style.opacity = '0';
        navBar.style.transition = 'all 0.2s ease-in-out';
        navPlugin.style.transition = 'all 0.2s ease-in-out';
    }
});


//  Command Writer

class CommandWriter{
    constructor(interval,command,commandId,resultId){
        this.time = interval;
        this.commnadText = command;
        this.commandId = commandId;
        this.resultId = resultId;
    }
}
CommandWriter.prototype.run = function(callback){
    let i = 0;
    let time = this.time;
    let interval = setInterval(()=>{
        if(i == this.commnadText.length){
            clearInterval(interval);

            let results1 = document.getElementById(this.resultId);
            stl = {
                'opacity':'1',
                'transition':'opacity ease-in 0.1s'
            };
            Object.entries(stl).forEach(css => {
                results1.style[css[0]] = css[1]
            });
            callback()

        }else{

            document.getElementById(this.commandId).innerHTML += this.commnadText[i];
            i++
        }
    },time);
};

let commnad1Text = '$ node app.js';
let cWriter = new CommandWriter(100,commnad1Text,'command1','command1Result');
cWriter.run(()=>{
    let commnad2Text = '$ ./name http 8000';
    let cWriter2 = new CommandWriter(100,commnad2Text,'command2','command2Result');
    cWriter2.run(()=>{
        webWindow.style.width = terminalCss.width+'px';
        webWindow.style.left = terminalCss.left+'px';
        let temp = terminalCss.top;
        webWindow.style.top = 0+'px';
        terminalWindow.style.transform = `translate(0,${webWindow.getBoundingClientRect().height/2}px)`;
        webWindow.style.opacity = 1;
        webWindow.style.transition = 'opacity 0.5s ease-in-out';
        terminalWindow.style.transition = 'transform 1s ease-in-out';
    });
});




// typewriter
var TxtType = function(el, toRotate, period) {
    this.toRotate = toRotate;
    this.el = el;
    this.loopNum = 0;
    this.period = parseInt(period, 10) || 2000;
    this.txt = '';
    this.tick();
    this.isDeleting = false;
};

TxtType.prototype.tick = function() {
    var i = this.loopNum % this.toRotate.length;
    var fullTxt = this.toRotate[i];

    if (this.isDeleting) {
        this.txt = fullTxt.substring(0, this.txt.length - 1);
    } else {
        this.txt = fullTxt.substring(0, this.txt.length + 1);
    }

    document.querySelector('span[class="wrap"]').innerHTML = this.txt;

    var that = this;
    var delta = 200 - Math.random() * 200;

    if (this.isDeleting) { delta /= 2; }

    if (!this.isDeleting && this.txt === fullTxt) {
        delta = this.period;
        this.isDeleting = true;
    } else if (this.isDeleting && this.txt === '') {
        this.isDeleting = false;
        this.loopNum++;
        delta = 500;
    }

    setTimeout(function() {
        that.tick();
    }, delta);
};

window.onload = function() {
    var elements = document.getElementsByClassName('typewrite');
    for (var i=0; i<elements.length; i++) {
        var toRotate = elements[i].getAttribute('data-type');
        var period = elements[i].getAttribute('data-period');
        if (toRotate) {
            new TxtType(elements[i], JSON.parse(toRotate), period);
        }
    }
};