// 072623

// for changing car color in new paint job page
const currentSelectedColor = document.getElementById('current-select');
const targetSelectedColor = document.getElementById('target-select');
const currentSelectedImage = document.getElementById('current-car');
const targetSelectedImage = document.getElementById('target-car');

// to load data in the shop performance part
document.addEventListener("DOMContentLoaded", function() {
    updateTotal();
});

function submitData(plateNum, currColor, targColor) {
    $(document).ready(function() {
        var data = {
            action: "delete",
            plateNum: plateNum,
            currColor:  currColor,
            targColor: targColor

        };

        $.ajax({
            url: '/includes/function.php',
            type: 'POST',
            data: data,
            success: function(response) {
                //alert(response);
                if (response === "Job removed from the queue.") {
                    //document.getElementById(plateNum).style.display = "none";
                    $(".job-row").each(function() {
                        if ($(this).find("td:first").text() === plateNum) {
                            $(this).hide();
                            return false; // Exit the loop
                        }
                    });

                    $(".job-row2").each(function() {
                        if ($(this).find("td:first").text() === plateNum) {
                            $(this).hide();
                            return false; // Exit the loop
                        }
                    });
                    updateTotal();
                }
                else {
                    alert("Cannot be removed yet.");
                }
            }
        });
    })
}

function updateTotal() {
    const total = document.querySelector('.perf-num');
    const red = document.querySelector('.perf-red');
    const blue = document.querySelector('.perf-blue');
    const green = document.querySelector('.perf-green');
    let r = g = b = t = 0;

    $(document).ready(function() {
        $.ajax({
            url: '/includes/function.php',
            type: 'POST',
            data: { action: "update" },
            dataType: 'json',
            success: function(response) {
                console.log(response); // yung json with count and target color
                for (let i = 0; i < response.length; i++) {
                    const count = parseInt(response[i].count);
                    const targColor = response[i].targColor;
                    if (targColor === "Red") {
                        r = count;
                    } else if (targColor === "Green") {
                        g = count;
                    } else if (targColor === "Blue"){
                        b = count;
                    }
                    console.log("Count: " + count + ", targColor: " + targColor);
                    t = r+g+b;

                    // Update the HTML elements only if they exist to prevent null error
                    if (total) total.innerHTML = t;
                    if (red) red.innerHTML = r;
                    if (green) green.innerHTML = g;
                    if (blue) blue.innerHTML = b;
                }
            }
        });
    })
}

// const form = document.querySelector('.form');
// const jobsTable = document.querySelector('.table-body');

// form.addEventListener('submit', event => {
//     event.preventDefault(); // prevent the page to refresh after submitting

//     const formData = new FormData(form);
//     //console.log(formData.get('platenum'));
//     const data = Object.fromEntries(formData);
//     fetch('https://reqres.in/api/users', {  // adds the data to this server
//         method: 'POST',
//         headers: {
//             "Content-Type": "application/json"
//         },
//         body: JSON.stringify(data)
//     })
//     .then(res => {
//         console.log(res);
//         return res.json();
//     })
//     .then(data => {
//         // const tableData = "";
//         // data.map(item =>{
//         //     tableData += `
//         //         <tr>
//         //             <td>${item.plateNum}</td>
//         //             <td>${item.currColor}</td>
//         //             <td>${item.targColor}</td>
//         //             <td>Mark as Completed</td>
//         //         </tr>
//         //     `;
//         // });
//         // document.getElementById("table-body").innerHTML = tableData;
//         console.log("ADDED?");
//     })
//     .catch(error => console.log(error));

// });

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

