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

function openForm(tenGiaoVien, tenLopHoc, tenHocPhan, tenHocKy) {
    document.getElementById("popupForm-view").style.display = "block";

    //chèn dữ liệu
    document.getElementById("assignment-teacher").textContent = tenGiaoVien;
    document.getElementById("assignment-class").textContent = tenLopHoc;
    document.getElementById("assignment-course").textContent = tenHocPhan;
    document.getElementById("assignment-semester").textContent = tenHocKy;
}

function closePopupEdit() {
    document.getElementById("popupForm-edit").style.display = "none";
}

function openFormEdit(listIdAndNameClass, listIdAndNameCourse ) {
    document.getElementById("popupForm-edit").style.display = "block"; 
    console.log(listIdAndNameClass);
    console.log(listIdAndNameCourse);

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

            opt.value = element.ma_hoc_phan;
            opt.textContent = element.ten_hoc_phan;
            selectCourse.appendChild(opt);
        });
    }
    
}

function openFormDelete(id, tenSinhVien) {
    document.getElementById("popupForm-delete").style.display = "block";

    document.getElementById("course-id-delete").value = id; 
    document.getElementById("course-name-delete").value = tenSinhVien;  
}

function openFormAdd() {
    document.getElementById("popupForm-add").style.display = "block";

    
}


// ==================================================================================