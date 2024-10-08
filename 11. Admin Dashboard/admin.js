const btn1 = document.querySelector(".btn-1");
const btn2 = document.querySelector(".btn-2");
const btn3 = document.querySelector(".btn-3");
const btn4 = document.querySelector(".btn-4");

const Users = document.querySelector(".users");
const parkingSlots = document.querySelector(".parking_slots");
const employees = document.querySelector(".employees");
const feedbacks = document.querySelector(".feedbacks");

function showDashboard(dashboardToShow) {
    Users.style.display = 'none';
    parkingSlots.style.display = 'none';
    employees.style.display = 'none';
    feedbacks.style.display = 'none';
    

    dashboardToShow.style.display = 'block';
}

btn1.addEventListener('click', function() {
    showDashboard(Users);
});

btn2.addEventListener('click', function() {
    showDashboard(parkingSlots);
});

btn3.addEventListener('click', function() {
    showDashboard(employees);
});

btn4.addEventListener('click', function() {
    showDashboard(feedbacks);
});

showDashboard(Users);
