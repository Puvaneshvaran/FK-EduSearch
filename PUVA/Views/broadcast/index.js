function setUpdateAction() {
    document.frmUser.action = "edit.php";
    document.frmUser.submit();
}
function setDeleteAction() {
    if(confirm("Are you sure want to delete these rows?")) {
        document.frmUser.action = "delete.php";
        document.frmUser.submit();
    }
}