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

function openForm(maHocKy, tenHocKy, batDau, ketThuc) {
    document.getElementById("popupForm-view").style.display = "block";

    //chèn dữ liệu
    document.getElementById("semester-id").textContent = maHocKy;
    document.getElementById("semester-name").textContent = tenHocKy;
    document.getElementById("semester-begin").textContent = batDau;
    document.getElementById("semester-end").textContent = ketThuc;
}

function closePopupEdit() {
    document.getElementById("popupForm-edit").style.display = "none";
}

function openFormEdit(maHocKy, tenHocKy, batDau, ketThuc) {
    document.getElementById("popupForm-edit").style.display = "block";

    document.getElementById("semester-id-edit").value = maHocKy;
    document.getElementById("semester-name-edit").value = tenHocKy;
    document.getElementById("semester-begin-edit").value = batDau;
    document.getElementById("semester-end-edit").value = ketThuc;
}

// function openFormDelete(id, tenSinhVien) {
//     document.getElementById("popupForm-delete").style.display = "block";

//     document.getElementById("course-id-delete").value = id; 
//     document.getElementById("course-name-delete").value = tenSinhVien;  
// }

function openFormAdd() {
    document.getElementById("popupForm-add").style.display = "block";

    let name = document.getElementById('semester-name-add');
    let begin = document.getElementById('semester-begin-add'); 
    let end = document.getElementById('semester-end-add'); 

    document.querySelector('.add-semester').addEventListener('click', function(e) {
        if(name.value.trim().length <= 0) {
            name.style.borderColor = 'red';
            e.preventDefault();
        } else {
            name.style.borderColor = '#aba7a7';
        }
        if(begin.value.trim().length <= 0) {
            begin.style.borderColor = 'red';
            e.preventDefault();
        }else {
            begin.style.borderColor = '#aba7a7';
        }
        if(end.value.trim().length <= 0) {
            end.style.borderColor = 'red';
            e.preventDefault();
        }else {
            end.style.borderColor = '#aba7a7';
        }
    })
}


// ==================================================================================