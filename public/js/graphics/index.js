let graphicBg = document.querySelector('div[class="graphic"]');
setTimeout(()=>{

    let bgHeight = graphicBg.getBoundingClientRect().height;
    graphicBg.style.height = bgHeight*1.5+'px';
},200);
