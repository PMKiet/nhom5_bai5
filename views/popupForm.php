<div id="popupForm" style="display:none; position:fixed; top:25%; left:35%; background:white; padding:20px; border:1px solid #000; z-index:999;">
    <form>
        <h3>Form Student</h3>
        <input type="text" placeholder="Nhập tên...">
        <br><br>
        <button type="button" onclick="document.getElementById('popupForm').style.display='none'">Đóng</button>
    </form>
</div>

<script>
    function closePopup() {
        document.getElementById("popupForm").style.display = "none";
    }
</script>