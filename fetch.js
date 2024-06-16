let leaders = document.querySelector('.leaders');
let check = document.querySelector('.check');
let home = document.querySelector('.home');
let news = document.querySelector('.news');
let url = new URLSearchParams(window.location.search);
let uname = url.get('uname');
home.href = "home.php?uname=" + uname;
news.href = "news.php?uname=" + uname;
console.log(uname);
