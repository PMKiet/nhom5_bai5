function closePopup() {
    if(document.getElementById("popupForm-view")) {
        document.getElementById("popupForm-view").style.display = "none"; 
    }
    if(document.getElementById("popupForm-edit")) { 
    document.getElementById("popupForm-edit").style.display = "none"; 
    }
    if(document.getElementById("popupForm-delete")) { 
    document.getElementById("popupForm-delete").style.display = "none";
    }
    if(document.getElementById("popupForm-add")) { 
    document.getElementById("popupForm-add").style.display = "none";
    }
}

function openForm(tenKeHoach, tenLopHoc, tenHocPhan, tenHocKy) {
    document.getElementById("popupForm-view").style.display = "block";

    //chèn dữ liệu
    document.getElementById("plan-id").textContent = tenKeHoach; 
    document.getElementById("plan-class").textContent = tenLopHoc;
    document.getElementById("plan-course").textContent = tenHocPhan;
    document.getElementById("plan-semester").textContent = tenHocKy; 
}

function closePopupEdit() {
    document.getElementById("popupForm-edit").style.display = "none";
}

function openFormEdit(  maKeHoach
                        ,teKeHoach
                        , listIdAndNameClass
                        , listIdAndNameCourse 
                        , listIdAndNameSemester 
                        , tenLopHoc
                        , tenHocPhan
                        , tenHocKy
                        ) {
    document.getElementById("popupForm-edit").style.display = "block"; 

    document.getElementById("plan-id-edit").value = maKeHoach; 
    document.getElementById("plan-name-edit").value = teKeHoach; 


    let selectClassEdit = document.getElementById('plan-class-edit');
    let optsClass = document.querySelectorAll('.class_opt-edit');
    
    //remove toàn bộ option đã tồn tại
    if(optsClass) {
        optsClass.forEach(element => { 
            selectClassEdit.removeChild(element);
        });
    }
    if(selectClassEdit) {
        listIdAndNameClass.forEach(element => {
            let opt = document.createElement('option');
            if(tenLopHoc === element.ten_lop_hoc) {
                opt.setAttribute('selected', true);
            }
            opt.classList.add('class_opt-edit');
            opt.value = element.ma_lop_hoc;
            opt.textContent = element.ten_lop_hoc;
            selectClassEdit.appendChild(opt);
        });
    }

    // select course
    let selectCourse = document.getElementById('plan-course-edit');
    let optsCourse = document.querySelectorAll('.course_opt-edit');
    //remove toàn bộ option đã tồn tại
    if(optsCourse) {
        optsCourse.forEach(element => { 
            selectCourse.removeChild(element);
        });
    }
    if(selectCourse) {
        listIdAndNameCourse.forEach(element => {
            let opt = document.createElement('option');
            opt.classList.add('course_opt-edit');
            if(tenHocPhan === element.ten_hoc_phan) {
                opt.setAttribute('selected', true);
            }
            opt.value = element.ma_hoc_phan;
            opt.textContent = element.ten_hoc_phan;
            selectCourse.appendChild(opt);
        });
    }
    

     

     // select semester
    let selectSemester = document.getElementById('plan-semester-edit');
    let optsSemester = document.querySelectorAll('.semester_opt-edit');
    //remove toàn bộ option đã tồn tại
    if(optsSemester) {
        optsSemester.forEach(element => { 
            selectSemester.removeChild(element);
        });
    }
    if(selectSemester) {
        listIdAndNameSemester.forEach(element => {
            let opt = document.createElement('option');
            opt.classList.add('semester_opt-edit');
            if(tenHocKy === element.ten_hoc_ky) {
                opt.setAttribute('selected', true);
            }
            opt.value = element.ma_hoc_ky;
            opt.textContent = element.ten_hoc_ky;
            selectSemester.appendChild(opt);
        });
    }
}

function openFormDelete(maPhanCong, tenKeHoach, tenLopHoc, tenHocPhan, tenHocKy) {
    document.getElementById("popupForm-delete").style.display = "block";
    
    document.getElementById("plan-id-delete").value = maPhanCong;
    document.getElementById("plan-name-delete").value = tenKeHoach;
    document.getElementById("plan-class-delete").value = tenLopHoc;
    document.getElementById("plan-course-delete").value = tenHocPhan;
    document.getElementById("plan-semester-delete").value = tenHocKy;
}

/////////////////////////////////////////////////////////
function openFormAdd(listIdAndNameClass
                        , listIdAndNameCourse
                        , listIdAndNameSemester) {
    document.getElementById("popupForm-add").style.display = "block"; 

    let selectClass = document.getElementById('plan-class-add');
    let optsClass = document.querySelectorAll('.class_opt');
    
    //remove toàn bộ option đã tồn tại
    if(optsClass) {
        optsClass.forEach(element => { 
            selectClass.removeChild(element);
        });
    }
    if(selectClass) {
        listIdAndNameClass.forEach(element => {
            let opt = document.createElement('option');
          
            opt.classList.add('class_opt');
            opt.value = element.ma_lop_hoc;
            opt.textContent = element.ten_lop_hoc;
            selectClass.appendChild(opt);
        });
    }

    // select course
    let selectCourse = document.getElementById('plan-course-add');
    let optsCourse = document.querySelectorAll('.course_opt');
    //remove toàn bộ option đã tồn tại
    if(optsCourse) {
        optsCourse.forEach(element => { 
            selectCourse.removeChild(element);
        });
    }
    if(selectCourse) {
        listIdAndNameCourse.forEach(element => {
            let opt = document.createElement('option');
            opt.classList.add('course_opt');
           
            opt.value = element.ma_hoc_phan;
            opt.textContent = element.ten_hoc_phan;
            selectCourse.appendChild(opt);
        });
    }
    

     
     // select semester
    let selectSemester = document.getElementById('plan-semester-add');
    let optsSemester = document.querySelectorAll('.semester_opt');
    //remove toàn bộ option đã tồn tại
    if(optsSemester) {
        optsSemester.forEach(element => { 
            selectSemester.removeChild(element);
        });
    }
    if(selectSemester) {
        listIdAndNameSemester.forEach(element => {
            let opt = document.createElement('option');
            opt.classList.add('semester_opt');
          
            opt.value = element.ma_hoc_ky;
            opt.textContent = element.ten_hoc_ky;
            selectSemester.appendChild(opt);
        });
    }

    /////////////////////
    let s_course = document.getElementById('plan-course-add'); 
    let s_class = document.getElementById('plan-class-add');
    let s_semester = document.getElementById('plan-semester-add'); 
    let s_plantName = document.getElementById("plan-name-add"); 
    
    document.querySelector('.add-plan').addEventListener('click', function(e) {
        if(s_course.value === 'chon') {
            s_course.style.borderColor = 'red';
            e.preventDefault();
        } else {
            s_course.style.borderColor = '#aba7a7';
        }
        if(s_class.value === 'chon') {
            s_class.style.borderColor = 'red';
            e.preventDefault();
        } else {
            s_class.style.borderColor = '#aba7a7';
        }
        if(s_semester.value === 'chon') {
            s_semester.style.borderColor = 'red';
            e.preventDefault();
        } else {
            s_semester.style.borderColor = '#aba7a7';
        }
        if(s_plantName.value.trim().length <= 0) {
            s_plantName.style.borderColor = 'red';
            e.preventDefault();
        }else {
            s_plantName.style.borderColor = '#aba7a7';
        }
    })
}


// ==================================================================================