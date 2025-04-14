let id = null;


function getPersonalInfoData() {
    let formData = {};


    // Get other inputs
    formData["cs_id_no"] = document.getElementById("CSID") ? document.getElementById("CSID").value.trim() : "";

    const section = document.getElementById("personalInformation");
    if (!section) return null;

    section.querySelectorAll("input:not([type=radio]), textarea, select").forEach(field => {
        formData[field.name] = field.value.trim();
    });

    const radioFields = ["Sex", "CivilStatus", "Citizenship1", "Citizenship2"];
    radioFields.forEach(name => {
        const selectedRadio = section.querySelector(`input[name="${name}"]:checked`);
        formData[name] = selectedRadio ? selectedRadio.value : ""; // Assign value if checked, else empty
    });
    console.log("Collected Personal Info Data:", formData);

    return formData;
}
function getFamilyBackgroundData() {
    let formData = {};
    const section = document.getElementById("familyBackground");
    if (!section) return null;
    formData["personal_info_id"] = id;
    section.querySelectorAll("input, textarea, select").forEach(field => {
        formData[field.name] = field.value.trim();
    });

    return formData;

}
function getChildrenFormData() {
    if (!id) {  
        alert("Missing Personal Info ID. Please complete previous sections.");
        return null;
    }

    if (typeof childrenList === "undefined" || childrenList.length === 0) {
        console.log("Skipping children submission: No children data.");
        return null;
    }

    return childrenList.map(child => ({
        personal_info_id: id,  
        name: child.name,
        birthdate: child.birthdate
    }));
}

function getEducationalBackground() {
    if (!id) {  
        alert("Missing Personal Info ID. Please complete previous sections.");
        return null;
    }

    let educationData = [];
    const educationEntries = document.querySelectorAll(".education-entry");

    educationEntries.forEach((entry, index) => {
        let educationItem = { personal_info_id: id }; // Add personalInfoId

        entry.querySelectorAll("input").forEach(input => {
            educationItem[input.name] = input.value.trim();
        });

        // Assign level based on index position
        const levels = ["Elementary", "Secondary", "Vocational", "College", "Graduate Studies"];
        educationItem["level"] = levels[index] || "Other"; // Default to "Other" if out of range

        educationData.push(educationItem);
    });
    console.log(educationData);
    return educationData;
}

function getCivilServiceEligibility() {
    if (!id) {  
        alert("Missing Personal Info ID. Please complete previous sections.");
        return null;
    }
    if (civilServiceData.length === 0) {
        console.log("Skipping Civil Service Eligibility submission: No data available.");
        return null;
    }
    const processedData = civilServiceData.map(entry => ({
        ...entry,
        personal_info_id: id
    }));

    return processedData;
}

function getWorkExperience() {
    if (!id) {  
        alert("Missing Personal Info ID. Please complete previous sections.");
        return null;
    }
    if (workExperienceData.length === 0) {
        console.log("Skipping Work Experience submission: No data available.");
        return null;
    }
    const processedData = workExperienceData.map(entry => ({
        ...entry,
        personal_info_id: id
    }));
    
    return processedData;
}
function getVoluntaryWork() {
    if (!id) {  
        alert("Missing Personal Info ID. Please complete previous sections.");
        return null;
    }
    if (voluntaryWorkData.length === 0) {
        console.log("Skipping Voluntary submission: No data available.");
        return null;
    }
    const processedData = voluntaryWorkData.map(entry => ({
        ...entry,
        personal_info_id: id
    }));
    
    return processedData;
}
function getLearning() {
    if (!id) {  
        alert("Missing Personal Info ID. Please complete previous sections.");
        return null;
    }
    if (learningDevelopmentData.length === 0) {
        console.log("Skipping Learning submission: No data available.");
        return null;
    }
    const processedData = learningDevelopmentData.map(entry => ({
        ...entry,
        personal_info_id: id
    }));
    
    return processedData;
}
function getHobbies() {
    if (!id) {  
        alert("Missing Personal Info ID. Please complete previous sections.");
        return null;
    }
    if (otherInformationData.specialSkills.length === 0) {
        console.log("Skipping Work Experience submission: No data available.");
        return null;
    }
    const processedData = otherInformationData.specialSkills.map(entry => ({
        ...entry,
        personal_info_id: id
    }));
    
    return processedData;
}
function getRecognition () {
    if (!id) {
        alert("Missing Personal Info ID. Please complete previous sections");
    }
    if (otherInformationData.nonAcademicDistinctions.length === 0) {
        console.log("Skipping Work Experience submission: No data available.");
        return null;
    }
    const processedData = otherInformationData.nonAcademicDistinctions.map(entry => ({
        ...entry, 
        personal_info_id: id
    }));
    return processedData;
}
function getMembership () {
    if (!id) {
        alert("Missing Personal Info ID. Please complete previous sections");
    }
    if (otherInformationData.memberships.length === 0) {
        console.log("Skipping Work Experience submission: No data available.");
        return null;
    }
    const processedData = otherInformationData.memberships.map(entry => ({
        ...entry, 
        personal_info_id: id
    }));
    return processedData;
}
function getQuestion() {
    let questions = [];
    let questionNumber = 1; 

    document.querySelectorAll("#questionsSection .form-group").forEach(group => {
        if (questionNumber > 12) return; 

        let radios = group.querySelectorAll("input[type='radio']");
        let textInput = group.querySelector("input.form-control[type='text']");
        let textArea = group.querySelector("textarea");
        let dateInput = group.querySelector("input[type='date']");
        let statusInput = group.querySelector("input.status-input[type='text']"); 

        let answer = "N/A"; 
        let details = "N/A";
        let dateValue = "N/A";
        let hasData = false; // Track if any field has valid data

        // Get the selected radio button value (Yes/No)
        radios.forEach(radio => {
            if (radio.checked) {
                answer = radio.value;
                hasData = true; // Mark data as valid
            }
        });

        // Get text input value if it exists and is not empty
        if (textInput && textInput.value.trim()) {
            details = textInput.value.trim();
        }

        // Get textarea value if it exists and is not empty
        if (textArea && textArea.value.trim()) {
            details = textArea.value.trim();
        }

        // Only allow date input for question 4
        if (questionNumber === 4 && dateInput && dateInput.value) {
            dateValue = dateInput.value;
            hasData = true; // This counts as valid input
        }

        // Only allow status input for question 4
        if (questionNumber === 4 && statusInput && statusInput.value.trim()) {
            status = statusInput.value.trim();
            hasData = true; // This counts as valid input
        }

        //  **Prevent adding questions if only the text input or textarea is filled but no radio is selected**
        if (answer !== "N/A" || (questionNumber === 4 && (dateValue !== "N/A"))) {
            questions.push({
                personal_info_id: id, 
                question_code: questionNumber, 
                answer: answer, 
                details: details, 
                date_filed: dateValue, 
            });

            questionNumber++; // Increment for the next question
        }
    });

    console.log(questions);
    return questions;
}



function getReference() {
    if (!id) {
        alert("Missing Personal Info ID. Please complete previous sections");
    }
    if (references.length === 0) {
        console.log("Skipping Reference submission: No data available.");
        return null;
    }
    const processedData = references.map(entry => ({
        ...entry, 
        personal_info_id: id
    }));
    return processedData;
}



async function submitData(sectionId, apiEndpoint, dataFunction) {
    const formData = dataFunction();
    console.log(formData);
    if (!formData) {
        alert(`Please fill in all required fields in the ${sectionId} section.`);
        return;
    }

    try {
        const response = await fetch(apiEndpoint, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(formData),
        });

        const text = await response.text();
        
        console.log(`Raw response from ${apiEndpoint}:`, text);

        let data;
        try {
            data = JSON.parse(text);
        } catch (jsonError) {
            console.error(`Invalid JSON from ${apiEndpoint}:`, text);
            return;
        }

        if (!data.success) {
            alert(`Error in ${sectionId}: ` + data.error);
        } else {
            alert(`${sectionId} submitted successfully!`);
        }
    } catch (error) {
        console.error(`Request failed for ${apiEndpoint}:`, error);
    }
}
async function submitAttachments(sectionId, apiEndpoint, dataFunction) {
    const formData = dataFunction(); // This should return a FormData object

    if (!formData) {
        alert(`No data found for ${sectionId}. Please try again.`);
        return;
    }



    try {
        const response = await fetch(apiEndpoint, {
            method: "POST",
            body: formData, // Automatically sets Content-Type to multipart/form-data
        });

        const text = await response.text();
        console.log(` Raw response from ${apiEndpoint}:`, text);

        if (!text.trim()) {
            alert(` Empty response from ${apiEndpoint}. Something went wrong.`);
            return;
        }

        let data;
        try {
            data = JSON.parse(text);
        } catch (jsonError) {
            console.error(` Invalid JSON response from ${apiEndpoint}:`, text);
            alert(` Unexpected server response. Check the console for details.`);
            return;
        }

        if (!data.success) {
            alert(` Error in ${sectionId}: ${data.error}`);
        } else {
            alert(` ${sectionId} submitted successfully!`);
            personalInfoId = data.id; // Store returned ID for future use
            console.log(` Updated personalInfoId:`, personalInfoId);
        }
    } catch (error) {
        console.error(` Request failed for ${apiEndpoint}:`, error);
        alert(` Network error. Please try again later.`);
    }
}



async function submitPersonalInfo(dataFunction) {
    const formData = dataFunction();
    console.log(formData);
    try {
        let response = await fetch("/pds/view_model/pds_main/personalInfo.php", { 
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(formData),
        });

        console.log("Raw Response:", response);

        if (!response.ok) {
            throw new Error(`Failed to submit personal info: ${response.statusText}`);
        }

        let data = await response.json();
        console.log("Response Data:", data);
        id = data.id;
        console.log("Response Data:", id);

        if (!data || !data.id) {
            throw new Error("personalInfoId is missing in response.");
        }

        return id;

    } catch (error) {
        console.error("Error in submitPersonalInfo:", error);
        return null; // Ensure it doesn't break execution
    }
}


function submitFamilyBackground() {
    submitData("Family Background", "/pds/view_model/pds_main/familybackground.php", getFamilyBackgroundData);
}

function submitChildrenList() {
    const childrenData = getChildrenFormData();

    if (!childrenData || childrenData.length === 0) {
        console.log("Skipping children submission: No children data.");
        return;
    }
    
    submitData("Children Section", "/pds/view_model/pds_main/children.php", () => ({ children: childrenData }));
}

function submitEducationalBackground() {
    const educationData = getEducationalBackground();
    if (!educationData || educationData.length === 0) {
        console.log("Skipping education submission: No education data.");
        return;
    }

    submitData("Educational Backgrounnd", "/pds/view_model/pds_main/education.php", () => ({ education: educationData }));
}
function submitCivilServiceEligibility() {
    const civilServiceDataProcessed = getCivilServiceEligibility();
    
    if (!civilServiceDataProcessed) return; // Skip submission if no data

    submitData("Civil Service Eligibility", "/pds/view_model/pds_main/civil_service.php", () => ({ civil_service: civilServiceDataProcessed }));
}
function submitWorkExperience() {
    const workExperienceDataProcessed = getWorkExperience();
    
    if (!workExperienceDataProcessed) return; // Skip submission if no data

    submitData("Work Experience", "/pds/view_model/pds_main/work_experience.php", () => ({ work_experience: workExperienceDataProcessed }));
}
function submitVoluntaryWorkData() {
    const voluntaryWorkDataProcessed = getVoluntaryWork();
    
    if (!voluntaryWorkDataProcessed) return; // Skip submission if no data

    submitData("Voluntary Work", "/pds/view_model/pds_main/voluntary_work.php", () => ({ voluntary_work: voluntaryWorkDataProcessed }));
}
function submitLearningData() {
    const learningDataProcessed = getLearning();
    if (!learningDataProcessed) return; // Skip submission if no data
    submitData("Learning", "/pds/view_model/pds_main/learning.php", () => ({ learning: learningDataProcessed}));

}
function submitHobbiesData(){
    const hobbiesDataProcessed = getHobbies();
    if (!hobbiesDataProcessed) return; // Skip submission if no data
    submitData("Hobby", "/pds/view_model/pds_main/hobbies.php", () => ({ hobbies: hobbiesDataProcessed}));

}

function submitRecognitionData() {
    const recognitionDataProcessed = getRecognition();
    if (!recognitionDataProcessed) return; // Skip submission if no data
    submitData("Recognition", "/pds/view_model/pds_main/recognition.php", () => ({ recognition: recognitionDataProcessed}));
}

function submitMembershipData() {
    const membershipDataProcessed = getMembership();
    if (!membershipDataProcessed) return; // Skip submission if no data
    submitData("Membership", "/pds/view_model/pds_main/membership.php", () => ({ membership: membershipDataProcessed}));
}
function submitReferenceData() {
    const referenceDataProcessed = getReference();
    if (!referenceDataProcessed) return; // Skip submission if no data
    submitData("References", "/pds/view_model/pds_main/references.php", () => ({ reference: referenceDataProcessed}));
}
function submitQuestionData() {
    const questionDataProcessed = getQuestion();
    if (!questionDataProcessed) return;
    submitData("Questions", "/pds/view_model/pds_main/questions.php", () => ({ question: questionDataProcessed}));
}
function submitAttachmentsData() {
    const collectUserInputsProcessed = collectUserInputs;
    if (!collectUserInputsProcessed) return;
    submitAttachments("Attachments", "/pds/view_model/pds_main/attachments.php", collectUserInputsProcessed);
}


async function processAndSubmitData() {
    try {
        await submitPersonalInfo(getPersonalInfoData);
        console.log("Personal Info ID:", id); 

        if (!id) {
            console.error("Personal info submission failed. Stopping execution.");
            return;
        }


        await submitFamilyBackground();
        await submitChildrenList();
        await submitEducationalBackground();
        await submitCivilServiceEligibility();
        await submitWorkExperience();
        await submitVoluntaryWorkData();
        await submitLearningData();
        await submitHobbiesData();
        await submitRecognitionData();
        await submitMembershipData();
        await submitQuestionData();
        await submitReferenceData();
        await submitAttachmentsData();

        console.log("All data submitted successfully.");

        window.location.href = `/pds/view/pds_preview/index.php?id=${id}`;

        
    } catch (error) {
        //delete data when error 
        //add preview pdf that fetch data

        await fetch(`delete_data.php?id=${id}`, { method: "DELETE" });
        alert("An error occurred. Your data has been removed. Please try again.");
        console.error("Error during data submission:", error);
    }
}


