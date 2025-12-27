function closePopup() {
    if(document.getElementById("popupForm-view")) {
        document.getElementById("popupForm-view").style.display = "none"; 
    }
    if(document.getElementById("popupForm-edit")) { 
    document.getElementById("popupForm-edit").style.display = "none"; 
    }
    // if(document.getElementById("popupForm-delete")) { 
    // document.getElementById("popupForm-delete").style.display = "none";
    // }
    if(document.getElementById("popupForm-add")) { 
    document.getElementById("popupForm-add").style.display = "none";
    }
}

function openForm(maLop, tenLop, heDaoTao) {
    document.getElementById("popupForm-view").style.display = "block";

    //chèn dữ liệu
    document.getElementById("class-id").textContent = maLop;
    document.getElementById("class-name").textContent = tenLop;
    document.getElementById("class-training").textContent = heDaoTao;
}

function closePopupEdit() {
    document.getElementById("popupForm-edit").style.display = "none";
}

function openFormEdit(id, tenLopHoc) {
    document.getElementById("popupForm-edit").style.display = "block";

    document.getElementById("class-id-edit").value = id; 
    document.getElementById("class-name-edit").value = tenLopHoc;  
}

// function openFormDelete(id, tenSinhVien) {
//     document.getElementById("popupForm-delete").style.display = "block";

//     document.getElementById("student-id-delete").value = id; 
//     document.getElementById("student-name-delete").value = tenSinhVien;  
// }

function openFormAdd() {
    document.getElementById("popupForm-add").style.display = "block";

    
}


// ==================================================================================