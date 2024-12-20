const wrapper = document.getElementById("wrapper");
const registerBtn = document.getElementById("register");
const loginBtn = document.getElementById("login");

registerBtn.addEventListener("click", () => {
    wrapper.classList.add("active");
});

loginBtn.addEventListener("click", () => {
    wrapper.classList.remove("active");
});

  (function ($) {
  
  "use strict";

    // MENU
    $('.navbar-collapse a').on('click',function(){
      $(".navbar-collapse").collapse('hide');
    });
    
    // CUSTOM LINK
    $('.smoothscroll').click(function(){
      var el = $(this).attr('href');
      var elWrapped = $(el);
      var header_height = $('.navbar').height();
  
      scrollToDiv(elWrapped,header_height);
      return false;
  
      function scrollToDiv(element,navheight){
        var offset = element.offset();
        var offsetTop = offset.top;
        var totalScroll = offsetTop-navheight;
  
        $('body,html').animate({
        scrollTop: totalScroll
        }, 300);
      }
    });

    $(window).on('scroll', function(){
      function isScrollIntoView(elem, index) {
        var docViewTop = $(window).scrollTop();
        var docViewBottom = docViewTop + $(window).height();
        var elemTop = $(elem).offset().top;
        var elemBottom = elemTop + $(window).height()*.5;
        if(elemBottom <= docViewBottom && elemTop >= docViewTop) {
          $(elem).addClass('active');
        }
        if(!(elemBottom <= docViewBottom)) {
          $(elem).removeClass('active');
        }
        var MainTimelineContainer = $('#vertical-scrollable-timeline')[0];
        var MainTimelineContainerBottom = MainTimelineContainer.getBoundingClientRect().bottom - $(window).height()*.5;
        $(MainTimelineContainer).find('.inner').css('height',MainTimelineContainerBottom+'px');
      }
      var timeline = $('#vertical-scrollable-timeline li');
      Array.from(timeline).forEach(isScrollIntoView);
    });
  
  })(window.jQuery);


  console.clear();

  select = e => document.querySelector(e);
  selectAll = e => document.querySelectorAll(e);
  
  const style = getComputedStyle(document.body)
  const stage = select('.stage');
  const weightInit = style.getPropertyValue('--fw'); // 600 in example
  const weightTarget = 400; // 100-800
  const weightDiff = weightInit - weightTarget;
  const stretchInit = style.getPropertyValue('--fs'); // 150 in example
  const stretchTarget = 80; // 10-200
  const stretchDiff = stretchInit - stretchTarget;
  const maxYScale = 2.5;
  const body = document.body;
  
 // let mySplitText = new SplitText('.txt', {type:"chars", charsClass:"char", position: "relative" }); 
  let chars = selectAll('.char');
  let txt = select('.txt');
  
  let numChars = chars.length;
  let isMouseDown = false;
  let letters = selectAll('.char');
  let mouseInitialY = 0;
  let mouseFinalY = 0;
  let distY = 0;
  let charIndexSelected = 0;
  let charH = 0;
  let elasticDropOff = 0.8; // The higher the value the less dispersion of elasticity.
  let dragYScale = 0;
  
  function init() {
      resize();
      
      gsap.set(stage, { autoAlpha: 1 });
      gsap.set(chars, {
          transformOrigin: 'center bottom'
      })
      animInTxt();
  }
  
  function animInTxt() {
    let elem = document.querySelector('.char');
    
    if (elem) { // Check if elem is not null
        let rect = elem.getBoundingClientRect();
        gsap.from(chars, {
            y: () => -1 * (rect.y + charH + 500), // add an extra 100px buffer to make sure off screen
            fontWeight: weightTarget,
            fontStretch: stretchTarget,
            scaleY: 2,
            ease: "elastic(0.2, 0.1)",
            duration: 1.5,
            delay: 0.5,
            stagger: {
                each: 0.05,
                from: 'random'
            },
            onComplete: initEvents
        });
    } else {
        console.warn("Element with class 'char' not found.");
    }
}

  
  function initEvents() {
      
      body.onmouseup = function(e) { 
          if(isMouseDown) {
              mouseFinalY = e.clientY;
              isMouseDown = false;
              snapBackText();
              body.classList.remove("grab");
          }
      }
      
      body.onmousemove = function(e) { 
          if(isMouseDown) {
              mouseFinalY = e.clientY;
              calcDist();
              setFontDragDimensions();
          }
      }
      
      body.addEventListener("mouseleave", (event) => {  
          if (event.clientY <= 0 || event.clientX <= 0 || (event.clientX >= window.innerWidth || event.clientY >= window.innerHeight)) {  
              snapBackText();
              isMouseDown = false;
          }  
      });
      
      chars.forEach((char, index) => {
          char.addEventListener("mousedown", function(e) {
              mouseInitialY = e.clientY;
              charIndexSelected = index;
              charSelected = e.target;
              isMouseDown = true;
              body.classList.add("grab");
              console.clear();
          });
      })
  }
  
  function calcDist() {
      let maxYDragDist = charH*(maxYScale-1);
      distY = mouseInitialY - mouseFinalY;
      dragYScale = distY/maxYDragDist;
      if(dragYScale>(maxYScale-1)) {
          dragYScale = maxYScale-1;
      }
      else if (dragYScale<-0.5) {
          dragYScale = -0.5;
      }
  }
  
  function setFontDragDimensions() {
      gsap.to(chars, {
          y: (index, target) => {
              let fracDispersion = calcfracDispersion(index);
              return fracDispersion*-50;
          },
          fontWeight: (index, target) => {
              let fracDispersion = calcfracDispersion(index);
              return (weightInit - (fracDispersion*weightDiff));
          },
          fontStretch: (index, target) => {
              let fracDispersion = calcfracDispersion(index);
              return (stretchInit - (fracDispersion*stretchDiff));
          },
          scaleY: (index, target) => {
              let fracDispersion = calcfracDispersion(index);
              let scaleY = 1 + fracDispersion;
              if(scaleY<0.5) scaleY = 0.5;
              return scaleY;
          },
          ease: "power4",
          duration: 0.6
      });
  }
  
  function calcfracDispersion(index) {
      let dispersion = 1 - (Math.abs(index-charIndexSelected)/(numChars*elasticDropOff)); // fractional index dispersion
      return dispersion*dragYScale;
  }
  
  function snapBackText() {
      gsap.to(chars, {
          y: 0,
          fontWeight: weightInit,
          fontStretch: stretchInit,
          scale: 1,
          ease: "elastic(0.35, 0.1)",
          duration: 1,
          stagger: {
              each: 0.02,
              from: charIndexSelected
          }
      })
  }
  
  function resize() {
    if (txt) { // Only access offsetHeight if txt is not null
        charH = txt.offsetHeight;
    } else {
        console.warn("Element with class 'txt' not found.");
    }
  }
  
  window.onload = () => {
    init();
  };
  
  window.onresize = () => {
    resize();
  };