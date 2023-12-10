const daysTag = document.querySelector(".days"),
    currentDate = document.querySelector(".current-date"),
    prevNextIcon = document.querySelectorAll(".icons span");

// getting new date, current year and month
let date = new Date(),
    currYear = date.getFullYear(),
    currMonth = date.getMonth();

// storing full name of all months in array
const months = ["January", "February", "March", "April", "May", "June", "July",
    "August", "September", "October", "November", "December"];

const renderCalendar = () => {
    let firstDayofMonth = new Date(currYear, currMonth, 1).getDay(),
        lastDateofMonth = new Date(currYear, currMonth + 1, 0).getDate(),
        lastDayofMonth = new Date(currYear, currMonth, lastDateofMonth).getDay(),
        lastDateofLastMonth = new Date(currYear, currMonth, 0).getDate();
    let liTag = "";

    for (let i = firstDayofMonth; i > 0; i--) {
        liTag += `<li class="inactive" onclick="dateClickHandler(${lastDateofLastMonth - i + 1})">${lastDateofLastMonth - i + 1}</li>`;
    }

    for (let i = 1; i <= lastDateofMonth; i++) {
        let isToday = i === date.getDate() && currMonth === date.getMonth()
            && currYear === date.getFullYear() ? "active" : "";
        liTag += `<li class="${isToday}" onclick="dateClickHandler(${i})">${i}</li>`;
    }

    for (let i = lastDayofMonth; i < 6; i++) {
        liTag += `<li class="inactive" onclick="dateClickHandler(${i - lastDayofMonth + 1})">${i - lastDayofMonth + 1}</li>`;
    }
    currentDate.innerText = `${months[currMonth]} ${currYear}`;
    daysTag.innerHTML = liTag;
}

const dateClickHandler = (clickedDate) => {
    // Update current month and year based on the clicked date
    currYear = date.getFullYear();
    currMonth = date.getMonth();

    // Set the clicked date as the selected date
    date = new Date(currYear, currMonth, clickedDate);

    // Update calendar with the new selected date
    renderCalendar();
}

renderCalendar();

prevNextIcon.forEach(icon => {
    icon.addEventListener("click", () => {
        currMonth = icon.id === "prev" ? currMonth - 1 : currMonth + 1;

        if (currMonth < 0 || currMonth > 11) {
            currYear = icon.id === "prev" ? currYear - 1 : currYear + 1;
            currMonth = icon.id === "prev" ? 11 : 0;
        }

        // Update date based on current year and month
        date = new Date(currYear, currMonth, date.getDate());

        // Update calendar with the new date
        renderCalendar();
    });
});
