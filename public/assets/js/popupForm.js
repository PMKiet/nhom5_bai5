function closePopup() {
    document.getElementById("popupForm-view").style.display = "none";
}

function openForm(maSinhVien, tenSinhVien, maLop, diaChi) {
    document.getElementById("popupForm-view").style.display = "block";

    //chèn dữ liệu
    document.getElementById("student-id").textContent = maSinhVien;
    document.getElementById("student-name").textContent = tenSinhVien;
    document.getElementById("student-class-id").textContent = maLop;
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

function updateStudent() {
    let id = document.getElementById("student-id-edit").value; 
    let username = document.getElementById("student-name-edit").value; 
    let address = document.getElementById("student-address-edit").value;
    
    

    // fetch("updateStudent.php", {
    //     method: "POST",
    //     headers: { "Content-Type": "application/x-www-form-urlencoded" },
    //     body: `id=${id}&name=${name}&class=${className}&address=${address}`
    // })
    // .then(res => res.text())
    // .then(msg => {
    //     alert(msg);
    //     location.reload(); // nếu bạn muốn tự reload sau update
    // });
}