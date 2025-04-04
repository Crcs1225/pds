let childrenList = [];

// Function to add a child
function addChild(name, birthdate) {
    if (!name || !birthdate) {
        alert("Please enter both name and birthdate.");
        return false; // Indicate failure
    }

    // Store in the array
    const child = { name, birthdate };
    childrenList.push(child);
    return true; // Indicate success
}

// Function to render the children list in the table
function renderChildren() {
    const tableBody = document.getElementById("spouse-children");
    tableBody.innerHTML = ""; // Clear previous entries

    childrenList.forEach((child, index) => {
        const row = document.createElement("tr");

        const nameCell = document.createElement("td");
        nameCell.textContent = child.name;

        const birthdateCell = document.createElement("td");
        birthdateCell.textContent = child.birthdate;

        const controlCell = document.createElement("td");
        const deleteButton = document.createElement("button");
        deleteButton.textContent = "Remove";
        deleteButton.classList.add("btn", "btn-danger", "btn-sm");
        deleteButton.onclick = () => removeChild(index); // Use index for removal

        controlCell.appendChild(deleteButton);
        row.appendChild(nameCell);
        row.appendChild(birthdateCell);
        row.appendChild(controlCell);
        tableBody.appendChild(row);
    });
}

// Function to remove a child by index
function removeChild(index) {
    if (index >= 0 && index < childrenList.length) {
        childrenList.splice(index, 1);
        renderChildren(); // Re-render the list after removal
    }
}

// Event listener for adding a child
document.getElementById("Spouse-Add-Children").addEventListener("click", function() {
    const nameInput = document.getElementById("Children_Fullname");
    const birthdateInput = document.getElementById("Children_Birthdate");
    const name = nameInput.value.trim();
    const birthdate = birthdateInput.value.trim();

    if (addChild(name, birthdate)) {
        renderChildren(); // Render the updated list
        nameInput.value = ""; // Clear input fields
        birthdateInput.value = "";
    }
});

// Function to get the children list for storage
function getChildrenList() {
    return childrenList;
}





let civilServiceData = []; // Array to store the data

document.getElementById("addEntry").addEventListener("click", function () { const serviceType = document.getElementById("serviceType").value; const rating = document.getElementById("rating").value; const examDate = document.getElementById("examDate").value; const examLocation = document.getElementById("examLocation").value; const licenseNumber = document.getElementById("licenseNumber").value; const validityDate = document.getElementById("validityDate").value;

    if (!serviceType) {
        alert("Please enter a service/license type.");
        return;
    }
    
    // Create an object to store the entry
    const entry = {
        id: Date.now(), // Unique ID for deletion reference  MODIFY LATER
        serviceType,
        rating,
        examDate,
        examLocation,
        licenseNumber,
        validityDate
    };
    
    // Store data in the array
    civilServiceData.push(entry);
    
    // Update the UI
    renderCivilServiceData();
    clearCivilServiceForm();
    // Clear inputs

});

function renderCivilServiceData() { const tableBody = document.getElementById("civilServiceTable"); const listContainer = document.getElementById("civilServiceList");


    tableBody.innerHTML = ""; // Clear table
listContainer.innerHTML = ""; // Clear list

civilServiceData.forEach(entry => {
    // Table row (for large screens)
    tableBody.innerHTML += `
        <tr data-id="${entry.id}">
            <td>${entry.serviceType}</td>
            <td>${entry.rating}</td>
            <td>${entry.examDate}</td>
            <td>${entry.examLocation}</td>
            <td>${entry.licenseNumber}</td>
            <td>${entry.validityDate}</td>
            <td><button class="btn btn-danger btn-sm deleteEntry" data-id="${entry.id}">Delete</button></td>
        </tr>`;

    // List entry (for small screens)
    listContainer.innerHTML += `
        <div class="border p-3 mb-2" data-id="${entry.id}">
            <p><strong>Service Type:</strong> ${entry.serviceType}</p>
            <p><strong>Rating:</strong> ${entry.rating}</p>
            <p><strong>Exam Date:</strong> ${entry.examDate}</p>
            <p><strong>Exam Location:</strong> ${entry.examLocation}</p>
            <p><strong>License Number:</strong> ${entry.licenseNumber}</p>
            <p><strong>Validity Date:</strong> ${entry.validityDate}</p>
            <button class="btn btn-danger btn-sm deleteEntry" data-id="${entry.id}">Delete</button>
        </div>`;
});
}

// Delete functionality 
document.addEventListener("click", function (event) { if (event.target.classList.contains("deleteEntry")) { const entryId = parseInt(event.target.getAttribute("data-id"));
    // Remove from array
    civilServiceData = civilServiceData.filter(entry => entry.id !== entryId);
    
    // Update the UI
    renderCivilServiceData();
}
}); function clearCivilServiceForm() { document.getElementById("serviceType").value = ""; document.getElementById("rating").value = ""; document.getElementById("examDate").value = ""; document.getElementById("examLocation").value = ""; document.getElementById("licenseNumber").value = ""; document.getElementById("validityDate").value = ""; }

function clearCivilList() { 
    //code here-----> 
    return civilServiceData; 
}




let workExperienceData = []; // Array to store work experience entries

document.getElementById("addWorkEntry").addEventListener("click", function () {
    const workFrom = document.getElementById("workFrom").value;
    const workTo = document.getElementById("workTo").value;
    const positionTitle = document.getElementById("positionTitle").value;
    const department = document.getElementById("department").value;
    const monthlySalary = document.getElementById("monthlySalary").value;
    const salaryGrade = document.getElementById("salaryGrade").value;
    const statusAppointment = document.getElementById("statusAppointment").value;
    const govService = document.getElementById("govService").value;

    if (!positionTitle || !department) {
        alert("Please enter position title and department.");
        return;
    }

    // Create an entry object
    const entry = {
        id: Date.now(), // Unique ID for deletion reference
        workFrom,
        workTo,
        positionTitle,
        department,
        monthlySalary,
        salaryGrade,
        statusAppointment,
        govService
    };

    // Store data in the array
    workExperienceData.push(entry);

    // Update the UI
    renderWorkExperienceData();
    clearWorkExperienceForm();
    // Clear inputs

});

function renderWorkExperienceData() {
    const tableBody = document.getElementById("workExperienceTable");
    const listContainer = document.getElementById("workExperienceList");

    tableBody.innerHTML = ""; // Clear table
    listContainer.innerHTML = ""; // Clear list

    workExperienceData.forEach(entry => {
        // Table row (for large screens)
        tableBody.innerHTML += `
            <tr data-id="${entry.id}">
                <td>${entry.workFrom}</td>
                <td>${entry.workTo}</td>
                <td>${entry.positionTitle}</td>
                <td>${entry.department}</td>
                <td>${entry.monthlySalary}</td>
                <td>${entry.salaryGrade}</td>
                <td>${entry.statusAppointment}</td>
                <td>${entry.govService}</td>
                <td><button class="btn btn-danger btn-sm deleteWorkEntry" data-id="${entry.id}">Delete</button></td>
            </tr>`;

        // List entry (for small screens)
        listContainer.innerHTML += `
            <div class="border p-3 mb-2" data-id="${entry.id}">
                <p><strong>Position:</strong> ${entry.positionTitle}</p>
                <p><strong>Department:</strong> ${entry.department}</p>
                <p><strong>Dates:</strong> ${entry.workFrom} - ${entry.workTo}</p>
                <p><strong>Salary:</strong> ${entry.monthlySalary}</p>
                <p><strong>Grade:</strong> ${entry.salaryGrade}</p>
                <p><strong>Status:</strong> ${entry.statusAppointment}</p>
                <p><strong>Gov Service:</strong> ${entry.govService}</p>
                <button class="btn btn-danger btn-sm deleteWorkEntry" data-id="${entry.id}">Delete</button>
            </div>`;
    });
}

// Delete functionality
document.addEventListener("click", function (event) {
    if (event.target.classList.contains("deleteWorkEntry")) {
        const entryId = parseInt(event.target.getAttribute("data-id"));
        
        // Remove from array
        workExperienceData = workExperienceData.filter(entry => entry.id !== entryId);
        
        // Update the UI
        renderWorkExperienceData();
    }
});
function clearWorkExperienceForm() {
    document.getElementById("workFrom").value = "";
    document.getElementById("workTo").value = "";
    document.getElementById("positionTitle").value = "";
    document.getElementById("department").value = "";
    document.getElementById("monthlySalary").value = "";
    document.getElementById("salaryGrade").value = "";
    document.getElementById("statusAppointment").value = "";
    document.getElementById("govService").value = "";
}

function workExperienceList() {
    //code here----->
    console.log("Fetching Work Experience Data:", workExperienceData);
    return workExperienceData;
}



let voluntaryWorkData = []; // Array to store voluntary work entries

document.getElementById("addVolEntry").addEventListener("click", function () {
    const volOrgName = document.getElementById("volOrgName").value;
    const volWorkFrom = document.getElementById("volWorkFrom").value;
    const volWorkTo = document.getElementById("volWorkTo").value;
    const volHours = document.getElementById("volHours").value;
    const volPosition = document.getElementById("volPosition").value;

    if (!volOrgName || !volPosition) {
        alert("Please enter organization name and position.");
        return;
    }

    // Create an entry object
    const entry = {
        id: Date.now(), // Unique ID for deletion reference
        volOrgName,
        volWorkFrom,
        volWorkTo,
        volHours,
        volPosition
    };

    // Store data in the array
    voluntaryWorkData.push(entry);

    // Update the UI
    renderVoluntaryWorkData();
    clearVoluntaryWorkForm();
    // Clear inputs
});

function renderVoluntaryWorkData() {
    const tableBody = document.getElementById("voluntaryWorkTable");
    const listContainer = document.getElementById("voluntaryWorkList");

    tableBody.innerHTML = ""; // Clear table
    listContainer.innerHTML = ""; // Clear list

    voluntaryWorkData.forEach(entry => {
        // Append to table
        tableBody.innerHTML += `
            <tr data-id="${entry.id}">
                <td>${entry.volOrgName}</td>
                <td>${entry.volWorkFrom}</td>
                <td>${entry.volWorkTo}</td>
                <td>${entry.volHours}</td>
                <td>${entry.volPosition}</td>
                <td><button class="btn btn-danger btn-sm deleteVolEntry" data-id="${entry.id}">Delete</button></td>
            </tr>`;

        // Append to list (for small screens)
        listContainer.innerHTML += `
            <div class="card mb-2" data-id="${entry.id}">
                <div class="card-body">
                    <h5 class="card-title">${entry.volOrgName}</h5>
                    <p class="card-text"><b>Position:</b> ${entry.volPosition}</p>
                    <p class="card-text"><b>From:</b> ${entry.volWorkFrom} <b>To:</b> ${entry.volWorkTo}</p>
                    <p class="card-text"><b>Hours:</b> ${entry.volHours}</p>
                    <button class="btn btn-danger btn-sm deleteVolEntry" data-id="${entry.id}">Delete</button>
                </div>
            </div>`;
    });
}


// Delete functionality
document.addEventListener("click", function (event) {
    if (event.target.classList.contains("deleteVolEntry")) {
        const entryId = parseInt(event.target.getAttribute("data-id"));
        
        // Remove from array
        voluntaryWorkData = voluntaryWorkData.filter(entry => entry.id !== entryId);
        
        // Update the UI
        renderVoluntaryWorkData();
    }
});
function clearVoluntaryWorkForm() {
    document.getElementById("volOrgName").value = "";
    document.getElementById("volWorkFrom").value = "";
    document.getElementById("volWorkTo").value = "";
    document.getElementById("volHours").value = "";
    document.getElementById("volPosition").value = "";
}

function voluntaryWorkList() {
    //code here----->
    return voluntaryWorkData;
}

//learning development
let learningDevelopmentData = []; // Array to store learning & development entries

document.getElementById("addLdEntry").addEventListener("click", function () {
    const ldTitle = document.getElementById("ldTitle").value;
    const ldFrom = document.getElementById("ldFrom").value;
    const ldTo = document.getElementById("ldTo").value;
    const ldHours = document.getElementById("ldHours").value;
    const ldType = document.getElementById("ldType").value;
    const ldConductedBy = document.getElementById("ldConductedBy").value;

    if (!ldTitle || !ldType || !ldConductedBy) {
        alert("Please enter training title, type, and sponsor.");
        return;
    }

    // Create an entry object
    const entry = {
        id: Date.now(), // Unique ID for deletion reference
        ldTitle,
        ldFrom,
        ldTo,
        ldHours,
        ldType,
        ldConductedBy
    };

    // Store data in the array
    learningDevelopmentData.push(entry);

    // Update the UI
    renderLearningDevelopmentData();
    clearLearningDevelopmentForm();
});

function renderLearningDevelopmentData() {
    const tableBody = document.getElementById("learningDevelopmentTable");
    const listView = document.getElementById("learningDevelopmentList");
    
    tableBody.innerHTML = ""; // Clear table
    listView.innerHTML = ""; // Clear list

    learningDevelopmentData.forEach(entry => {
        // Update table for larger screens
        tableBody.innerHTML += `
            <tr data-id="${entry.id}">
                <td>${entry.ldTitle}</td>
                <td>${entry.ldFrom}</td>
                <td>${entry.ldTo}</td>
                <td>${entry.ldHours}</td>
                <td>${entry.ldType}</td>
                <td>${entry.ldConductedBy}</td>
                <td><button class="btn btn-danger btn-sm deleteLdEntry" data-id="${entry.id}">Delete</button></td>
            </tr>`;

        // Update list for small screens
        listView.innerHTML += `
            <div class="card mb-2" data-id="${entry.id}">
                <div class="card-body">
                    <h6 class="card-title"><b>${entry.ldTitle}</b></h6>
                    <p><b>Type:</b> ${entry.ldType}</p>
                    <p><b>From:</b> ${entry.ldFrom} - <b>To:</b> ${entry.ldTo}</p>
                    <p><b>Hours:</b> ${entry.ldHours}</p>
                    <p><b>Sponsored by:</b> ${entry.ldConductedBy}</p>
                    <button class="btn btn-danger btn-sm deleteLdEntry" data-id="${entry.id}">Delete</button>
                </div>
            </div>`;
    });
}


// Delete functionality
document.addEventListener("click", function (event) {
    if (event.target.classList.contains("deleteLdEntry")) {
        const entryId = parseInt(event.target.getAttribute("data-id"));
        
        // Remove from array
        learningDevelopmentData = learningDevelopmentData.filter(entry => entry.id !== entryId);
        
        // Update the UI
        renderLearningDevelopmentData();
    }
});

function clearLearningDevelopmentForm() {
    document.getElementById("ldTitle").value = "";
    document.getElementById("ldFrom").value = "";
    document.getElementById("ldTo").value = "";
    document.getElementById("ldHours").value = "";
    document.getElementById("ldType").value = "";
    document.getElementById("ldConductedBy").value = "";
}

function learningDevelopmentList() {
    //code here----->
    return learningDevelopmentData;
}

//other information
// Store data in an object for future handling
let otherInformationData = {
    specialSkills: [],
    nonAcademicDistinctions: [],
    memberships: []
};

// Function to add an item to a list
function addItem(inputId, listId, dataKey) {
    const input = document.getElementById(inputId);
    const list = document.getElementById(listId);
    const value = input.value.trim();

    if (value === "") {
        alert("Please enter a valid input.");
        return;
    }

    // Create a unique ID
    const itemId = Date.now();

    // Store in the data object
    otherInformationData[dataKey].push({ id: itemId, value });

    // Create list item with delete button
    const listItem = document.createElement("li");
    listItem.className = "list-group-item d-flex justify-content-between align-items-center";
    listItem.dataset.id = itemId;
    listItem.innerHTML = `
        ${value}
        <button class="btn btn-danger btn-sm delete-btn">x</button>
    `;

    // Append to the list
    list.appendChild(listItem);

    // Clear input
    input.value = "";
}

// Function to delete an item
document.addEventListener("click", function (event) {
    if (event.target.classList.contains("delete-btn")) {
        const listItem = event.target.parentElement;
        const listId = listItem.parentElement.id;
        const dataKey = listId.replace("List", "");

        // Remove from UI
        listItem.remove();

        // Remove from data object
        otherInformationData[dataKey] = otherInformationData[dataKey].filter(item => item.id !== parseInt(listItem.dataset.id));
    }
});

// Event Listeners for adding data
document.getElementById("addSkill").addEventListener("click", function () {
    addItem("specialSkillsInput", "specialSkillsList", "specialSkills");
});
document.getElementById("addRecognition").addEventListener("click", function () {
    addItem("nonAcademicInput", "nonAcademicList", "nonAcademicDistinctions");
});
document.getElementById("addMembership").addEventListener("click", function () {
    addItem("membershipInput", "membershipList", "memberships");
});

// Function to retrieve stored data
function getOtherInformationData() {
    return otherInformationData;
}


//references
let references = []; // Move this outside the function to make it global

document.addEventListener("DOMContentLoaded", function () {
    
    function addReference(name, address, phone) {
        if (!name || !address || !phone) {
            alert("Please fill out all fields.");
            return;
        }

        references.push({ name, address, phone });

        // For Small Screens: List Item
        let listItem = document.createElement("li");
        listItem.classList.add("list-group-item");
        listItem.innerHTML = `
            <strong>Name:</strong> ${name}<br>
            <strong>Address:</strong> ${address}<br>
            <strong>Tel No.:</strong> ${phone}
            <button class="btn btn-danger btn-sm float-end">
                <i class="bi bi-trash"></i>
            </button>
        `;

        listItem.querySelector("button").addEventListener("click", function () {
            removeReference(name, address, phone);
        });

        document.getElementById("referenceList").appendChild(listItem);

        // For Large Screens: Table Row
        let tableRow = document.createElement("tr");
        tableRow.innerHTML = `
            <td>${name}</td>
            <td>${address}</td>
            <td>${phone}</td>
            <td>
                <button class="btn btn-danger btn-sm float-end">
                    <i class="bi bi-trash"></i>
                </button>
            </td>
        `;

        tableRow.querySelector("button").addEventListener("click", function () {
            removeReference(name, address, phone);
        });

        document.getElementById("referenceTableBody").appendChild(tableRow);

        // Clear Inputs
        document.getElementById("RefName").value = "";
        document.getElementById("RefAddress").value = "";
        document.getElementById("RefTelNo").value = "";
    }

    function removeReference(name, address, phone) {
        references = references.filter(ref => ref.name !== name || ref.address !== address || ref.phone !== phone);

        document.getElementById("referenceList").innerHTML = "";
        document.getElementById("referenceTableBody").innerHTML = "";

        references.forEach(ref => addReference(ref.name, ref.address, ref.phone));
    }

    document.getElementById("ReferencesAdd").addEventListener("click", function () {
        let name = document.getElementById("RefName").value.trim();
        let address = document.getElementById("RefAddress").value.trim();
        let phone = document.getElementById("RefTelNo").value.trim();
        addReference(name, address, phone);
    });
});



//submit button
document.addEventListener("DOMContentLoaded", function () {

    function checkLastPage() {
        const lastPage = document.querySelector("#lastPage"); 
        const submitButton = document.getElementById("floatingSubmit");

        if (!lastPage) return; // Prevent errors if #lastPage is missing

        const lastPagePosition = lastPage.getBoundingClientRect();
        const windowHeight = window.innerHeight;

        if (lastPagePosition.top < windowHeight - 100) { 
            submitButton.classList.remove("d-none"); // Show the button
            submitButton.classList.add("animate-float"); // Smooth floating effect
        } else {
            submitButton.classList.add("d-none"); // Hide the button
            submitButton.classList.remove("animate-float");
        }
    }

    window.addEventListener("scroll", checkLastPage);
    checkLastPage(); // Run on page load in case user is already scrolled down
});




function collectUserInputs() {
    const section = document.getElementById("lastPartSection");

    if (!section) {
        console.error(" Error: Section #lastPartSection not found!");
        return null;
    }


    const formData = new FormData();

    section.querySelectorAll("input, textarea, select").forEach(field => {
        if (!field.name) {
            console.warn(` Skipping field without a name attribute:`, field);
            return;
        }

        if (field.type === "file") {
            if (field.files.length > 0) {
                formData.append(field.name, field.files[0]); 
                console.log(` File Input Added: ${field.name} -> ${field.files[0].name}`);
            } else {
                console.warn(` No file selected for ${field.name}`);
            }
        } else {
            formData.append(field.name, field.value.trim()); 
            console.log(` Text Input Added: ${field.name} -> "${field.value.trim()}"`);
        }
    });

    //  Add user personalInfoId if available
    if (typeof id !== "undefined" && id) {
        formData.append("personalInfoId", id);
        console.log(` Added personalInfoId: ${id}`);
    } else {
        console.warn(" Warning: personalInfoId is not set or undefined!");
    }

    console.log(" FormData Contents:");
    for (let pair of formData.entries()) {
        console.log(` ${pair[0]}:`, pair[1]);
    }
    return formData;
}




//submit button



document.getElementById("Submit").addEventListener("click", function () {
    processAndSubmitData();
    
});


