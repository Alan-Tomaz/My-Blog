//popup variable declaration
let popup = [];

//show a confirm message
function showConfirmMessage(i) {
    popup[i] = document.getElementById("popup" + i);
    popup[i].classList.add("open-popup");
}

//hide the confirm message
function hideConfirmMessage(i) {
    popup[i] = document.getElementById("popup" + i);
    popup[i].classList.remove("open-popup");
}


let popupComment = [];
//show the confirm message in the comment section
function showConfirmMessageComment(i) {
    popupComment[i] = document.getElementById("popup-comment-section" + i);
    popupComment[i].classList.add("open-popup-comment-section");
}

//hide the confirm message in the comment section
function hideConfirmMessageComment(i) {
    popupComment[i] = document.getElementById("popup-comment-section" + i);
    popupComment[i].classList.remove("open-popup-comment-section");
}

const navItems = document.querySelector(".nav-items-right");
const openNavBtn = document.querySelector("#open-nav-btn");
const closeNavBtn = document.querySelector("#close-nav-btn");

//opens nav dropdown 
const openNav = () => {
    navItems.style.display = "flex"
    openNavBtn.style.display = "none";
    closeNavBtn.style.display = "inline-block";
}

const closeNav = () => {
    navItems.style.display = "none";
    openNavBtn.style.display = "inline-block";
    closeNavBtn.style.display = "none";
}

openNavBtn.addEventListener("click", openNav);
closeNavBtn.addEventListener("click", closeNav);

const sidebar = document.querySelector(".profile-sidebar");
const showSidebarBtn = document.querySelector('#show-sidebar-btn');
const hideSidebarBtn = document.querySelector('#hide-sidebar-btn');

// shows sidebar on small devices
const ShowSidebar = () => {
    sidebar.style.left = '0';
    showSidebarBtn.style.display = 'none';
    hideSidebarBtn.style.display = 'inline-block';
}

//hide sidebar on small devices
const HideSidebar = () => {
    sidebar.style.left = '-100%';
    showSidebarBtn.style.display = 'inline-block';
    hideSidebarBtn.style.display = 'none';
}

showSidebarBtn.addEventListener('click', ShowSidebar);
hideSidebarBtn.addEventListener('click', HideSidebar);