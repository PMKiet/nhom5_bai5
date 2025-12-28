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

function openFormEdit(id, tenSinhVien, diaChi, listIdClass) {
    
    
    document.getElementById("popupForm-edit").style.display = "block";

    document.getElementById("student-id-edit").value = id; 
    document.getElementById("student-name-edit").value = tenSinhVien; 
    document.getElementById("student-address-edit").value = diaChi; 

    let select = document.getElementById('student-idClass-edit');
    let opts = document.querySelectorAll('option');
    
    //remove toàn bộ option đã tồn tại
    if(opts) {
        opts.forEach(element => { 
            select.removeChild(element);
        });
    }
    listIdClass.map(e => {
        let opt = document.createElement("option");
        opt.value = e.ma_lop_hoc;
        opt.textContent = e.ten_lop_hoc;
        select.appendChild(opt);
    });
}

function openFormDelete(id, tenSinhVien) {
    document.getElementById("popupForm-delete").style.display = "block";

    document.getElementById("student-id-delete").value = id; 
    document.getElementById("student-name-delete").value = tenSinhVien;  
}

function openFormAdd() {
    document.getElementById("popupForm-add").style.display = "block";
    let name = document.getElementById('student-name-add');
    let address = document.getElementById('student-address-add');
    let birh = document.getElementById('student-birh-add');

    document.getElementsByClassName('add-student')[0].addEventListener('click', function(e) {
        
        if(name.value.trim().length <= 0) {
            name.style.borderColor = 'red';
            e.preventDefault();
        } else {
            name.style.borderColor = '#aba7a7';
        }
        if(address.value.trim().length <= 0) {
            address.style.borderColor = 'red';
            e.preventDefault();
        }else {
            address.style.borderColor = '#aba7a7';
        }

        if(birh.value.trim().length <= 0) {
            birh.style.borderColor = 'red';
            e.preventDefault();
        }else {
            birh.style.borderColor = '#aba7a7';
        }

    })
}


// ==================================================================================