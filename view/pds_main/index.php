<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/pds/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <title>PDS</title>
</head>
<body class="container mt-5">
    <form id="pdsForm" class="p-4 border rounded shadow form-horizontal">
        <div class="c1-container-header border-bottom"></div>
            <h1 class="text-center">PERSONAL DATA SHEET</h1>
            <br>
            <p>
                <b>WARNING: Any misrepresentation made in the Personal Data Sheet and the Work Experience Sheet shall cause the filing of administrative/criminal case/s against the person concerned.
                <br>
                    READ THE ATTACHED GUIDE TO FILLING OUT THE PERSONAL DATA SHEET (PDS) BEFORE ACCOMPLISHING THE PDS FORM.
                </b>
            </p>
            <div class="form-group row justify-content-end">
                <label for="CSID" class="col-sm-2 col-form-label">1. CS ID No.</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="CSID" placeholder="CSID" name="cs_id_no">
                </div>
            </div>
        </div>
        <br>
        <fieldset id="personalInformation">
            <legend class="bg-dark-subtle">
                <h5><b> I. PERSONAL INFORMATION</b></h3>
            </legend>
            <hr>
            <br>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">2. SURNAME</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="Surname" name="Surname" placeholder="Surname" required>
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">FIRST NAME</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="Firstname" name="Firstname" placeholder="Firstname" required>
                </div>
                <label for="NameExtension" class="col-sm-2 col-form-label">NAME EXTENSION (JR., SR)</label>
                <div class="col-sm-4">
                  <input type="text" name="NameExtension" class="form-control" id="NameExtension" placeholder="NameExtension">
                </div>
            </div>
            <br>
            <div class="form-group row">
                <label for="MiddleName" class="col-sm-2 col-form-label">MIDDLE NAME</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control" id="MiddleName" name="MiddleName" placeholder="MiddleName" required>
                </div>
            </div>
            <hr>
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="DateOfBirth" class="col-sm-4 col-form-label">3. DATE OF BIRTH (mm/dd/yyyy)</label>
                            <div class="col-sm-8">
                                <input type="date" name="DateOfBirth" class="form-control" id="DateOfBirth" placeholder="DateOfBirth" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="PlaceOfBirth" class="col-sm-4 col-form-label">4. PLACE OF BIRTH</label>
                            <div class="col-sm-8">
                                <input type="text" name="PlaceOfBirth" class="form-control" id="PlaceOfBirth" placeholder="PlaceOfBirth" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">5. SEX</label>
                            <div class="col-sm-8">
                                <input class="form-check-input" type="radio" name="Sex" id="Male" value="Male" checked>
                                <label class="form-check-label" for="Male">Male</label>
            
                                &nbsp;&nbsp;
                                <input class="form-check-input" type="radio" name="Sex" id="Female" value="Female">
                                <label class="form-check-label" for="Female">Female</label>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">6. CIVIL STATUS</label>
                            <div class="col-sm-8">
                                <input class="form-check-input" type="radio" name="CivilStatus" id="Single" value="Single" checked>
                                <label class="form-check-label" for="Single">Single</label>
            
                                &nbsp;&nbsp;
                                <input class="form-check-input" type="radio" name="CivilStatus" id="Married" value="Married">
                                <label class="form-check-label" for="Married">Married</label>
            
                                &nbsp;&nbsp;
                                <input class="form-check-input" type="radio" name="CivilStatus" id="Widowed" value="Widowed">
                                <label class="form-check-label" for="Widowed">Widowed</label>
            
                                <br>
                                <input class="form-check-input" type="radio" name="CivilStatus" id="Separated" value="Separated">
                                <label class="form-check-label" for="Separated">Separated</label>
            
                                &nbsp;&nbsp;
                                <input class="form-check-input" type="radio" name="CivilStatus" id="Other/s" value="Other/s">
                                <label class="form-check-label" for="Other/s">Other/s</label>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="Height" class="col-sm-4 col-form-label">7. HEIGHT (m)</label>
                            <div class="col-sm-8">
                                <input type="text" name="Height" class="form-control" id="Height" placeholder="Height" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="Weight" class="col-sm-4 col-form-label">8. WEIGHT (kg)</label>
                            <div class="col-sm-8">
                                <input type="text" name="Weight" class="form-control" id="Weight" placeholder="Weight" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="BloodType" class="col-sm-4 col-form-label">9. BLOOD TYPE</label>
                            <div class="col-sm-8">
                                <input type="text" name="BloodType" class="form-control" id="BloodType" placeholder="BloodType">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="GSIS" class="col-sm-4 col-form-label">10. GSIS ID NO.</label>
                            <div class="col-sm-8">
                                <input type="text" name="GSIS" class="form-control" id="GSIS" placeholder="GSIS">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="PagIBIG" class="col-sm-4 col-form-label">11. PAG-IBIG ID NO.</label>
                            <div class="col-sm-8">
                                <input type="text" name="PagIBIG" class="form-control" id="PagIBIG" placeholder="PagIBIG">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="PHILHEALTH" class="col-sm-4 col-form-label">12. PHILHEALTH NO.</label>
                            <div class="col-sm-8">
                                <input type="text" name="PHILHEALTH" class="form-control" id="PHILHEALTH" placeholder="PHILHEALTH">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="SSS" class="col-sm-4 col-form-label">13. SSS NO.</label>
                            <div class="col-sm-8">
                                <input type="text" name="SSS" class="form-control" id="SSS" placeholder="SSS">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="TIN" class="col-sm-4 col-form-label">14. TIN NO.</label>
                            <div class="col-sm-8">
                                <input type="text" name="TIN" class="form-control" id="TIN" placeholder="TIN">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="AgencyNo" class="col-sm-4 col-form-label">15. AGENCY EMPLOYEE NO.</label>
                            <div class="col-sm-8">
                                <input type="text" name="AgencyNo" class="form-control" id="AgencyNo" placeholder="AgencyNo">
                            </div>
                        </div>
                    </div>
            
                
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">16. CITIZENSHIP</label>
                            <div class="col-sm-8">
                                <input class="form-check-input" type="radio" name="Citizenship1" id="Filipino" value="Filipino" checked>
                                <label class="form-check-label" for="Filipino">Filipino</label>
            
                                &nbsp;&nbsp;
                                <input class="form-check-input" type="radio" name="Citizenship1" id="Dual" value="Dual">
                                <label class="form-check-label" for="Dual">Dual Citizenship</label>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-8">
                                <input class="form-check-input" type="radio" name="Citizenship2" id="Birth" value="by birth" checked>
                                <label class="form-check-label" for="Birth">by birth</label>
            
                                &nbsp;&nbsp;
                                <input class="form-check-input" type="radio" name="Citizenship2" id="Naturalization" value="by naturalization">
                                <label class="form-check-label" for="Naturalization">by naturalization</label>
            
                                <br><br>
                                <p>Pls. indicate country:</p>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="dualCountry" class="col-sm-4 col-form-label">If holder of dual citizenship, please indicate the details.</label>
                            <div class="col-sm-8">
                                <input type="text" name="dualCountry" class="form-control" id="dualCountry" placeholder="Enter country">
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="ResHouse_Block_LotNo" class="col-sm-4 col-form-label">17. RESIDENTIAL ADDRESS</label>
                            <div class="col-sm-4">
                              <input type="text" name="ResHouse_Block_LotNo" class="form-control" id="ResHouse_Block_LotNo" placeholder="House/ Block/ Lot No">
                            </div>
                            <br>
                            <br>
                            <div class="col-sm-4">
                              <input type="text" name="ResStreet" class="form-control" id="ResStreet" placeholder="Street">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-4">
                              <input type="text" name="ResSubdivision_Village" class="form-control" id="ResSubdivision_Village" placeholder="Subdivision / Village">
                            </div>
                            <br>
                            <br>
                            <div class="col-sm-4">
                              <input type="text" name="ResBarangay" class="form-control" id="ResBarangay" placeholder="Barangay" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-4">
                              <input type="text" name="ResCity_Municipality" class="form-control" id="ResCity_Municipality" placeholder="City/Municipality" required>
                            </div>
                            <br>
                            <br>
                            <div class="col-sm-4">
                              <input type="text" name="ResProvince" class="form-control" id="ResProvince" placeholder="Province" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">ZIP CODE </label>
                            <div class="col-sm-8">
                              <input type="text" name="ResZipCode" class="form-control" id="ResZipCode" placeholder="ZipCode" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">18. PERMANENT ADDRESS</label>
                            <div class="col-sm-4">
                              <input type="text" name="PerHouse_Block_LotNo" class="form-control" id="House/Block/LotNo" placeholder="PerHouse_Block_LotNo">
                            </div>
                            <br>
                            <br>
                            <div class="col-sm-4">
                              <input type="text" name="PerStreet" class="form-control" id="PerStreet" placeholder="Street">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-4">
                              <input type="text" name="PerSubdivision_Village" class="form-control" id="PerSubdivision_Village" placeholder="Subdivision/Village">
                            </div>
                            <br>
                            <br>
                            <div class="col-sm-4">
                              <input type="text" name="PerBarangay" class="form-control" id="PerBarangay" placeholder="Barangay" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label"></label>
                            <div class="col-sm-4">
                              <input type="text" name="PerCity_Municipality" class="form-control" id="PerCity_Municipality" placeholder="City/Municipality" required>
                            </div>
                            <br>
                            <br>
                            <div class="col-sm-4">
                              <input type="text" name="PerProvince" class="form-control" id="PerProvince" placeholder="Province" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">ZIP CODE </label>
                            <div class="col-sm-8">
                              <input type="text" name="PerZipCode" class="form-control" id="PerZipCode" placeholder="ZipCode" required>
                            </div>
                        </div>
                        <hr>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">19. TELEPHONE NO.</label>
                            <div class="col-sm-8">
                              <input type="text" name="TelephoneNumber" class="form-control" id="TelephoneNumber" placeholder="TelephoneNumber">
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">20. MOBILE NO.</label>
                            <div class="col-sm-8">
                              <input type="text" name="MobileNumber" class="form-control" id="MobileNumber" placeholder="MobileNumber" required>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="" class="col-sm-4 col-form-label">21. E-MAIL ADDRESS (if any)</label>
                            <div class="col-sm-8">
                              <input type="email" name="EmailAdd" class="form-control" id="EmailAdd" placeholder="EmailAdd">
                            </div>
                        </div>
                        <br>
                    </div>
                    <br>
                </div>
            </div>
        </fieldset>
        <fieldset id="familyBackground">
            <legend class="bg-dark-subtle">
                <h5><b>II. FAMILY BACKGROUND</b></h5>
            </legend>
            <hr>
            <br>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">22. SPOUSE'S SURNAME</label>
                        <div class="col-sm-8">
                        <input type="text" name="Spouse_Surname" class="form-control" id="Spouse_Surname" placeholder="Spouse_Surname">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row ">
                        <label for="" class="col-sm-4 col-form-label"> FIRST NAME</label>
                        <div class="col-sm-4">
                            <input type="text" name="Spouse_Firstname" class="form-control" id="Spouse_Firstname" placeholder="Spouse_Firstname">
                        </div>
                        <label for="" class="col-sm-2 col-form-label"> NAME EXTENSION (JR., SR)</label>
                        <div class="col-sm-2">
                            <input type="text" name="Spouse_NameExtension" class="form-control" id="Spouse_NameExtension" placeholder="Spouse_NameExtension">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label"> MIDDLE NAME</label>
                        <div class="col-sm-8">
                        <input type="text" name="Spouse_Middlename" class="form-control" id="Spouse_Middlename" placeholder="Spouse_Middlename">
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label"> OCCUPATION</label>
                        <div class="col-sm-8">
                        <input type="text" name="Spouse_Occupation" class="form-control" id="Spouse_Occupation" placeholder="Spouse_Occupation">
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label"> EMPLOYER/BUSINESS NAME</label>
                        <div class="col-sm-8">
                        <input type="text" name="Spouse_Employer_Businessname" class="form-control" id="Spouse_Employer_Businessname" placeholder="Spouse_Employer_Businessname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label"> BUSINESS ADDRESS</label>
                        <div class="col-sm-8">
                        <input type="text" name="Spouse_BusinessAddress" class="form-control" id="Spouse_BusinessAddress" placeholder="Spouse_BusinessAddress">
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label"> TELEPHONE NO.</label>
                        <div class="col-sm-8">
                        <input type="text" name="Spouse_TelephoneNumber" class="form-control" id="Spouse_TelephoneNumber" placeholder="Spouse_TelephoneNumber">
                        </div>
                    </div>
                    <br>
                    <hr>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">24. FATHER'S SURNAME</label>
                        <div class="col-sm-8">
                          <input type="text" name="Father_Surname" class="form-control" id="Father_Surname" placeholder="Father_Surname">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label"> FIRST NAME</label>
                        <div class="col-sm-4">
                          <input type="text" name="Father_Firstname" class="form-control" id="Father_Firstname" placeholder="Father_Firstname">
                        </div>
  
                        <label for="" class="col-sm-2 col-form-label"> NAME EXTENSION (JR., SR)</label>
                        <div class="col-sm-2">
                          <input type="text" name="Father_NameExtension" class="form-control" id="Father_NameExtension" placeholder="Father_NameExtension">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">MIDDLE NAME</label>
                        <div class="col-sm-8">
                          <input type="text" name="Father_Middlename" class="form-control" id="Father_Middlename" placeholder="Father_Middlename">
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">25. MOTHER'S MAIDEN NAME</label>
                        <div class="col-sm-8">
                          <input type="text" name="Mother_MaidenName" class="form-control" id="Mother_MaidenName" placeholder="Mother_MaidenName">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">SURNAME</label>
                        <div class="col-sm-8">
                          <input type="text" name="Mother_Surname" class="form-control" id="Mother_Surname" placeholder="Mother_Surname">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">FIRST NAME</label>
                        <div class="col-sm-8">
                          <input type="text" name="Mother_Firstname" class="form-control" id="Mother_Firstname" placeholder="Mother_Firstname">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="" class="col-sm-4 col-form-label">MIDDLE NAME</label>
                        <div class="col-sm-8">
                          <input type="text" name="Mother_Middlename" class="form-control" id="Mother_Middlename" placeholder="Mother_Middlename">
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group row">
                        <label for="" class="col-sm-6 col-form-label">23.  NAME of CHILDREN  (Write full name and list all)</label>
                        <label for="" class="col-sm-6 col-form-label">DATE OF BIRTH (mm/dd/yyyy) </label>
                    </div>
                    <br>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="Children_Fullname" placeholder="Children_Fullname">
                        </div>
                        <br>
                        <br>
                        <div class="col-sm-4">
                            <input type="date" class="form-control" id="Children_Birthdate" placeholder="Children_Birthdate">
                        </div>
                        <br>
                        <br>
                    
                        <div class="col-sm-2">
                            <input type="button" class="btn btn-dark" id="Spouse-Add-Children" value="ADD">
                        </div>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                          <thead>
                            <tr>
                              <th scope="col">NAME of CHILDREN</th>
                              <th scope="col">DATE OF BIRTH</th>
                              <th scope="col">Control</th>
                            </tr>
                          </thead>
                          <tbody id="spouse-children">
                          </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <br>
        </fieldset>
        <fieldset>
            <legend class="bg-dark-subtle">
                <h5><b>III. EDUCATIONAL BACKGROUND</b></h5>
            </legend>
            <hr>
            <div class="container">
                <div class="row text-uppercase  border-bottom pb-2">
                    <div class="col-md-2 text-wrap text-start">26. LEVEL</div>
                    <div class="col-md-3 text-wrap text-start">NAME OF SCHOOL</div>
                    <div class="col-md-2 text-wrap text-start">BASIC EDUCATION / DEGREE / COURSE</div>
                    <div class="col-md-2 text-wrap text-start">PERIOD OF ATTENDANCE</div>
                    <div class="col-md-1 text-wrap text-start">HIGHEST LEVEL / UNITS EARNED</div>
                    <div class="col-md-1 text-wrap text-start">YEAR GRADUATED</div>
                    <div class="col-md-1 text-wrap text-start">SCHOLARSHIP / ACADEMIC HONORS RECEIVED</div>
                </div>
            
              
                <div class="education-entry">
                    <div class="row py-2 align-items-center">
                        <div class="col-md-2">ELEMENTARY</div>
                        <div class="col-md-3"><input type="text" name="elemName" class="form-control form-control" placeholder="Enter school name"></div>
                        <div class="col-md-2"><input type="text" name="elemBasicEduc" class="form-control form-control" placeholder="Basic Education"></div>
                        <div class="col-md-2 d-flex">
                            <input type="text" name="elemFrom" class="form-control form-control me-1" placeholder="From">
                            <input type="text" name="elemTo" class="form-control form-control" placeholder="To">
                        </div>
                        <div class="col-md-1"><input type="text" name="elemUnits" class="form-control form-control" placeholder="Lvl"></div>
                        <div class="col-md-1"><input type="text" name="elemYrGrad" class="form-control form-control" placeholder="Year"></div>
                        <div class="col-md-1"><input type="text" name="elemHonors" class="form-control form-control" placeholder="Honors"></div>
                    </div>
                </div>
            
                <div class="education-entry">
                    <div class="row py-2 align-items-center">
                        <div class="col-md-2">SECONDARY</div>
                        <div class="col-md-3"><input type="text" name="secondName" class="form-control form-control" placeholder="Enter school name"></div>
                        <div class="col-md-2"><input type="text" name="secondBasicEduc" class="form-control form-control" placeholder="Basic Education"></div>
                        <div class="col-md-2 d-flex">
                            <input type="text" name="secondFrom" class="form-control form-control me-1" placeholder="From">
                            <input type="text" name="secondTo" class="form-control form-control" placeholder="To">
                        </div>
                        <div class="col-md-1"><input type="text" name="secondUnits" class="form-control form-control" placeholder="Lvl"></div>
                        <div class="col-md-1"><input type="text" name="secondYrGrad" class="form-control form-control" placeholder="Year"></div>
                        <div class="col-md-1"><input type="text" name="secondHonors" class="form-control form-control" placeholder="Honors"></div>
                    </div>
                </div>
            
                <div class="education-entry">
                    <div class="row py-2 align-items-center">
                        <div class="col-md-2">VOCATIONAL</div>
                        <div class="col-md-3"><input type="text" name="vocName" class="form-control form-control" placeholder="Enter school name"></div>
                        <div class="col-md-2"><input type="text" name="vocCourse" class="form-control form-control" placeholder="Course/Degree"></div>
                        <div class="col-md-2 d-flex">
                            <input type="text" name="vocFrom" class="form-control form-control me-1" placeholder="From">
                            <input type="text" name="vocTo" class="form-control form-control" placeholder="To">
                        </div>
                        <div class="col-md-1"><input type="text" name="vocUnits" class="form-control form-control" placeholder="Lvl"></div>
                        <div class="col-md-1"><input type="text" name="vocYrGrad" class="form-control form-control" placeholder="Year"></div>
                        <div class="col-md-1"><input type="text" name="vocHonors" class="form-control form-control" placeholder="Honors"></div>
                    </div>
                </div>
            
                <div class="education-entry">
                    <div class="row py-2 align-items-center">
                        <div class="col-md-2">COLLEGE</div>
                        <div class="col-md-3"><input type="text" name="colName" class="form-control form-control" placeholder="Enter school name"></div>
                        <div class="col-md-2"><input type="text" name="colCourse" class="form-control form-control" placeholder="Degree/Course"></div>
                        <div class="col-md-2 d-flex">
                            <input type="text" name="colFrom" class="form-control form-control me-1" placeholder="From">
                            <input type="text" name="colTo" class="form-control form-control" placeholder="To">
                        </div>
                        <div class="col-md-1"><input type="text" name="colUnits" class="form-control form-control" placeholder="Lvl"></div>
                        <div class="col-md-1"><input type="text" name="colYrGrad" class="form-control form-control" placeholder="Year"></div>
                        <div class="col-md-1"><input type="text" name="colHonors" class="form-control form-control" placeholder="Honors"></div>
                    </div>
                </div>
            
                <div class="education-entry">
                    <div class="row py-2 align-items-center">
                        <div class="col-md-2">GRADUATE STUDIES</div>
                        <div class="col-md-3"><input type="text" name="gradName" class="form-control form-control" placeholder="Enter school name"></div>
                        <div class="col-md-2"><input type="text" name="gradCourse" class="form-control form-control" placeholder="Degree/Course"></div>
                        <div class="col-md-2 d-flex">
                            <input type="text" name="gradFrom" class="form-control form-control me-1" placeholder="From">
                            <input type="text" name="gradTo" class="form-control form-control" placeholder="To">
                        </div>
                        <div class="col-md-1"><input type="text" name="gradUnits" class="form-control form-control" placeholder="Lvl"></div>
                        <div class="col-md-1"><input type="text" name="gradYrGrad" class="form-control form-control" placeholder="Year"></div>
                        <div class="col-md-1"><input type="text" name="gradHonors" class="form-control form-control" placeholder="Honors"></div>
                    </div>
                </div>
            </div>
            <br>
        </fieldset>
        <fieldset>
            <legend class="bg-dark-subtle">
                <h5><b>IV. CIVIL SERVICE ELIGIBILITY</b></h5>
            </legend>
            <hr>
            <div class="container">
                <p>27. </p>
            
                <div class="container mt-4">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="mb-0">Civil Service / License Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-3">
                
                                <div class="col-12">
                                    <label class="form-label">CAREER SERVICE/ RA 1080 (BOARD/ BAR) UNDER SPECIAL LAWS/ CES/ CSEE BARANGAY ELIGIBILITY / DRIVER'S LICENSE</label>
                                    <input type="text" class="form-control" id="serviceType" placeholder="Enter type">
                                </div>
                            </div>
                
                            <div class="row g-3 mt-2 align-items-end">
                                <div class="col-md-2">
                                    <label class="form-label">RATINGS</label>
                                    <input type="text" class="form-control" id="rating" placeholder="If applicable">
                                </div>
                                <div class="col-md-3">
                                    <label class="form-label" for="examDate">DATE OF EXAMINATION</label>
                                    <input type="date" class="form-control" id="examDate">
                                </div>
                                <div class="col-md-7">
                                    <label class="form-label">PLACE OF EXAMINATION/ CONFERMENT</label>
                                    <input type="text" class="form-control" id="examLocation" placeholder="Enter location">
                                </div>
                            </div>
                
                            <div class="row g-3 mt-2">
                                <div class="col-md-6">
                                    <label class="form-label">NUMBER</label>
                                    <input type="text" class="form-control" id="licenseNumber" placeholder="If applicable">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" for="validityDate">Date of Validity</label>
                                    <input type="date" class="form-control" id="validityDate">
                                </div>
                            </div>
                
                            <div class="mt-3">
                                <button type="button" class="btn btn-dark" id="addEntry">ADD</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            
                <div class="mt-4">
                    <h5 class="p-2">RECORDS</h5>
                    <div id="civilServiceTableWrapper">
                        <table class="table table-bordered d-none d-md-table">
                            <thead class="">
                                <tr>
                                    <th>Service Type</th>
                                    <th>Rating</th>
                                    <th>Exam Date</th>
                                    <th>Exam Location</th>
                                    <th>License Number</th>
                                    <th>Validity Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="civilServiceTable"></tbody>
                        </table>
            
                        <div id="civilServiceList" class="d-md-none"></div>
                    </div>
                </div>
            </div>
            <br>
        </fieldset>
        <fieldset>
            <legend class="bg-dark-subtle">
                <h5><b>V. WORK EXPERIENCE</b></h5>
            </legend>
            <hr>
            <div class="container mt-4">
                <p>28. </p>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Work Experiences</h5>
                    </div>
                    <div class="card-body">
                        
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">POSITION TITLE</label>
                                <input type="text" class="form-control" id="positionTitle" placeholder="Enter position">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">DEPARTMENT/AGENCY/OFFICE/COMPANY</label>
                                <input type="text" class="form-control" id="department" placeholder="Enter department/agency">
                            </div>
                        </div>
            
                        
                        <div class="row g-3 mt-2 align-items-end">
                            <div class="col-md-2">
                                <label class="form-label" for="workFrom">From</label>
                                <input type="date" class="form-control" id="workFrom">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label" for="workTo">To</label>
                                <input type="date" class="form-control" id="workTo">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">MONTHLY SALARY</label>
                                <input type="text" class="form-control" id="monthlySalary" placeholder="Enter salary">
                            </div>
                            <div class="col-md-5">
                                <label class="form-label">SALARY/JOB/PAY GRADE (If applicable & STEP)</label>
                                <input type="text" class="form-control" id="salaryGrade" placeholder="Enter grade/step">
                            </div>
                        </div>
            
                        
                        <div class="row g-3 mt-2">
                            <div class="col-md-6">
                                <label class="form-label">STATUS APPOINTMENT</label>
                                <input type="text" class="form-control" id="statusAppointment" placeholder="Enter status">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="govService">GOV'T SERVICE (Y/N)</label>
                                <select class="form-control" id="govService" title="Government Service Selection">
                                    <option value="">Select</option>
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
            
                        <div class="mt-3">
                            <button type="button" class="btn btn-dark" id="addWorkEntry">ADD</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="workExperienceTable">
                <h5 class="p-2">WORK EXPERIENCE RECORDS</h5>
            
                <!-- TABLE: Only visible on medium and larger screens -->
                <div class="table-responsive d-none d-md-block"> 
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th colspan="2">INCLUSIVE DATES</th>
                                <th rowspan="2">POSITION TITLE</th>
                                <th rowspan="2">DEPARTMENT/AGENCY/OFFICE/COMPANY</th>
                                <th rowspan="2">MONTHLY SALARY</th>
                                <th rowspan="2">SALARY/JOB/PAY GRADE</th>
                                <th rowspan="2">STATUS OF APPOINTMENT</th>
                                <th rowspan="2">GOV'T SERVICE (Y/N)</th>
                                <th rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th>From</th>
                                <th>To</th>
                            </tr>
                        </thead>
                        <tbody id="workExperienceTable"></tbody>
                    </table>
                </div>
            
                <!-- LIST VIEW: Only visible on small screens -->
                <div id="workExperienceList" class="d-md-none"></div>
            </div>
            <br>
        </fieldset>
        <fieldset>
            <legend class="bg-dark-subtle">
                <h5><b>VI. VOLUNTARY WORK OR INVOLVEMENT IN CIVIC / NON-GOVERNMENT / PEOPLE / VOLUNTARY ORGANIZATION/S</b></h5>
            </legend>
            <hr>
            <div class="container mt-4">
                <p>29. </p>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Voluntary Work Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">NAME & ADDRESS OF ORGANIZATION</label>
                                <input type="text" class="form-control" id="volOrgName" placeholder="Enter organization name & address">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">POSITION / NATURE OF WORK</label>
                                <input type="text" class="form-control" id="volPosition" placeholder="Enter position/nature of work">
                            </div>
                        </div>
        
                        <div class="row g-3 mt-2 align-items-end">
                            <div class="col-md-3">
                                <label class="form-label" for="volWorkFrom">From</label>
                                <input type="date" class="form-control" id="volWorkFrom">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label" for="volWorkTo">To</label>
                                <input type="date" class="form-control" id="volWorkTo">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">NUMBER OF HOURS</label>
                                <input type="text" class="form-control" id="volHours" placeholder="Enter hours worked">
                            </div>
                        </div>
        
                        <div class="mt-3">
                            <button type="button" class="btn btn-dark" id="addVolEntry">ADD</button>
                        </div>
                    </div>
                </div>
            </div>
        
            <br>
        
            <div class="voluntaryWorkTable">
                <h5 class="p-2">VOLUNTARY WORK RECORDS</h5>
        
                <!-- TABLE: Only visible on medium and larger screens -->
                <div class="table-responsive d-none d-md-block">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="2">NAME & ADDRESS OF ORGANIZATION</th>
                                <th colspan="2">INCLUSIVE DATES</th>
                                <th rowspan="2">NUMBER OF HOURS</th>
                                <th rowspan="2">POSITION/NATURE OF WORK</th>
                                <th rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th>From</th>
                                <th>To</th>
                            </tr>
                        </thead>
                        <tbody id="voluntaryWorkTable"></tbody>
                    </table>
                </div>
        
                <!-- LIST VIEW: Only visible on small screens -->
                <div id="voluntaryWorkList" class="d-md-none"></div>
            </div>
            <br>
        </fieldset>
        <fieldset>
            <legend class="bg-dark-subtle">
                <h5><b>VII. LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING PROGRAMS ATTENDED</b></h5>
            </legend>
            <hr>
            <div class="container mt-4">
                <p>30. </p>
                <div class="card">
                    <div class="card-header">
                        <h5 class="mb-0">Learning & Development Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label class="form-label">TITLE OF LEARNING AND DEVELOPMENT INTERVENTIONS/TRAINING PROGRAMS</label>
                                <input type="text" class="form-control" id="ldTitle" placeholder="Enter full training title">
                            </div>
                            
                        </div>
        
                        <div class="row g-3 mt-2 align-items-end">
                            <div class="col-md-6">
                                <label class="form-label">TYPE OF LD (Managerial/Supervisory/Technical/etc.)</label>
                                <input type="text" class="form-control" id="ldType" placeholder="Enter type of learning development">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label" for="ldFrom">From</label>
                                <input type="date" class="form-control" id="ldFrom">
                            </div>
                            <div class="col-md-2">
                                <label class="form-label" for="ldTo">To</label>
                                <input type="date" class="form-control" id="ldTo">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">NUMBER OF HOURS</label>
                                <input type="text" class="form-control" id="ldHours" placeholder="Enter hours">
                            </div>
                            <div class="col-md-6 mt-3">
                                <label class="form-label">CONDUCTED / SPONSORED BY</label>
                                <input type="text" class="form-control" id="ldConductedBy" placeholder="Enter sponsor full name">
                            </div>
                        </div>
        
                        <div class="mt-3">
                            <button type="button" class="btn btn-dark" id="addLdEntry">ADD</button>
                        </div>
                    </div>
                </div>
            </div>
        
            <br>
        
            <div class="learningDevelopmentTable">
                <h5 class="p-2">LEARNING AND DEVELOPMENT RECORDS</h5>
        
                <!-- TABLE: Only visible on medium and larger screens -->
                <div class="table-responsive d-none d-md-block">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th rowspan="2">TITLE OF TRAINING PROGRAM</th>
                                <th colspan="2">INCLUSIVE DATES</th>
                                <th rowspan="2">NUMBER OF HOURS</th>
                                <th rowspan="2">TYPE OF LD</th>
                                <th rowspan="2">CONDUCTED / SPONSORED BY</th>
                                <th rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th>From</th>
                                <th>To</th>
                            </tr>
                        </thead>
                        <tbody id="learningDevelopmentTable"></tbody>
                    </table>
                </div>
        
                <!-- LIST VIEW: Only visible on small screens -->
                <div id="learningDevelopmentList" class="d-md-none"></div>
            </div>
            <br>
        </fieldset>
        <fieldset>
            <legend class="bg-dark-subtle">
                <h5><b>VIII. OTHER INFORMATION</b></h5>
            </legend>
            <hr>
            <div class="container mt-4">
                <div class="row">
                    <!-- 31. SPECIAL SKILLS AND HOBBIES -->
                    <div class="col-md-4">
                        <div class="container-section">
                            <div class="input-container">
                                <p>31. SPECIAL SKILLS and HOBBIES</p>
                                <br>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="specialSkillsInput" placeholder="Enter skill or hobby">
                                    <button type="button" class="btn btn-dark" id="addSkill">+</button>
                                </div>
                            </div>
                            <hr>
                            <div class="list-container">
                                <ul class="list-group mt-2" id="specialSkillsList"></ul>
                            </div>
                        </div>
                        <br>
                    </div>
            
                    <!-- 32. NON-ACADEMIC DISTINCTIONS/RECOGNITION -->
                    <div class="col-md-4">
                        <div class="container-section">
                            <div class="input-container">
                                <p>32. NON-ACADEMIC DISTINCTIONS/RECOGNITION</p>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="nonAcademicInput" placeholder="Enter award or recognition">
                                    <button type="button" class="btn btn-dark" id="addRecognition">+</button>
                                </div>
                            </div>
                            <hr>
                            <div class="list-container">
                                <ul class="list-group mt-2" id="nonAcademicList"></ul>
                            </div>
                        </div>
                        <br>
                    </div>
            
                    <!-- 33. MEMBERSHIP IN ASSOCIATION/ORGANIZATION -->
                    <div class="col-md-4">
                        <div class="container-section">
                            <div class="input-container">
                                <p>33. MEMBERSHIP IN ASSOCIATION/ORGANIZATION</p>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="membershipInput" placeholder="Enter organization name">
                                    <button type="button" class="btn btn-dark" id="addMembership">+</button>
                                </div>
                            </div>
                            <hr>
                            <div class="list-container">
                                <ul class="list-group mt-2" id="membershipList"></ul>
                            </div>
                        </div>
                        <br>
                    </div>
                </div>
            </div>
            
        </fieldset>
        <fieldset id="lastPage">
            <div class="c4-container">
                <div class="c4-container-header"></div>
                <div class="c4-container-body questionsSection" id="questionsSection" name="questionsSection">
                    <br>
                    <div class="form-group row">
                        <label for="" class="col-sm-1 col-form-label ms-2">34.</label>
                        <label for="" class="col-sm-6 col-form-label">Are you related by consanguinity or affinity to the appointing or recommending authority, or to the <br>
                          Bureau or Department where you will be apppointed,
                        </label>
                        <label for="" class="col-sm-5 col-form-label"></label>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-1 col-form-label"></label>
                        <label for="" class="col-sm-6 col-form-label">a. within the third degree?
                        </label>
                        <div for="" class="col-sm-5 col-form-label">
      
                          <input class="form-check-input" type="radio" name="TD" id="TDYes" value="Yes" checked>
                          <label class="form-check-label" for="TDYes">
                            Yes
                          </label>
      
                          &nbsp;&nbsp;&nbsp;&nbsp;
      
                          <input class="form-check-input" type="radio" name="TD" id="TDNo" value="No">
                          <label class="form-check-label" for="TDNo">
                            No
                          </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-1 col-form-label"></label>
                        <label for="" class="col-sm-6 col-form-label">b. within the fourth degree (for Local Government Unit - Career Employees)?
                        </label>
                        <div for="" class="col-sm-5 col-form-label">
      
                          <input class="form-check-input" type="radio" name="FD" id="FDYes" value="Yes" checked>
                          <label class="form-check-label" for="FDYes">
                            Yes
                          </label>
      
                          &nbsp;&nbsp;&nbsp;&nbsp;
      
                          <input class="form-check-input" type="radio" name="FD" id="FDNo" value="No">
                          <label class="form-check-label" for="FDNo">
                            No
                          </label>
      
                          <br>
                          <br>
                          <label for="FDDetails">If YES, give details:</label>
                          <textarea class="form-control" id="FDDetails" rows="3"></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="" class="col-sm-1 col-form-label">35.</label>
                        <label for="" class="col-sm-6 col-form-label">a. Have you ever been found guilty of any administrative offense?
                        </label>
                        <div for="" class="col-sm-5 col-form-label">
                          <input class="form-check-input" type="radio" name="AO" id="AOYes" value="Yes" checked>
                          <label class="form-check-label" for="AOYes">
                            Yes
                          </label>
      
                          &nbsp;&nbsp;&nbsp;&nbsp;
      
                          <input class="form-check-input" type="radio" name="AO" id="AONo" value="No">
                          <label class="form-check-label" for="AONo">
                            No
                          </label>
      
                          <br>
                          <br>
                          <label for="AODetails">If YES, give details:</label>
                          <textarea class="form-control" id="AODetails" rows="3"></textarea>
                        </div>
                    </div>
                    <br>

                    <div class="form-group row">
                    <label for="" class="col-sm-1 col-form-label"></label>
                    <label for="" class="col-sm-6 col-form-label">b. Have you been criminally charged before any court?
                    </label>
                    <div for="" class="col-sm-5 col-form-label">
                        <input class="form-check-input" type="radio" name="CC" id="CCYes" value="Yes" checked>
                        <label class="form-check-label" for="CCYes">
                        Yes
                        </label>

                        &nbsp;&nbsp;&nbsp;&nbsp;

                        <input class="form-check-input" type="radio" name="CC" id="CCNo" value="No">
                        <label class="form-check-label" for="CCNo">
                        No
                        </label>

                        <br>
                        <br>
                        <label for="CCDate">If YES, give details:</label>
                        <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-3 col-form-label">
                            Date Filed: 
                        </div>
                        <div class="col-sm-8 col-form-label">
                            <input type="date" class="form-control" id="CCDate" placeholder="CCDate">
                        </div>
                        </div>

                        <div class="form-group row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-3 col-form-label">
                            Status of Case/s:
                        </div>
                        <div class="col-sm-8 col-form-label">
                            <input type="text" class="form-control" id="CCSOC" placeholder="CCSOC">
                        </div>
                        </div>
                    </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="" class="col-sm-1 col-form-label">36.</label>
                        <label for="" class="col-sm-6 col-form-label">
                          Have you ever been convicted of any crime or violation of anylaw, ordinance or regulations
                          by any court or tribunal
      
                        </label>
                        <div for="" class="col-sm-5 col-form-label">
                          <input class="form-check-input" type="radio" name="CON" id="CONYes" value="Yes" checked>
                          <label class="form-check-label" for="CONYes">
                            Yes
                          </label>
      
                          &nbsp;&nbsp;&nbsp;&nbsp;
      
                          <input class="form-check-input" type="radio" name="CON" id="CONNo" value="No">
                          <label class="form-check-label" for="CONNo">
                            No
                          </label>
      
                          <br>
                          <br>
                          <label for="CONDetails">If YES, give details:</label>
                          <textarea class="form-control" id="CONDetails" rows="3"></textarea>
                        </div>

                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="" class="col-sm-1 col-form-label">37.</label>
                        <label for="" class="col-sm-6 col-form-label">
                          Have you ever been separated from the service in any of the following modes: resignation, retirement, dropped from the rolls, dismissal,
                          termination, end of term, finished contract or phased out (abolition) in the public or private sector?
      
                        </label>
                        <div for="" class="col-sm-5 col-form-label">
                          <input class="form-check-input" type="radio" name="SFTS" id="SFTSYes" value="Yes" checked>
                          <label class="form-check-label" for="SFTSYes">
                            Yes
                          </label>
      
                          &nbsp;&nbsp;&nbsp;&nbsp;
      
                          <input class="form-check-input" type="radio" name="SFTS" id="SFTSNo" value="No">
                          <label class="form-check-label" for="SFTSNo">
                            No
                          </label>
      
                          <br>
                          <br>
                          <label for="SFTSDetails">If YES, give details:</label>
                          <textarea class="form-control" id="SFTSDetails" rows="3"></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="" class="col-sm-1 col-form-label">38.</label>
                        <label for="" class="col-sm-6 col-form-label">a. Have you ever been a candidate in a national or local election held within the last year (except Barangay election)?
                        </label>
                        <div for="" class="col-sm-5 col-form-label">
                          <input class="form-check-input" type="radio" name="CNOLE" id="CNOLEYes" value="Yes" checked>
                          <label class="form-check-label" for="CNOLEYes">
                            Yes
                          </label>
      
                          &nbsp;&nbsp;&nbsp;&nbsp;
      
                          <input class="form-check-input" type="radio" name="CNOLE" id="CNOLENo" value="No">
                          <label class="form-check-label" for="CNOLENo">
                            No
                          </label>
      
                          <br>
                          <br>
                          <label for="CNOLEDetails">If YES, give details:</label>
                          <textarea class="form-control" id="CNOLEDetails" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-1 col-form-label"></label>
                        <label for="" class="col-sm-6 col-form-label">b. Have you resigned from the government service during the three (3)-month period before the last election to promote/actively campaign for a national or local candidate?
                        </label>
                        <div for="" class="col-sm-5 col-form-label">
                          <input class="form-check-input" type="radio" name="RGS" id="RGSYes" value="Yes" checked>
                          <label class="form-check-label" for="RGSYes">
                            Yes
                          </label>
      
                          &nbsp;&nbsp;&nbsp;&nbsp;
      
                          <input class="form-check-input" type="radio" name="RGS" id="RGSNo" value="No">
                          <label class="form-check-label" for="RGSNo">
                            No
                          </label>
      
                          <br>
                          <br>
                          <label for="RGSDetails">If YES, give details:</label>
                          <textarea class="form-control" id="RGSDetails" rows="3"></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="" class="col-sm-1 col-form-label">39.</label>
                        <label for="" class="col-sm-6 col-form-label">Have you acquired the status of an immigrant or permanent resident of another country?
                        </label>
                        <div for="" class="col-sm-5 col-form-label">
                          <input class="form-check-input" type="radio" name="SIoPS" id="SIoPSYes" value="Yes" checked>
                          <label class="form-check-label" for="SIoPSYes">
                            Yes
                          </label>
      
                          &nbsp;&nbsp;&nbsp;&nbsp;
      
                          <input class="form-check-input" type="radio" name="SIoPS" id="SIoPSNo" value="No">
                          <label class="form-check-label" for="SIoPSNo">
                            No
                          </label>
      
                          <br>
                          <br>
                          <label for="SIoPSDetails">If YES, give details:</label>
                          <textarea class="form-control" id="SIoPSDetails" rows="3"></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <label for="" class="col-sm-1 col-form-label">40.</label>
                        <label for="" class="col-sm-6 col-form-label">Pursuant to: (a) Indigenous People's Act (RA 8371); (b) Magna Carta for Disabled Persons (RA 7277); and (c) Solo Parents Welfare Act of 2000 (RA 8972), please answer the following items:
                        </label>
                        <label for="" class="col-sm-5 col-form-label"></label>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-1 col-form-label">a.</label>
                        <label for="" class="col-sm-6 col-form-label">Are you a member of any indigenous group?
                        </label>
                        <div for="" class="col-sm-5 col-form-label">
                          <input class="form-check-input" type="radio" name="IG" id="IGYes" value="Yes" checked>
                          <label class="form-check-label" for="IGYes">
                            Yes
                          </label>
      
                          &nbsp;&nbsp;&nbsp;&nbsp;
      
                          <input class="form-check-input" type="radio" name="IG" id="IGNo" value="No">
                          <label class="form-check-label" for="IGNo">
                            No
                          </label>
      
                          <br>
                          <br>
                          <div class="form-group row">
                            <div class="col-sm-4">
                              If Yes, please specify:
                            </div>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="IGDetails" placeholder="IGDetails">
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-1 col-form-label">b.</label>
                        <label for="" class="col-sm-6 col-form-label">Are you a person with disability?
                        </label>
                        <div for="" class="col-sm-5 col-form-label">
                          <input class="form-check-input" type="radio" name="PwD" id="PwDYes" value="Yes" checked>
                          <label class="form-check-label" for="PwDYes">
                            Yes
                          </label>
      
                          &nbsp;&nbsp;&nbsp;&nbsp;
      
                          <input class="form-check-input" type="radio" name="PwD" id="PwDNo" value="No">
                          <label class="form-check-label" for="PwDNo">
                            No
                          </label>
      
                          <br>
                          <br>
                          <div class="form-group row">
                            <div class="col-sm-4">
                              If Yes, please specify ID No:
                            </div>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="PwDDetails" placeholder="PwDDetails">
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-1 col-form-label">c.</label>
                        <label for="" class="col-sm-6 col-form-label">Are you a solo parent?
                        </label>
                        <div for="" class="col-sm-5 col-form-label">
                          <input class="form-check-input" type="radio" name="SP" id="SPYes" value="Yes" checked>
                          <label class="form-check-label" for="SPYes">
                            Yes
                          </label>
      
                          &nbsp;&nbsp;&nbsp;&nbsp;
      
                          <input class="form-check-input" type="radio" name="SP" id="SPNo" value="No">
                          <label class="form-check-label" for="SPNo">
                            No
                          </label>
      
                          <br>
                          <br>
                          <div class="form-group row">
                            <div class="col-sm-4">
                              If Yes, please specify ID No:
                            </div>
                            <div class="col-sm-8">
                              <input type="text" class="form-control" id="SPDetails" placeholder="SPDetails">
                            </div>
                          </div>
                        </div>
                    </div>
                    <hr>
                    <div class="holder-box-3">
                        <div class="box-2">
                            <div class="form-group row">
                                <label class="col-sm-1">41.</label>
                                <label class="col-sm-11">
                                    REFERENCES (Person not related by consanguinity or affinity to applicant/appointee)
                                </label>
                            </div>
                            <br>
                            <div class="container mt-4">
                                <div class="card p-3 shadow-sm">
                                    <div class="row g-3">
                                        <div class="col-md-4">
                                            <label for="RefName" class="form-label">Name</label>
                                            <input type="text" class="form-control" id="RefName" placeholder="Enter name">
                                        </div>
                                    
                                        <div class="col-md-4">
                                            <label for="RefAddress" class="form-label">Address</label>
                                            <input type="text" class="form-control" id="RefAddress" placeholder="Enter address">
                                        </div>
                                    
                                        <div class="col-md-4">
                                            <label for="RefTelNo" class="form-label">Tel. No.</label>
                                            <input type="text" class="form-control" id="RefTelNo" placeholder="Enter phone number">
                                        </div>
                                    </div>
                            
                                    <button type="button" class="btn btn-dark mt-3 w-100" id="ReferencesAdd">Add Reference</button>
                                </div>
                            
                                <!-- List for Small Screens (Hidden on Large Screens) -->
                                <div class="mt-4 d-md-none">
                                    <h5 class="text-center">List of References</h5>
                                    <ul class="list-group" id="referenceList"></ul>
                                </div>
                            
                                <!-- Table for Large Screens (Hidden on Small Screens) -->
                                <div class="table-responsive mt-4 d-none d-md-block">
                                    <h5 class="text-center">References</h5>
                                    <table class="table table-bordered">
                                        <thead class="">
                                            <tr>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Tel. No.</th>
                                                <th width="3">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody id="referenceTableBody"></tbody>
                                    </table>
                                </div>
                            </div>
                            
                        
                            <hr>
                            
                            
                            
                            

                        </div>
                    </div>
                </div>
                <div class="lastPartSection" id="lastPartSection" name="lastPartSection"> 
                        <hr>
                        
                        <!-- Declaration -->
                        <div class="row">
                            <div class="form-group row col-md-8 my-2">
                                <label class="col-sm-1">42.</label>
                                <label class="col-sm-11">
                                I declare under oath that I have personally accomplished this Personal Data Sheet which is a true, correct and complete statement pursuant to the provisions of pertinent laws, rules and regulations of the Republic of the Philippines. I authorize the agency head/authorized representative to verify/validate the contents stated herein.          I  agree that any misrepresentation made in this document and its attachments shall cause the filing of administrative/criminal case/s against me.
 
                                </label>
                            </div>
                            <br>
                            <div class="container col-md-4 p-3 border rounded">
                                <div class="box-3-picturebox text-center">
                                    <div id="imagePreview" class="d-flex align-items-center justify-content-center">
                                        <p class="text-muted" id="placeholderText">
                                        ID picture taken within 
                                        the last  6 months
                                        3.5 cm. X 4.5 cm
                                        (passport size)

                                        With full and handwritten
                                        name tag and signature over
                                        printed name

                                        Computer generated 
                                        or photocopied picture 
                                        is not acceptable

                                        </p>
                                    </div>
                                    <label for="C4_Picture" class="form-label mt-2">Upload ID Picture</label>
                                    <input type="file" class="form-control" id="C4_Picture" name="C4_Picture" accept="image/*" title="Choose an ID picture">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Government Issued ID Section -->
                        <div class="form-group row justify-content-evenly g-3">
                            <div class="col-lg-5 col-md-6 col-sm-12 border rounded p-4 mb-3">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <strong>Government Issued ID</strong> (i.e. Passport, GSIS, SSS, PRC, Driver's License, etc.)
                                        <small class="text-muted">PLEASE INDICATE ID Number and Date of Issuance</small>
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row align-items-center">
                                    <div class="col-sm-5">Government Issued ID:</div>
                                    <div class="col-sm-7">
                                        <input type="text" name="GIID" class="form-control" id="GIID" placeholder="Enter ID Type">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row align-items-center">
                                    <div class="col-sm-5">ID/License/Passport No.:</div>
                                    <div class="col-sm-7">
                                        <input type="text" name="ID_L_PNO" class="form-control" id="ID_L_PNO" placeholder="Enter ID Number">
                                    </div>
                                </div>
                                <br>
                                <div class="form-group row align-items-center">
                                    <div class="col-sm-5">Date/Place of Issuance:</div>
                                    <div class="col-sm-7">
                                        <input type="text" name="D_PoI" class="form-control" id="D_PoI" placeholder="Enter Date/Place">
                                    </div>
                                </div>
                            </div>

                            <!-- Signature Upload Section -->
                            <div class="col-lg-5 col-md-6 col-sm-12 border rounded p-4 mb-3">
                                <div class="border mt-2 mb-3 p-3 d-flex align-items-center justify-content-center bg-light rounded" id="signaturePreview">
                                    <p class="text-muted mb-0" id="signaturePlaceholder">Signature (Sign inside the box)</p>
                                </div>
                                <div class="form-group text-center mb-3">
                                    <label for="C4_Signature" class="form-label fw-bold">Upload Signature</label>
                                    <input type="file" class="form-control" id="C4_Signature" name="C4_Signature" accept="image/*" title="Upload a signature">
                                </div>
                                <div class="form-group text-center">
                                    <label for="C4_Date" class="form-label fw-bold">Date Accomplished</label>
                                    <input type="date" class="form-control" id="C4_Date" name="date_Accomplish">
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="d-flex flex-column align-items-center text-center">
                            <label class="mb-3">
                                SUBSCRIBED AND SWORN to before me this 
                                <input type="date" name= "dateSworn" class="form-control d-inline w-auto">, 
                                affiant exhibiting his/her validly issued government ID as indicated above.
                            </label>

                            <div class="col-lg-5 col-md-6 col-sm-12 border rounded p-4">
                                <div class="border mt-2 mb-3 p-3 d-flex align-items-center justify-content-center bg-light rounded" id="signaturePreview">
                                    <p class="text-muted mb-0" id="signaturePlaceholder">Signature (Sign inside the box)</p>
                                </div>
                                <div class="form-group text-center mb-3">
                                    <label for="Sworn_Sig" class="form-label fw-bold">Upload Signature</label>
                                    <input type="file" class="form-control" id="Sworn_Sig" name="Sworn_Sig" accept="image/*" title="Upload a signature">
                                </div>
                                <div class="form-group text-center">
                                    <label for="personAdminOath" class="form-label fw-bold">Person Administering Oath</label>
                                    <input type="text" class="form-control" id="personAdminOath" name="personAdminOath" placeholder="Enter name">
                                </div>
                            </div>
                        </div>


                
                

                
            </div>
            
        </fieldset>
        
        <hr>
        <div class="col-sm-2 submit-button position-fixed bottom-0 end-0 p-3 d-none" id="floatingSubmit">
            <input type="hidden" name="info" id="info">
            <input type="button" id="Submit" class="btn btn-dark btn-lg shadow-lg" value="Submit">
        </div>

        
    </form>
    <script src="/pds/js/pds_main/func.js"></script>
    <script src="/pds/js/pds_main/submit.js"></script>
</body>
</html>

