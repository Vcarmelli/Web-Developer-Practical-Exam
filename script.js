// 072623

// for changing car color in new paint job page
const currentSelectedColor = document.getElementById('current-select');
const targetSelectedColor = document.getElementById('target-select');
const currentSelectedImage = document.getElementById('current-car');
const targetSelectedImage = document.getElementById('target-car');

// for adding data in table
const jobsTable = document.querySelector("#jobs-table > tbody");

// loading the json file
document.addEventListener("DOMContentLoaded", () => { loadPaintJobs(); });

// changing car color for current color option
currentSelectedColor.addEventListener('change', function() {
    let selectedValue = currentSelectedColor.value;
    
    let imageUrl;
    switch(selectedValue){
        case 'red':
            imageUrl = '/images/Red.png';
            console.log("Red Car");
            break;
        case 'green':
            imageUrl = '/images/Green.png';
            console.log("Green Car");
            break;
        case 'blue':
            imageUrl = '/images/Blue.png';
            console.log("Blue Car");
            break;
        default:
            imageUrl = '/images/Default.png';
            console.log("Default Car");
            break;
    }
    currentSelectedImage.src = imageUrl;
});

// changing car color for target color option
targetSelectedColor.addEventListener('change', function() {
    let selectedValue = targetSelectedColor.value;
    
    let imageUrl;
    switch(selectedValue){
        case 'red':
            imageUrl = '/images/Red.png';
            console.log("Red Car");
            break;
        case 'green':
            imageUrl = '/images/Green.png';
            console.log("Green Car");
            break;
        case 'blue':
            imageUrl = '/images/Blue.png';
            console.log("Blue Car");
            break;
        default:
            imageUrl = '/images/Default.png';
            console.log("Default Car");
            break;
    }
    targetSelectedImage.src = imageUrl;
});


function loadPaintJobs() {
    const request = new XMLHttpRequest();
    request.open("get", "paintjobs.json");
    request.onload = () => {
        try {
            const json = JSON.parse(request.responseText)
            populateJobsTable(json);
        } catch (e){
            console.warn(e);
        }
    }
    request.send();
}

function populateJobsTable(json) {
    // console.log(json);
    while(jobsTable.firstChild){
        jobsTable.removeChild(jobsTable.firstChild);
    }

    json.forEach((row) => {
        const tr = document.createElement("tr");

        row.forEach((cell) => {
            const td = document.createElement("td");
            td.textContent = cell;
            tr.appendChild(td);
        });
        jobsTable.appendChild(tr);
    });
}
