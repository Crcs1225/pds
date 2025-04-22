


function getPersonalInfoData() {
    let formData = {};

    // Only add ID if editing
    const urlParams = getModeFromURL();
    if (urlParams.mode === "edit") {
        formData["id"] = parseInt(urlParams.document_id); // this is the personal_information.id
    }

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

function getFamilyBackgroundData(personalInfoId) {
    let formData = {};
    const section = document.getElementById("familyBackground");
    if (!section) return null;
    formData["personal_info_id"] = personalInfoId;
    section.querySelectorAll("input, textarea, select").forEach(field => {
        formData[field.name] = field.value.trim();
    });

    return formData;

}
function getChildrenFormData(personalInfoId) {
    if (!personalInfoId) {  
        alert("Missing Personal Info ID. Please complete previous sections.");
        return null;
    }

    if (typeof childrenList === "undefined" || childrenList.length === 0) {
        console.log("Skipping children submission: No children data.");
        return null;
    }

    return childrenList.map(child => ({
        personal_info_id: personalInfoId,  
        name: child.name,
        birthdate: child.birthdate
        
    }));
}

function getEducationalBackground(personalInfoId) {
    if (!personalInfoId) {  
        alert("Missing Personal Info ID. Please complete previous sections.");
        return null;
    }

    let educationData = [];
    const educationEntries = document.querySelectorAll(".education-entry");

    educationEntries.forEach((entry, index) => {
        let educationItem = { personal_info_id: personalInfoId }; // Add personalInfoId

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

function getCivilServiceEligibility(personalInfoId) {
    if (!personalInfoId) {  
        alert("Missing Personal Info ID. Please complete previous sections.");
        return null;
    }
    if (civilServiceData.length === 0) {
        console.log("Skipping Civil Service Eligibility submission: No data available.");
        return null;
    }
    const processedData = civilServiceData.map(entry => ({
        ...entry,
        personal_info_id: personalInfoId
    }));

    return processedData;
}

function getWorkExperience(personalInfoId) {
    if (!personalInfoId) {  
        alert("Missing Personal Info ID. Please complete previous sections.");
        return null;
    }
    if (workExperienceData.length === 0) {
        console.log("Skipping Work Experience submission: No data available.");
        return null;
    }
    const processedData = workExperienceData.map(entry => ({
        ...entry,
        personal_info_id: personalInfoId
    }));
    
    return processedData;
}
function getVoluntaryWork(personalInfoId) {
    if (!personalInfoId) {  
        alert("Missing Personal Info ID. Please complete previous sections.");
        return null;
    }
    if (voluntaryWorkData.length === 0) {
        console.log("Skipping Voluntary submission: No data available.");
        return null;
    }
    const processedData = voluntaryWorkData.map(entry => ({
        ...entry,
        personal_info_id: personalInfoId
    }));
    
    return processedData;
}
function getLearning(personalInfoId) {
    if (!personalInfoId) {  
        alert("Missing Personal Info ID. Please complete previous sections.");
        return null;
    }
    if (learningDevelopmentData.length === 0) {
        console.log("Skipping Learning submission: No data available.");
        return null;
    }
    const processedData = learningDevelopmentData.map(entry => ({
        ...entry,
        personal_info_id: personalInfoId
    }));
    
    return processedData;
}
function getHobbies(personalInfoId) {
    if (!personalInfoId) {  
        alert("Missing Personal Info ID. Please complete previous sections.");
        return null;
    }
    if (otherInformationData.specialSkills.length === 0) {
        console.log("Skipping Work Experience submission: No data available.");
        return null;
    }
    const processedData = otherInformationData.specialSkills.map(entry => ({
        ...entry,
        personal_info_id: personalInfoId
    }));
    
    return processedData;
}
function getRecognition (personalInfoId) {
    if (!personalInfoId) {
        alert("Missing Personal Info ID. Please complete previous sections");
    }
    if (otherInformationData.nonAcademicDistinctions.length === 0) {
        console.log("Skipping Work Experience submission: No data available.");
        return null;
    }
    const processedData = otherInformationData.nonAcademicDistinctions.map(entry => ({
        ...entry, 
        personal_info_id: personalInfoId
    }));
    return processedData;
}
function getMembership (personalInfoId) {
    if (!personalInfoId) {
        alert("Missing Personal Info ID. Please complete previous sections");
    }
    if (otherInformationData.memberships.length === 0) {
        console.log("Skipping Work Experience submission: No data available.");
        return null;
    }
    const processedData = otherInformationData.memberships.map(entry => ({
        ...entry, 
        personal_info_id: personalInfoId
    }));
    return processedData;
}
function getQuestion(personalInfoId) {
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
                personal_info_id: personalInfoId, 
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



function getReference(personalInfoId) {
    if (!personalInfoId) {
        alert("Missing Personal Info ID. Please complete previous sections");
    }
    if (references.length === 0) {
        console.log("Skipping Reference submission: No data available.");
        return null;
    }
    const processedData = references.map(entry => ({
        ...entry, 
        personal_info_id: personalInfoId
    }));
    return processedData;
}



async function submitData(sectionId, apiEndpoint, dataFunction, personalInfoId) {
    
    const formData = dataFunction(personalInfoId);
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
            swal.fire(`Error in ${sectionId}: ` + data.error);
        } 
    } catch (error) {
        console.error(`Request failed for ${apiEndpoint}:`, error);
    }
}
async function submitAttachments(sectionId, apiEndpoint, dataFunction, personalInfoId) {
    const formData = dataFunction(personalInfoId); // This should return a FormData object

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
            
            personalInfoId = data.id; // Store returned ID for future use
            console.log(` Updated personalInfoId:`, personalInfoId);
        }
    } catch (error) {
        console.error(` Request failed for ${apiEndpoint}:`, error);
       
    }
}


async function submitPersonalInfo(dataFunction, existingInfo = null) {
    const formData = dataFunction();
    const urlParams = getModeFromURL();

    if (urlParams.mode === "create") {
        formData.pds_name = urlParams.pds_name;
        formData.user_id = urlParams.user_id;
    } else {
        // Use fallback from global existingInfo
        formData.pds_name = existingInfo.pds_name;
        formData.user_id = existingInfo.user_id;
    }
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

        let text = await response.text();  // get raw response
        console.log("Raw Server Response:", text);

        let data;
        try {
            data = JSON.parse(text);
        } catch (jsonError) {
            console.error("Failed to parse JSON:", jsonError);
            console.error("Response was:", text);
            throw new Error("Invalid JSON returned from server");
        }
        console.log("Response Data:", data);
        let id = data.id;
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


function submitFamilyBackground(personalInfoId) {
    submitData("Family Background", "/pds/view_model/pds_main/familybackground.php", getFamilyBackgroundData, personalInfoId);
}

function submitChildrenList(personalInfoId) {
    const childrenData = getChildrenFormData(personalInfoId);

    if (!childrenData || childrenData.length === 0) {
        console.log("Skipping children submission: No children data.");
        return;
    }
    
    submitData("Children Section", "/pds/view_model/pds_main/children.php", () => ({ children: childrenData }), personalInfoId);
}

function submitEducationalBackground(personalInfoId) {
    const educationData = getEducationalBackground(personalInfoId);
    if (!educationData || educationData.length === 0) {
        swal.alert("Skipping education submission: No education data.");
        return;
    }

    submitData("Educational Backgrounnd", "/pds/view_model/pds_main/education.php", () => ({ education: educationData }), personalInfoId);
}
function submitCivilServiceEligibility(personalInfoId) {
    const civilServiceDataProcessed = getCivilServiceEligibility(personalInfoId);
    
    if (!civilServiceDataProcessed) return; // Skip submission if no data

    submitData("Civil Service Eligibility", "/pds/view_model/pds_main/civil_service.php", () => ({ civil_service: civilServiceDataProcessed }), personalInfoId);
}
function submitWorkExperience(personalInfoId) {
    const workExperienceDataProcessed = getWorkExperience(personalInfoId);
    
    if (!workExperienceDataProcessed) return; // Skip submission if no data

    submitData("Work Experience", "/pds/view_model/pds_main/work_experience.php", () => ({ work_experience: workExperienceDataProcessed }), personalInfoId);
}
function submitVoluntaryWorkData(personalInfoId) {
    const voluntaryWorkDataProcessed = getVoluntaryWork(personalInfoId);
    
    if (!voluntaryWorkDataProcessed) return; // Skip submission if no data

    submitData("Voluntary Work", "/pds/view_model/pds_main/voluntary_work.php", () => ({ voluntary_work: voluntaryWorkDataProcessed }), personalInfoId);
}
function submitLearningData(personalInfoId) {
    const learningDataProcessed = getLearning(personalInfoId);
    if (!learningDataProcessed) return; // Skip submission if no data
    submitData("Learning", "/pds/view_model/pds_main/learning.php", () => ({ learning: learningDataProcessed}), personalInfoId);

}
function submitHobbiesData(personalInfoId){
    const hobbiesDataProcessed = getHobbies(personalInfoId);
    if (!hobbiesDataProcessed) return; // Skip submission if no data
    submitData("Hobby", "/pds/view_model/pds_main/hobbies.php", () => ({ hobbies: hobbiesDataProcessed}), personalInfoId);

}

function submitRecognitionData(personalInfoId) {
    const recognitionDataProcessed = getRecognition(personalInfoId);
    if (!recognitionDataProcessed) return; // Skip submission if no data
    submitData("Recognition", "/pds/view_model/pds_main/recognition.php", () => ({ recognition: recognitionDataProcessed}), personalInfoId);
}

function submitMembershipData(personalInfoId) {
    const membershipDataProcessed = getMembership(personalInfoId);
    if (!membershipDataProcessed) return; // Skip submission if no data
    submitData("Membership", "/pds/view_model/pds_main/membership.php", () => ({ membership: membershipDataProcessed}), personalInfoId);
}
function submitReferenceData(personalInfoId) {
    const referenceDataProcessed = getReference(personalInfoId);
    if (!referenceDataProcessed) return; // Skip submission if no data
    submitData("References", "/pds/view_model/pds_main/references.php", () => ({ reference: referenceDataProcessed}), personalInfoId);
}
function submitQuestionData(personalInfoId) {
    const questionDataProcessed = getQuestion(personalInfoId);
    if (!questionDataProcessed) return;
    submitData("Questions", "/pds/view_model/pds_main/questions.php", () => ({ question: questionDataProcessed}), personalInfoId);
}
function submitAttachmentsData(personalInfoId) {
    const collectUserInputsProcessed = collectUserInputs;
    if (!collectUserInputsProcessed) return;
    submitAttachments("Attachments", "/pds/view_model/pds_main/attachments.php", collectUserInputsProcessed, personalInfoId);
}


async function processAndSubmitData(existingInfo = null) {
    try {
        let personalInfoId;

        if (existingInfo) {
            const formData = {
                action: "delete",
                id: parseInt(existingInfo.document_id)
            };

            let response = await fetch("/pds/view_model/pds_landing/delete.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
                body: JSON.stringify(formData),
            });

            let data = await response.json();

            if (data.success) {
                personalInfoId = await submitPersonalInfo(getPersonalInfoData, existingInfo);
            }
        } else {
            // In create mode, assume getPersonalInfoData will generate the ID
            personalInfoId = await submitPersonalInfo(getPersonalInfoData);
        }

        console.log("Personal Info ID:", personalInfoId);

        if (!personalInfoId) {
            console.error("Personal info submission failed. Stopping execution.");
            return;
        }

        // Proceed with inserting new data
        await submitFamilyBackground(personalInfoId);
        await submitChildrenList(personalInfoId);
        await submitEducationalBackground(personalInfoId);
        await submitCivilServiceEligibility(personalInfoId);
        await submitWorkExperience(personalInfoId);
        await submitVoluntaryWorkData(personalInfoId);
        await submitLearningData(personalInfoId);
        await submitHobbiesData(personalInfoId);
        await submitRecognitionData(personalInfoId);
        await submitMembershipData(personalInfoId);
        await submitQuestionData(personalInfoId);
        await submitReferenceData(personalInfoId);
        await submitAttachmentsData(personalInfoId);

        swal.fire("All data submitted successfully.");
        if (existingInfo) {
            window.location.href = `/pds/view/pds_landing/`; // Edit mode: go to landing
        } else {
            window.location.href = `/pds/view/pds_preview/index.php?id=${personalInfoId}`; // Create mode: go to preview
        }

    } catch (error) {
        // Ensure personalInfoId is defined before deletion
        if (typeof personalInfoId !== "undefined") {
            await fetch(`delete_data.php?id=${personalInfoId}`, { method: "DELETE" });
        }

        swal.fire("An error occurred. Your data has been removed. Please try again.");
        console.error("Error during data submission:", error);
    }
}
