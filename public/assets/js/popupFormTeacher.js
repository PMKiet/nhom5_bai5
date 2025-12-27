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

function openForm(maGiaoVien, tenGiaoVien, hocHam, hocVi) {
    document.getElementById("popupForm-view").style.display = "block";

    //chèn dữ liệu
    document.getElementById("teacher-id").textContent = maGiaoVien;
    document.getElementById("teacher-name").textContent = tenGiaoVien;
    document.getElementById("teacher-rank").textContent = hocHam != '' ? hocHam : "Không có";
    document.getElementById("teacher-degree").textContent = hocVi;
}

function closePopupEdit() {
    document.getElementById("popupForm-edit").style.display = "none";
}

function openFormEdit(maGiaoVien, tenGiaoVien, hocHam, hocVi) {
    
    
    document.getElementById("popupForm-edit").style.display = "block";

    document.getElementById("teacher-id-edit").value = maGiaoVien; 
    document.getElementById("teacher-name-edit").value = tenGiaoVien; 
    document.getElementById("teacher-rank-edit").value = hocHam; 
    document.getElementById("teacher-degree-edit").value = hocVi; 

}

function openFormDelete(id, tenGiaoVien) {
    document.getElementById("popupForm-delete").style.display = "block";

    document.getElementById("teacher-id-delete").value = id; 
    document.getElementById("teacher-name-delete").value = tenGiaoVien;  
}

function openFormAdd() {
    document.getElementById("popupForm-add").style.display = "block";

    
}


// ==================================================================================