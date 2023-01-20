var lastScrollTop = 0;
var diff = 0;
var directionOverflow = 0;
var hheight = 102;
var delta = 5;
var ticking = false;
const header = document.querySelectorAll(".main-header-bar");
header.forEach((item) => {
  if (item.offsetHeight != 0) {
    const mainBarHeight = item.offsetHeight;
    document.documentElement.style.setProperty(
      "--header-bar-height",
      mainBarHeight + "px"
    );
		hheight = mainBarHeight+1;
  }
});
window.addEventListener(
  "scroll",
  function () {
    var scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    if (Math.abs(lastScrollTop - scrollTop) < delta) {
      return;
    }
    diff = lastScrollTop - scrollTop + diff;
    lastScrollTop = scrollTop;
    if (diff < -hheight) {
      diff = -hheight;
      directionOverflow--;
    } else if (diff > 0) {
      diff = 0;
      directionOverflow++;
    } else {
      directionOverflow = 0;
    }
    if (directionOverflow > 1) {
      directionOverflow = 1;
      return;
    }
    if (directionOverflow < -1) {
      directionOverflow = -1;
      return;
    }
    if (!ticking) {
      window.requestAnimationFrame(() => {
        header.forEach((item) => {
          item.style.transform = `translateY(${diff}px)`;
        });
        ticking = false;
      });
      ticking = true;
    }
  },
  { passive: true }
);
