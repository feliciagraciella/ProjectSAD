var btnScrollTop = document.getElementById(btnScrollTop)
var rootElement = document.documentElement
function scrollToTop(){
  rootElement.scrollTo({
    top: 0,
    behavior: "smooth"
  })
}
btnScrollTop.addEventListener("click", scrollToTop)

n = new Date();
y = n.getFullYear();
m = n.getMonth() + 1;
d = n.getDate();
document.getElementById("date").innerHTML = m + "/" + d + "/" + y;

// var d = new Date();
// var date = d.getDate();
// var month = d.getMonth() + 1; // Since getMonth() returns month from 0-11 not 1-12
// var year = d.getFullYear();

// var dateStr = date + "/" + month + "/" + year;
// document.write(dateStr);

// var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
// var d = new Date(dateString);
// var dayName = days[d.getDay()];
