//Job Position validation starts
function job_position_validation() {
    'use strict';
    var job_position_name = document.getElementById("job_position");
    var job_position_value = document.getElementById("job_position").value;
    var job_position_length = job_position_value.length;
    var validation = '/^[a-zA-Z0-9]{1}[a-zA-Z0-9\s,-.]+$/';
    if (!job_position_value.match(validation) || job_position_length < 4) {
        document.getElementById('jp_err').innerHTML = 'You must not leave this field empty';
        job_position_name.focus();
        document.getElementById('jp_err').style.color = "#FF0000";
    }
    else {
        document.getElementById('jp_err').innerHTML = 'Valid Job Position';
        document.getElementById('jp_err').style.color = "#00AF33";
    }
}
//Job Position validation ends

//Job Descritpion validation starts
function job_descirption_validation() {
    'use strict';
    var job_descirption_name = document.getElementById("job_descirption");
    var job_descirption_value = document.getElementById("job_descirption").value;
    var job_descirption_length = job_descirption_value.length;
    var validation = '/^[a-zA-Z0-9]{1}[a-zA-Z0-9\s,-.]+$/';
    if (!job_descirption_value.match(validation) || job_descirption_length === 0) {
        document.getElementById('jd_err').innerHTML = 'You must not leave this field empty';
        job_descirption_name.focus();
        document.getElementById('jd_err').style.color = "#FF0000";
    }
    else {
        document.getElementById('jd_err').innerHTML = 'Valid Job Description';
        document.getElementById('jd_err').style.color = "#00AF33";
    }
}
//Job Description validation ends

//Company validation starts
function company_validation() {
    'use strict';
    var company_name = document.getElementById("company");
    var company_value = document.getElementById("company").value;
    var company_length = company_value.length;
    var validation = '/^[a-zA-Z0-9]{1}[a-zA-Z0-9\s,-.]+$/';

    if (!company_value.match(validation) || company_length === 0) {
        document.getElementById('c_err').innerHTML = 'You must not leave this field empty';
        company_name.focus();
        document.getElementById('c_err').style.color = "#FF0000";
    }
    else {
        document.getElementById('c_err').innerHTML = 'Valid Company';
        document.getElementById('c_err').style.color = "#00AF33";
    }
}
//Company validation ends

//Location validation starts
function location_validation() {
    'use strict';
    var location_name = document.getElementById("location");
    var location_value = document.getElementById("location").value;
    var location_length = location_value.length;
    var validation = '/^[a-zA-Z0-9]{1}[a-zA-Z0-9\s,-.]+$/';

    if (!location_value.match(validation) || location_length === 0) {
        document.getElementById('l_err').innerHTML = 'You must not leave this field empty';
        location_name.focus();
        document.getElementById('l_err').style.color = "#FF0000";
    }
    else {
        document.getElementById('l_err').innerHTML = 'Valid Location';
        document.getElementById('l_err').style.color = "#00AF33";
    }
}
//Location validation ends

//Yearly Salary validation starts
function yearly_salary_validation() {
    'use strict';
    var yearly_salary_name = document.getElementById("yearly_salary");
    var yearly_salary_value = document.getElementById("yearly_salary").value;
    var yearly_salary_length = yearly_salary_value.length;
    var validation = '/^[a-zA-Z0-9]{1}[a-zA-Z0-9\s,-.]+$/';

    if (!yearly_salary_value.match(validation) || yearly_salary_length === 0) {
        document.getElementById('ys_err').innerHTML = 'You must not leave this field empty';
        yearly_salary_name.focus();
        document.getElementById('ys_err').style.color = "#FF0000";
    }
    else {
        document.getElementById('ys_err').innerHTML = 'Valid Yearly Salary';
        document.getElementById('ys_err').style.color = "#00AF33";
    }
}
//Yearly Salary validation ends

//email validation starts
// function email_validation() {
//     'use strict';
//     var mailformat = /^\w+([\.\-]?\w+)*@\w+([\.\-]?\w+)*(\.\w{2,3})+$/;
//     var email_name = document.getElementById("email");
//     var email_value = document.getElementById("email").value;
//     var email_length = email_value.length;
//     if (!email_value.match(mailformat) || email_length === 0) {
//         document.getElementById('email_err').innerHTML = 'This is not a valid email format.';
//         email_name.focus();
//         document.getElementById('email_err').style.color = "#FF0000";
//     }
//     else {
//         document.getElementById('email_err').innerHTML = 'Valid email format';
//         document.getElementById('email_err').style.color = "#00AF33";
//     }
// }
//email validation ends