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

function openForm(maPhanCong, tenGiaoVien, tenLopHoc, tenHocPhan, tenHocKy, soTiet) {
    document.getElementById("popupForm-view").style.display = "block";

    //chèn dữ liệu
    document.getElementById("assignment-id").textContent = maPhanCong;
    document.getElementById("assignment-teacher").textContent = tenGiaoVien;
    document.getElementById("assignment-class").textContent = tenLopHoc;
    document.getElementById("assignment-course").textContent = tenHocPhan;
    document.getElementById("assignment-semester").textContent = tenHocKy;
    document.getElementById("assignment-numberOfLession").textContent = soTiet;
}

function closePopupEdit() {
    document.getElementById("popupForm-edit").style.display = "none";
}

function openFormEdit(maPhanCong
                        , listIdAndNameClass
                        , listIdAndNameCourse
                        , listIdAndNameTeacher
                        , listIdAndNameSemester
                        , tenGiaoVien
                        , tenLopHoc
                        , tenHocPhan
                        , tenHocKy
                        , soTiet) {
    document.getElementById("popupForm-edit").style.display = "block"; 

    document.getElementById("assignment-id-edit").value = maPhanCong;
    document.getElementById("assignment-numberOfLession-edit").value = soTiet;

    let selectClass = document.getElementById('assignment-class-edit');
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
            if(tenLopHoc === element.ten_lop_hoc) {
                opt.setAttribute('selected', true);
            }
            opt.classList.add('class_opt');
            opt.value = element.ma_lop_hoc;
            opt.textContent = element.ten_lop_hoc;
            selectClass.appendChild(opt);
        });
    }

    // select course
    let selectCourse = document.getElementById('assignment-course-edit');
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
            if(tenHocPhan === element.ten_hoc_phan) {
                opt.setAttribute('selected', true);
            }
            opt.value = element.ma_hoc_phan;
            opt.textContent = element.ten_hoc_phan;
            selectCourse.appendChild(opt);
        });
    }
    

     // select teacher
    let selectTeacher = document.getElementById('assignment-teacher-edit');
    let optsTeacher = document.querySelectorAll('.teacher_opt');
    //remove toàn bộ option đã tồn tại
    if(optsTeacher) {
        optsTeacher.forEach(element => { 
            selectTeacher.removeChild(element);
        });
    }
    if(selectTeacher) {
        listIdAndNameTeacher.forEach(element => {
            let opt = document.createElement('option');
            opt.classList.add('teacher_opt');
            if(tenGiaoVien === element.ten_giao_vien) {
                opt.setAttribute('selected', true);
            }
            opt.value = element.ma_giao_vien;
            opt.textContent = element.ten_giao_vien;
            selectTeacher.appendChild(opt);
        });
    }

     // select semester
    let selectSemester = document.getElementById('assignment-semester-edit');
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
            if(tenHocKy === element.ten_hoc_ky) {
                opt.setAttribute('selected', true);
            }
            opt.value = element.ma_hoc_ky;
            opt.textContent = element.ten_hoc_ky;
            selectSemester.appendChild(opt);
        });
    }
}

function openFormDelete(maPhanCong, tenGiaoVien, tenLopHoc, tenHocPhan, tenHocKy) {
    document.getElementById("popupForm-delete").style.display = "block";
    console.log(tenHocKy);
    
    document.getElementById("assignment-id-delete").value = maPhanCong;
    document.getElementById("assignment-teacher-delete").value = tenGiaoVien;
    document.getElementById("assignment-class-delete").value = tenLopHoc;
    document.getElementById("assignment-course-delete").value = tenHocPhan;
    document.getElementById("assignment-semester-delete").value = tenHocKy;
}

/////////////////////////////////////////////////////////
function openFormAdd(listIdAndNameClass
                        , listIdAndNameCourse
                        , listIdAndNameTeacher
                        , listIdAndNameSemester) {
    document.getElementById("popupForm-add").style.display = "block"; 

    let selectClass = document.getElementById('assignment-class-add');
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
    let selectCourse = document.getElementById('assignment-course-add');
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
    

     // select teacher
    let selectTeacher = document.getElementById('assignment-teacher-add');
    let optsTeacher = document.querySelectorAll('.teacher_opt');
    //remove toàn bộ option đã tồn tại
    if(optsTeacher) {
        optsTeacher.forEach(element => { 
            selectTeacher.removeChild(element);
        });
    }
    if(selectTeacher) {
        listIdAndNameTeacher.forEach(element => {
            let opt = document.createElement('option');
            opt.classList.add('teacher_opt');
          
            opt.value = element.ma_giao_vien;
            opt.textContent = element.ten_giao_vien;
            selectTeacher.appendChild(opt);
        });
    }

     // select semester
    let selectSemester = document.getElementById('assignment-semester-add');
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
}


// ==================================================================================