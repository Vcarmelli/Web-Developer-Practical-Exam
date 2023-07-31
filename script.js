// 072623

// for changing car color in new paint job page
const currentSelectedColor = document.getElementById('current-select');
const targetSelectedColor = document.getElementById('target-select');
const currentSelectedImage = document.getElementById('current-car');
const targetSelectedImage = document.getElementById('target-car');

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
        case 'Red':
            imageUrl = '/images/Red.png';
            console.log("Red Car");
            break;
        case 'Green':
            imageUrl = '/images/Green.png';
            console.log("Green Car");
            break;
        case 'Blue':
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
        case 'Red':
            imageUrl = '/images/Red.png';
            console.log("Red Car");
            break;
        case 'Green':
            imageUrl = '/images/Green.png';
            console.log("Green Car");
            break;
        case 'Blue':
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


function submitData() {
    // jQuery syntax
    $(document).ready(function() {
        var data = {
            action: action,
            plateNum: $('#plateNum').val(),
            currentColor: $('#current-select').val(),
            targetColor: $('#target-select').val()
        };

        $.ajax({
            url: 'functions.php',
            type: 'post',
            data: data,
            success:function(response){
                alert(response);
                if(response == "Removed from the queue"){
                    $("#"+action).css("display", "none");
                }
            }

        });
        
    });
}