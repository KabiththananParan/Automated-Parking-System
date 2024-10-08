const btn1 = document.querySelector(".btn-1");
const btn2 = document.querySelector(".btn-2");
const btn3 = document.querySelector(".btn-3");

const dashboard1 = document.querySelector(".dashboard-1");
const dashboard2 = document.querySelector(".dashboard-2");
const dashboard3 = document.querySelector(".dashboard-3");

function showDashboard(dashboardToShow) {
    dashboard1.style.display = 'none';
    dashboard2.style.display = 'none';
    dashboard3.style.display = 'none';

    dashboardToShow.style.display = 'block';
}

btn1.addEventListener('click', function() {
    showDashboard(dashboard1);
});

btn2.addEventListener('click', function() {
    showDashboard(dashboard2);
});

btn3.addEventListener('click', function() {
    showDashboard(dashboard3);
});

showDashboard(dashboard1);
