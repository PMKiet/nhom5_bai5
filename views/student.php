<div>
    <div class="student-header">
        <div class="student-top">
            <button class="btn">Thêm sinh viên</button>
        </div>
        <div class="studen-search inp">
            <img src="../public/assets/img/Vector.png" alt="">
            <input type="text" placeholder="Tìm sinh viên bằng tên.">
            <button class="btn search-student">Tìm</button>
        </div>
    </div>

    <section class="student-content">
        <table cellpacing='0'>
            <thead>
                <tr>
                    <th>Mã sinh viên</th>
                    <th>Tên sinh viên</th>
                    <th>Lớp</th>
                    <th>Địa chỉ</th>
                    <th>Giới tính</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>SV250001</th>
                    <th>Tên sinh viên 1</th>
                    <th>Tên lớp 1</th>
                    <th>Chợ mới, An Giang</th>
                    <th>Nam</th>
                    <th>
                        <span class="th-icon th-icon-view" onclick="openPopup()">Xem</span>
                        <span class=" th-icon th-icon-edit">Sửa</span>
                        <span class="th-icon th-icon-delete">Xóa</span>
                    </th>
                </tr>
                <tr>
                    <th>SV250001</th>
                    <th>Tên sinh viên 1</th>
                    <th>Tên lớp 1</th>
                    <th>Chợ mới, An Giang</th>
                    <th>Nam</th>
                    <th>
                        <span class="th-icon th-icon-view">Xem</span>
                        <span class="th-icon th-icon-edit">Sửa</span>
                        <span class="th-icon th-icon-delete">Xóa</span>
                    </th>
                </tr>
                <tr>
                    <th>SV250001</th>
                    <th>Tên sinh viên 1</th>
                    <th>Tên lớp 1</th>
                    <th>Chợ mới, An Giang</th>
                    <th>Nam</th>
                    <th>
                        <span class="th-icon th-icon-view">Xem</span>
                        <span class="th-icon th-icon-edit">Sửa</span>
                        <span class="th-icon th-icon-delete">Xóa</span>
                    </th>
                </tr>
            </tbody>
        </table>
    </section>
</div>

<div id="popupContainer"></div>

<script>
    function openPopup() {
        fetch("popupForm.php")
            .then(res => res.text())
            .then(html => {
                document.getElementById("popupContainer").innerHTML = html;
                document.getElementById("popupForm").style.display = "block";
            });
    }
</script>