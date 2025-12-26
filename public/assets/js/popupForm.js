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

function openForm(maSinhVien, tenSinhVien, maLop, diaChi) {
    document.getElementById("popupForm-view").style.display = "block";

    //chèn dữ liệu
    document.getElementById("student-id").textContent = maSinhVien;
    document.getElementById("student-name").textContent = tenSinhVien;
    document.getElementById("student-class-id").textContent = maLop != '' ? maLop : "Không có";
    document.getElementById("student-address").textContent = diaChi;
}

function closePopupEdit() {
    document.getElementById("popupForm-edit").style.display = "none";
}

function openFormEdit(id, tenSinhVien, diaChi) {
    document.getElementById("popupForm-edit").style.display = "block";

    document.getElementById("student-id-edit").value = id; 
    document.getElementById("student-name-edit").value = tenSinhVien; 
    document.getElementById("student-address-edit").value = diaChi; 
}

function openFormDelete(id, tenSinhVien) {
    document.getElementById("popupForm-delete").style.display = "block";

    document.getElementById("student-id-delete").value = id; 
    document.getElementById("student-name-delete").value = tenSinhVien;  
}

function openFormAdd() {
    document.getElementById("popupForm-add").style.display = "block";

    
}
