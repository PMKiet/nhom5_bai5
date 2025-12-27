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

function openForm(maHocPhan, tenHocPhan, donVihocTrinh) {
    document.getElementById("popupForm-view").style.display = "block";

    //chèn dữ liệu
    document.getElementById("course-id").textContent = maHocPhan;
    document.getElementById("course-name").textContent = tenHocPhan;
    document.getElementById("course-unit").textContent = donVihocTrinh;
}

function closePopupEdit() {
    document.getElementById("popupForm-edit").style.display = "none";
}

function openFormEdit(maHocPhan, tenHocPhan, donVihocTrinh) {
    document.getElementById("popupForm-edit").style.display = "block";

    document.getElementById("course-id-edit").value = maHocPhan; 
    document.getElementById("course-name-edit").value = tenHocPhan;  
    document.getElementById("course-unit-edit").value = donVihocTrinh;  
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