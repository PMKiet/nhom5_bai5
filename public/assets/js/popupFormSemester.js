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

    
}


// ==================================================================================