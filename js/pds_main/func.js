let childrenList = [];

// Function to add a child
function addChild(name, birthdate) {
    if (!name || !birthdate) {
        Swal.fire("Please enter both name and birthdate.");
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




function collectUserInputs(personalInfoId) {
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
    if (typeof personalInfoId !== "undefined" && personalInfoId) {
        formData.append("personalInfoId", personalInfoId);
        console.log(` Added personalInfoId: ${personalInfoId}`);
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

    const { mode } = getModeFromURL();
    if (mode === "edit") {
        processAndSubmitData(existingInfo);  // Pass the loaded values
    } else {
        processAndSubmitData(); // Create mode
    }
});


function getModeFromURL() {
    const urlParams = new URLSearchParams(window.location.search);
    const document_id = urlParams.get("id"); // Used for edit mode
    const pds_name = urlParams.get("name"); // Used for create mode
    const user_id = urlParams.get("user_id");

    return {
        mode: document_id ? "edit" : "create",
        document_id,
        pds_name,
        user_id
    };
}

document.addEventListener("DOMContentLoaded", async () => {
    const { mode, document_id } = getModeFromURL();
    if (mode === "edit") {
        await fetchAndPrefillForm(document_id);
    }
    // Enable button after info is ready
    document.getElementById("Submit").disabled = false;
});
function removeRow(button) {
    button.closest("tr").remove();
}
let existingInfo = {};
async function fetchAndPrefillForm(id) {
    try {
        const response = await fetch(`/pds/view_model/pds_main/getinfo.php?id=${id}`);
        const data = await response.json();
        existingInfo = {
            user_id: data.info.user_id,
            pds_name: data.info.pds_name,
            document_id: id
        };
        console.log("Raw Data from PHP:", data); // Log the entire response

        if (data.success && data.info) {
            
            console.log("Fetched data:", data);
            const personalInfo = data.info;
            document.querySelector('[name="Surname"]').value = personalInfo.surname || '';
            document.querySelector('[name="Firstname"]').value = personalInfo.firstname || '';
            document.querySelector('[name="cs_id_no"]').value = personalInfo.cs_id_no || '';
            document.querySelector('[name="DateOfBirth"]').value = personalInfo.date_of_birth || '';
            document.querySelector('[name="MiddleName"]').value = personalInfo.middle_name || '';
            document.querySelector('[name="NameExtension"]').value = personalInfo.name_extension || '';
            document.querySelector('[name="PlaceOfBirth"]').value = personalInfo.place_of_birth || '';
            document.querySelector('[name="Sex"]').value = personalInfo.sex || '';
            document.querySelector('[name="CivilStatus"]').value = personalInfo.civil_status || '';
            document.querySelector('[name="Height"]').value = personalInfo.height || '';
            document.querySelector('[name="Weight"]').value = personalInfo.weight || '';
            document.querySelector('[name="BloodType"]').value = personalInfo.bloodtype || '';
            document.querySelector('[name="GSIS"]').value = personalInfo.gsis_no || '';
            document.querySelector('[name="PagIBIG"]').value = personalInfo.pagibig_no || '';
            document.querySelector('[name="SSS"]').value = personalInfo.sss_no || '';
            document.querySelector('[name="TIN"]').value = personalInfo.tin_no || '';


            document.querySelector('[name="AgencyNo"]').value = personalInfo.agency_employee_no || '';
            document.querySelector('[name="Citizenship1"]').value = personalInfo.citizenship || '';
            document.querySelector('[name="Citizenship2"]').value = personalInfo.dual_citizenship || '';
            document.querySelector('[name="dualCountry"]').value = personalInfo.country || '';
            document.querySelector('[name="ResHouse_Block_LotNo"]').value = personalInfo.res_house_no || '';
            document.querySelector('[name="ResStreet"]').value = personalInfo.res_street || '';
            document.querySelector('[name="ResSubdivision_Village"]').value = personalInfo.res_subdivision || '';
            document.querySelector('[name="ResBarangay"]').value = personalInfo.res_barangay || '';
            document.querySelector('[name="ResCity_Municipality"]').value = personalInfo.res_city || '';
            document.querySelector('[name="ResProvince"]').value = personalInfo.res_province || '';
            document.querySelector('[name="ResZipCode"]').value = personalInfo.res_zip || '';
            document.querySelector('[name="PerHouse_Block_LotNo"]').value = personalInfo.perm_house_no || '';
            document.querySelector('[name="PerStreet"]').value = personalInfo.perm_street || '';
            document.querySelector('[name="PerSubdivision_Village"]').value = personalInfo.perm_subdivision || '';
            document.querySelector('[name="PerBarangay"]').value = personalInfo.perm_barangay || '';
            document.querySelector('[name="PerCity_Municipality"]').value = personalInfo.perm_city || '';
            document.querySelector('[name="PerProvince"]').value = personalInfo.perm_province || '';
            document.querySelector('[name="PerZipCode"]').value = personalInfo.perm_zip || '';
            document.querySelector('[name="TelephoneNumber"]').value = personalInfo.telephone_no || '';
            document.querySelector('[name="MobileNumber"]').value = personalInfo.mobile_no || '';
            document.querySelector('[name="EmailAdd"]').value = personalInfo.email || '';
            // Repeat for other fields


            if (data.family_background && data.family_background.length > 0) {
                const familyBackground = data.family_background[0];
                document.querySelector('[name="Spouse_Surname"]').value = familyBackground.spouse_surname || '';
                document.querySelector('[name="Spouse_Firstname"]').value = familyBackground.spouse_firstname || '';
                document.querySelector('[name="Spouse_NameExtension"]').value = familyBackground.spouse_name_extension || '';
                document.querySelector('[name="Spouse_Middlename"]').value = familyBackground.spouse_middlename || '';
                document.querySelector('[name="Spouse_Occupation"]').value = familyBackground.spouse_occupation || '';
                document.querySelector('[name="Spouse_Employer_Businessname"]').value = familyBackground.spouse_employer || '';
                document.querySelector('[name="Spouse_BusinessAddress"]').value = familyBackground.spouse_business_address || '';
                document.querySelector('[name="Spouse_TelephoneNumber"]').value = familyBackground.spouse_telephone_no || '';
                document.querySelector('[name="Father_Surname"]').value = familyBackground.father_surname || '';
                document.querySelector('[name="Father_Firstname"]').value = familyBackground.father_firstname || '';
                document.querySelector('[name="Father_NameExtension"]').value = familyBackground.father_name_extension || '';
                document.querySelector('[name="Father_Middlename"]').value = familyBackground.father_middlename || '';
                document.querySelector('[name="Mother_MaidenName"]').value = familyBackground.mother_maiden_name || '';
                document.querySelector('[name="Mother_Surname"]').value = familyBackground.mother_surname || '';
                document.querySelector('[name="Mother_Firstname"]').value = familyBackground.mother_firstname || '';
                document.querySelector('[name="Mother_Middlename"]').value = familyBackground.mother_middlename || '';
            }
            if (data.children && data.children.length > 0) {
                childrenList = data.children;
                const tableBody = document.getElementById("spouse-children");
                tableBody.innerHTML = ""; // Clear existing rows if any
            
                childrenList.forEach((child) => {
                    const row = document.createElement("tr");
            
                    row.innerHTML = `
                        <td>
                            ${child.full_name || ''}
                        </td>
                        <td>
                           ${child.date_of_birth || ''}
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger" onclick="removeRow(this)">Remove</button>
                        </td>
                    `;
            
                    tableBody.appendChild(row);
                });
                
            }
            



            if (data.educational_background && data.educational_background.length > 0) {
                const elementary = data.educational_background[0];
                document.querySelector('[name="elemName"]').value = elementary.name_of_school || '';
                document.querySelector('[name="elemBasicEduc"]').value = elementary.basic_education_degree_course || '';
                document.querySelector('[name="elemFrom"]').value = elementary.from_year || '';
                document.querySelector('[name="elemTo"]').value = elementary.to_year || '';
                document.querySelector('[name="elemUnits"]').value = elementary.highest_level_units_earned || '';
                document.querySelector('[name="elemYrGrad"]').value = elementary.year_graduated || '';
                document.querySelector('[name="elemHonors"]').value = elementary.scholarship_academic_honors_received || '';

                const secondary = data.educational_background[1];
                document.querySelector('[name="secondName"]').value = secondary.name_of_school || '';
                document.querySelector('[name="secondBasicEduc"]').value = secondary.basic_education_degree_course || '';
                document.querySelector('[name="secondFrom"]').value = secondary.from_year || '';
                document.querySelector('[name="secondTo"]').value = secondary.to_year || '';
                document.querySelector('[name="secondUnits"]').value = secondary.highest_level_units_earned || '';
                document.querySelector('[name="secondYrGrad"]').value = secondary.year_graduated || '';
                document.querySelector('[name="secondHonors"]').value = secondary.scholarship_academic_honors_received || '';
                
                const vocational = data.educational_background[2];
                document.querySelector('[name="vocName"]').value = vocational.name_of_school || '';
                document.querySelector('[name="vocCourse"]').value = vocational.basic_education_degree_course || '';
                document.querySelector('[name="vocFrom"]').value = vocational.from_year || '';
                document.querySelector('[name="vocTo"]').value = vocational.to_year || '';
                document.querySelector('[name="vocUnits"]').value = vocational.highest_level_units_earned || '';
                document.querySelector('[name="vocYrGrad"]').value = vocational.year_graduated || '';
                document.querySelector('[name="vocHonors"]').value = vocational.scholarship_academic_honors_received || '';
                
                const college = data.educational_background[3];
                document.querySelector('[name="colName"]').value = college.name_of_school || '';
                document.querySelector('[name="vocCourse"]').value = college.basic_education_degree_course || '';
                document.querySelector('[name="colFrom"]').value = college.from_year || '';
                document.querySelector('[name="colTo"]').value = college.to_year || '';
                document.querySelector('[name="colUnits"]').value = college.highest_level_units_earned || '';
                document.querySelector('[name="colYrGrad"]').value = college.year_graduated || '';
                document.querySelector('[name="colHonors"]').value = college.scholarship_academic_honors_received || '';
                
                const graduate = data.educational_background[4];
                document.querySelector('[name="gradName"]').value = graduate.name_of_school || '';
                document.querySelector('[name="vocCourse"]').value = graduate.basic_education_degree_course || '';
                document.querySelector('[name="gradFrom"]').value = graduate.from_year || '';
                document.querySelector('[name="gradTo"]').value = graduate.to_year || '';
                document.querySelector('[name="gradUnits"]').value = graduate.highest_level_units_earned || '';
                document.querySelector('[name="gradYrGrad"]').value = graduate.year_graduated || '';
                document.querySelector('[name="gradHonors"]').value = graduate.scholarship_academic_honors_received || '';
            

            }
            if (data.civil_service_eligibility && data.civil_service_eligibility.length > 0) {
                civilServiceData = data.civil_service_eligibility;
                const tableBody = document.getElementById("civilServiceTable");
                const mobileList = document.getElementById("civilServiceList");
            
                tableBody.innerHTML = ""; // Clear existing rows
                mobileList.innerHTML = ""; // Clear mobile view
            
                civilServiceData.forEach((record) => {
                    // Desktop table row
                    const row = document.createElement("tr");
                    row.innerHTML = `
                    <tr data-id="${record.id}">
                        <td>${record.career_service}</td>
                        <td>${record.rating}</td>
                        <td>${record.date_of_examination}</td>
                        <td>${record.place_of_examination}</td>
                        <td>${record.license_no}</td>
                        <td>${record.date_of_validity}</td>
                        <td><button class="btn btn-danger btn-sm deleteEntry" data-id="${record.id}">Delete</button></td>
                    </tr>`;
                    tableBody.appendChild(row);
            
                    // Mobile-friendly card view
                    const card = document.createElement("div");
                    card.className = "card mb-2 p-2 border";
                    card.innerHTML = `
                    <div class="border p-3 mb-2" data-id="${record.id}">
                        <p><strong>Service Type:</strong> ${record.career_service}</p>
                        <p><strong>Rating:</strong> ${record.rating}</p>
                        <p><strong>Exam Date:</strong> ${record.date_of_examination}</p>
                        <p><strong>Exam Location:</strong> ${record.place_of_examination}</p>
                        <p><strong>License Number:</strong> ${record.license_no}</p>
                        <p><strong>Validity Date:</strong> ${record.date_of_validity}</p>
                        <button class="btn btn-danger btn-sm deleteEntry" data-id="${record.id}">Delete</button>
                    </div>
                    `;
                    mobileList.appendChild(card);
                });
                
            }

            if (data.work_experience && data.work_experience.length > 0){
                workExperienceData = data.work_experience;
                const tableBody = document.getElementById("workExperienceTable");
                const mobileList = document.getElementById("workExperienceList");

                tableBody.innerHTML = ""; // Clear existing rows
                mobileList.innerHTML = ""; // Clear mobile view

                workExperienceData.forEach((record) => {
                    const row = document.createElement("tr");
                    row.innerHTML = `
                    <tr data-id="${record.id}">
                        <td>${record.work_from}</td>
                        <td>${record.work_to}</td>
                        <td>${record.position_title}</td>
                        <td>${record.department_agency}</td>
                        <td>${record.monthly_salary}</td>
                        <td>${record.salary_grade}</td>
                        <td>${record.status_of_appointment}</td>
                        <td>${record.govt_service}</td>
                        <td><button class="btn btn-danger btn-sm deleteWorkEntry" data-id="${record.id}">Delete</button></td>
                    </tr>
                    `;
                    tableBody.appendChild(row);

                    
                    const card = document.createElement("div");
                    card.className = "card mb-2 p-2 border";
                    card.innerHTML = `
                    <div class="border p-3 mb-2" data-id="${record.id}">
                        <p><strong>Position:</strong> ${record.position_title}</p>
                        <p><strong>Department:</strong> ${record.department_agency}</p>
                        <p><strong>Dates:</strong> ${record.work_from} - ${record.work_to}</p>
                        <p><strong>Salary:</strong> ${record.monthly_salary}</p>
                        <p><strong>Grade:</strong> ${record.salary_grade}</p>
                        <p><strong>Status:</strong> ${record.status_of_appointment}</p>
                        <p><strong>Gov Service:</strong> ${record.govt_service}</p>
                        <button class="btn btn-danger btn-sm deleteWorkEntry" data-id="${record.id}">Delete</button>
                    </div>`;

                    mobileList.appendChild(card)
                });
               
            }
            if (data.voluntary_work && data.voluntary_work.length > 0){
                voluntaryWorkData = data.voluntary_work;
                const tableBody = document.getElementById("voluntaryWorkTable");
                const mobileList = document.getElementById("voluntaryWorkList");

                tableBody.innerHTML = ""; // Clear existing rows
                mobileList.innerHTML = ""; // Clear mobile view

                voluntaryWorkData.forEach((record) => {
                    const row = document.createElement("tr");
                    row.innerHTML = `
                    <tr data-id="${record.id}">
                        <td>${record.organization_name_address}</td>
                        <td>${record.work_from}</td>
                        <td>${record.work_to}</td>
                        <td>${record.number_of_hours}</td>
                        <td>${record.position_nature_of_work}</td>
                        <td><button class="btn btn-danger btn-sm deleteVolEntry" data-id="${record.id}">Delete</button></td>
                    </tr>
                    `;
                    tableBody.appendChild(row);

                    
                    const card = document.createElement("div");
                    card.className = "card mb-2 p-2 border";
                    card.innerHTML = `
                    <div class="card mb-2" data-id="${record.id}">
                        <div class="card-body">
                            <h5 class="card-title">${record.organization_name_address}</h5>
                            <p class="card-text"><b>Position:</b> ${record.position_nature_of_work}</p>
                            <p class="card-text"><b>From:</b> ${record.work_from} <b>To:</b> ${record.work_to}</p>
                            <p class="card-text"><b>Hours:</b> ${record.number_of_hours}</p>
                            <button class="btn btn-danger btn-sm deleteVolEntry" data-id="${record.id}">Delete</button>
                        </div>
                    </div>`;

                    mobileList.appendChild(card)
                });
                

            }
            if (data.learning_and_development && data.learning_and_development.length > 0){
                learningDevelopmentData = data.learning_and_development;
                const tableBody = document.getElementById("learningDevelopmentTable");
                const mobileList = document.getElementById("learningDevelopmentList");

                tableBody.innerHTML = ""; // Clear existing rows
                mobileList.innerHTML = ""; // Clear mobile view

                learningDevelopmentData.forEach((record) => {
                    const row = document.createElement("tr");
                    row.innerHTML = `
                    <tr data-id="${record.id}">
                        <td>${record.title}</td>
                        <td>${record.ld_from}</td>
                        <td>${record.ld_to}</td>
                        <td>${record.number_of_hours}</td>
                        <td>${record.type_of_ld}</td>
                        <td>${record.conducted_by}</td>
                        <td><button class="btn btn-danger btn-sm deleteLdEntry" data-id="${record.id}">Delete</button></td>
                    </tr>`;
                    tableBody.appendChild(row);

                    
                    const card = document.createElement("div");
                    card.className = "card mb-2 p-2 border";
                    card.innerHTML =  `
                    <div class="card mb-2" data-id="${record.id}">
                        <div class="card-body">
                            <h6 class="card-title"><b>${record.title}</b></h6>
                            <p><b>Type:</b> ${record.type_of_ld}</p>
                            <p><b>From:</b> ${record.ld_from} - <b>To:</b> ${record.ld_to}</p>
                            <p><b>Hours:</b> ${record.number_of_hours}</p>
                            <p><b>Sponsored by:</b> ${record.conducted_by}</p>
                            <button class="btn btn-danger btn-sm deleteLdEntry" data-id="${record.id}">Delete</button>
                        </div>
                    </div>`;

                    mobileList.appendChild(card)
                });
                

            }
            if (data.special_skills_hobbies && data.special_skills_hobbies.length > 0) {
                otherInformationData.specialSkills = data.special_skills_hobbies.map(skill => ({
                    id: Date.now() + Math.floor(Math.random() * 1000),
                    value: skill.skill_hobby
                }));
            
                const list = document.getElementById("specialSkillsList");
                list.innerHTML = ""; // Clear old content
            
                otherInformationData.specialSkills.forEach((item) => {
                    const listItem = document.createElement("li");
                    listItem.className = "list-group-item d-flex justify-content-between align-items-center";
                    listItem.dataset.id = item.id;
            
                    listItem.innerHTML = `
                        ${item.value}
                        <button class="btn btn-danger btn-sm delete-btn">x</button>
                    `;
                    list.appendChild(listItem);
                });
            }
            
            if (data.non_academic_distinctions && data.non_academic_distinctions.length > 0) {
                otherInformationData.nonAcademicDistinctions = data.non_academic_distinctions.map(distinction => ({
                    id: Date.now() + Math.floor(Math.random() * 1000),
                    value: distinction.recognition
                }));
            
                const list = document.getElementById("nonAcademicList");
                list.innerHTML = "";
            
                otherInformationData.nonAcademicDistinctions.forEach((item) => {
                    const listItem = document.createElement("li");
                    listItem.className = "list-group-item d-flex justify-content-between align-items-center";
                    listItem.dataset.id = item.id;
            
                    listItem.innerHTML = `
                        ${item.value}
                        <button class="btn btn-danger btn-sm delete-btn">x</button>
                    `;
                    list.appendChild(listItem);
                });
            }
            
            if (data.memberships && data.memberships.length > 0) {
                otherInformationData.memberships = data.memberships.map(m => ({
                    id: Date.now() + Math.floor(Math.random() * 1000),
                    value: m.organization_name
                }));
            
                const list = document.getElementById("membershipList");
                list.innerHTML = "";
            
                otherInformationData.memberships.forEach((item) => {
                    const listItem = document.createElement("li");
                    listItem.className = "list-group-item d-flex justify-content-between align-items-center";
                    listItem.dataset.id = item.id;
            
                    listItem.innerHTML = `
                        ${item.value}
                        <button class="btn btn-danger btn-sm delete-btn">x</button>
                    `;
                    list.appendChild(listItem);
                });
            }
            
            if (data.survey_responses && data.survey_responses.length > 0) {
                const responses = data.survey_responses;
                if (responses[0]) {
                    const q1Value = responses[0].answer;
                    if (q1Value === "Yes") {
                        document.getElementById("TDYes").checked = true;
                    } else {
                        document.getElementById("TDNo").checked = true;
                    }
                }
                if (responses[1]) {
                    const q2Value = responses[1].answer;
                    if (q2Value === "Yes") {
                        document.getElementById("FDYes").checked = true;
                    } else {
                        document.getElementById("FDNo").checked = true;
                    }
            
                    // Populate details (textarea)
                    document.getElementById("FDDetails").value = responses[1].details || '';
                }
                if (responses[2]) {
                    const q3Value = responses[2].answer;
                    if (q3Value === "Yes") {
                        document.getElementById("AOYes").checked = true;
                    } else {
                        document.getElementById("AONo").checked = true;
                    }
            
                    // Populate details (textarea)
                    document.getElementById("AODetails").value = responses[2].details || '';
                }
                //start here
                if (responses[3]) {
                    const q4Value = responses[3].answer;
                    if (q4Value === "Yes") {
                        document.getElementById("CCYes").checked = true;
                    } else {
                        document.getElementById("CCNo").checked = true;
                    }
            
                    // Populate details (textarea)
                    document.getElementById("CCDate").value = responses[3].response_date || '';
                    document.getElementById("CCSOC").value = responses[3].details || '';
                }
                if (responses[4]) {
                    const q5Value = responses[4].answer;
                    if (q5Value === "Yes") {
                        document.getElementById("CONYes").checked = true;
                    } else {
                        document.getElementById("CONNo").checked = true;
                    }
            
                    // Populate details (textarea)
                    document.getElementById("CONDetails").value = responses[4].details || '';
                }
                if (responses[5]) {
                    const q6Value = responses[5].answer;
                    if (q6Value === "Yes") {
                        document.getElementById("SFTSYes").checked = true;
                    } else {
                        document.getElementById("SFTSNo").checked = true;
                    }
            
                    // Populate details (textarea)
                    document.getElementById("SFTSDetails").value = responses[5].details || '';
                }
                if (responses[6]) {
                    const q7Value = responses[6].answer;
                    if (q7Value === "Yes") {
                        document.getElementById("CNOLEYes").checked = true;
                    } else {
                        document.getElementById("CNOLENo").checked = true;
                    }
            
                    // Populate details (textarea)
                    document.getElementById("CNOLEDetails").value = responses[6].details || '';
                }
                if (responses[7]) {
                    const q8Value = responses[7].answer;
                    if (q8Value === "Yes") {
                        document.getElementById("RGSYes").checked = true;
                    } else {
                        document.getElementById("RGSNo").checked = true;
                    }
            
                    // Populate details (textarea)
                    document.getElementById("RGSDetails").value = responses[7].details || '';
                }
                if (responses[8]) {
                    const q9Value = responses[8].answer;
                    if (q9Value === "Yes") {
                        document.getElementById("SIoPSYes").checked = true;
                    } else {
                        document.getElementById("SIoPSNo").checked = true;
                    }
            
                    // Populate details (textarea)
                    document.getElementById("SIoPSDetails").value = responses[8].details || '';
                }
                if (responses[9]) {
                    const q10Value = responses[9].answer;
                    if (q10Value === "Yes") {
                        document.getElementById("IGYes").checked = true;
                    } else {
                        document.getElementById("IGNo").checked = true;
                    }
            
                    // Populate details (textarea)
                    document.getElementById("IGDetails").value = responses[9].details || '';
                }
                if (responses[10]) {
                    const q11Value = responses[10].answer;
                    if (q11Value === "Yes") {
                        document.getElementById("PwDYes").checked = true;
                    } else {
                        document.getElementById("PwDNo").checked = true;
                    }
            
                    // Populate details (textarea)
                    document.getElementById("PwDDetails").value = responses[10].details || '';
                }
                if (responses[11]) {
                    const q12Value = responses[11].answer;
                    if (q12Value === "Yes") {
                        document.getElementById("SPYes").checked = true;
                    } else {
                        document.getElementById("SPNo").checked = true;
                    }
            
                    // Populate details (textarea)
                    document.getElementById("SPDetails").value = responses[11].details || '';
                }

            }
            if (data.reference && data.reference.length > 0){
                references = data.reference;
                const tableBody = document.getElementById("referenceTableBody");
                const mobileList = document.getElementById("referenceList");
                
                tableBody.innerHTML = ""; // Clear existing rows
                mobileList.innerHTML = ""; // Clear mobile view

                references.forEach((record) => {
                    const row = document.createElement("tr");
                    row.setAttribute("data-id", record.id);
                    row.innerHTML = `
                        <td>${record.name}</td>
                        <td>${record.address}</td>
                        <td>${record.telephone_no}</td>
                        <td><button class="btn btn-danger float-end btn-sm deleteref"  data-id="${record.id}"><i class="bi bi-trash"></i></button></td>
                    `;
                    tableBody.appendChild(row);

                    // Mobile-friendly card view
                    const card = document.createElement("div");
                    card.className = "card mb-2 p-2 border";
                    card.innerHTML = `
                    <div class="border p-3 mb-2" data-id="${record.id}">
                        <p><strong>Name:</strong> ${record.name}</p>
                        <p><strong>Address:</strong> ${record.address}</p>
                        <p><strong>Phone:</strong> ${record.telephone_no}</p>
                        <button class="btn btn-danger btn-sm float-end  deleteref"  data-id="${record.id}"><i class="bi bi-trash"></i></button>
                    </div>`;

                    mobileList.appendChild(card);
                });
                document.addEventListener('click', function (e) {
                    if (e.target && e.target.classList.contains('deleteref')) {
                        const idToDelete = e.target.getAttribute('data-id');

                        references = references.filter(item => item.id != idToDelete);
                        
                                // Remove from table
                        const row = document.querySelector(`tr[data-id="${idToDelete}"]`);
                        if (row) row.remove();

                        // Remove from card view
                        const card = document.querySelector(`div[data-id="${idToDelete}"]`);
                        if (card) card.remove();
                        // Remove from the array
                        
                
                    }
                });
                

            }
            if (data.attachment && data.attachment.length > 0){
                const attachmentData = data.attachment[0];

                document.querySelector('[name="GIID"]').value = attachmentData.government_issued_id || '';
                document.querySelector('[name="ID_L_PNO"]').value = attachmentData.id_license_passport_no|| '';
                document.querySelector('[name="D_PoI"]').value = attachmentData.date_place_of_issuance || '';
                document.querySelector('[name="date_Accomplish"]').value = attachmentData.date_accomplished || '';
                document.querySelector('[name="dateSworn"]').value = attachmentData.subscribed_and_sworn_date || '';
                document.querySelector('[name="personAdminOath"]').value = attachmentData.person_administering_oath|| '';

                const imagePreview = document.getElementById("imagePreview");
                const placeholderText = document.getElementById("placeholderText");

                if (attachmentData.id_picture && imagePreview) {
                    // Clear the container
                    imagePreview.innerHTML = '';
                
                    // Create the image
                    const img = document.createElement("img");
                    img.src = `${window.location.origin}/pds/view_model/pds_main/${attachmentData.id_picture}`; // e.g. "/uploads/id_picture.jpg"
                    img.alt = "ID Picture";
                    img.className = "img-fluid rounded"; // Customize the class as needed
                    img.style.maxHeight = "250px"; // Optional styling
                    img.style.maxWidth = "200px";
                
                    // Append to preview container
                    imagePreview.appendChild(img);
                }
                if (!attachmentData.id_picture) {
                    placeholderText.style.display = "block";
                } else {
                    placeholderText.style.display = "none";
                }

                const sigPreview = document.getElementById("signaturePreview");
                const sigText = document.getElementById("signaturePlaceholder");

                if (attachmentData.person_signature && sigPreview) {
                    // Clear the container
                    sigPreview.innerHTML = '';
                
                    // Create the image
                    const img = document.createElement("img");
                    img.src = `${window.location.origin}/pds/view_model/pds_main/${attachmentData.person_signature}`; // e.g. "/uploads/id_picture.jpg"
                    img.alt = "ID Picture";
                    img.className = "img-fluid rounded"; // Customize the class as needed
                    img.style.maxHeight = "250px"; // Optional styling
                    img.style.maxWidth = "200px";
                
                    // Append to preview container
                    sigPreview.appendChild(img);
                }
                if (!attachmentData.person_signature) {
                    sigText.style.display = "block";
                } else {
                    sigText.style.display = "none";
                }
                const sigoathPreview = document.getElementById("signatureOathPreview");
                const sigOathText = document.getElementById("signatureOathPlaceholder");

                if (attachmentData.signature_of_person_administering_oath && sigoathPreview) {
                    // Clear the container
                    sigoathPreview.innerHTML = '';
                
                    // Create the image
                    const img = document.createElement("img");
                    img.src = `${window.location.origin}/pds/view_model/pds_main/${attachmentData.signature_of_person_administering_oath}`; // e.g. "/uploads/id_picture.jpg"
                    img.alt = "ID Picture";
                    img.className = "img-fluid rounded"; // Customize the class as needed
                    img.style.maxHeight = "250px"; // Optional styling
                    img.style.maxWidth = "200px";
                
                    // Append to preview container
                    sigoathPreview.appendChild(img);
                }
                if (!attachmentData.signature_of_person_administering_oath) {
                    sigOathText.style.display = "block";
                } else {
                    sigOathText.style.display = "none";
                }



            }

        } else {
            Swal.fire("Failed to load existing data for editing.");
        }
    } catch (error) {
        Swal.fire({
            title:"Error fetching existing data",
            text:error,
            icon: "error"
        });
    }
}
document.addEventListener('click', function (e) {
    // Civil Service Delete
    if (e.target && e.target.classList.contains('deleteEntry')) {
        const idToDelete = e.target.getAttribute('data-id');

        // Remove from civilServiceData array
        civilServiceData = civilServiceData.filter(item => item.id !== idToDelete);

        // Remove row
        const row = document.querySelector(`#civilServiceTable tr[data-id="${idToDelete}"]`);
        if (row) row.remove();

        // Remove card
        const card = document.querySelector(`#civilServiceList div[data-id="${idToDelete}"]`);
        if (card) card.remove();
    }

    // Work Experience Delete
    if (e.target && e.target.classList.contains('deleteWorkEntry')) {
        const idToDelete = e.target.getAttribute('data-id');

        // Remove from workExperienceData array
        workExperienceData = workExperienceData.filter(item => item.id !== idToDelete);

        // Remove row
        const row = document.querySelector(`#workExperienceTable tr[data-id="${idToDelete}"]`);
        if (row) row.remove();

        // Remove card
        const card = document.querySelector(`#workExperienceList div[data-id="${idToDelete}"]`);
        if (card) card.remove();
    }
    if (e.target && e.target.classList.contains('deleteVolEntry')) {
        const idToDelete = e.target.getAttribute('data-id');
        
                // Remove from table
        const row = document.querySelector(`tr[data-id="${idToDelete}"]`);
        if (row) row.remove();

        // Remove from card view
        const card = document.querySelector(`div[data-id="${idToDelete}"]`);
        if (card) card.remove();
        // Remove from the array
        voluntaryWorkData = voluntaryWorkData.filter(item => item.id !== idToDelete);

    }
    if (e.target && e.target.classList.contains('deleteLdEntry')) {
        const idToDelete = e.target.getAttribute('data-id');
        
                // Remove from table
        const row = document.querySelector(`tr[data-id="${idToDelete}"]`);
        if (row) row.remove();

        // Remove from card view
        const card = document.querySelector(`div[data-id="${idToDelete}"]`);
        if (card) card.remove();
        // Remove from the array
        learningDevelopmentData = learningDevelopmentData.filter(item => item.id !== idToDelete);

    }

});