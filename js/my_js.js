function deleteInsurance(id) {
    var confirmation = window.confirm("Are You Sure Delete this?")
    if(confirmation) {
        window.location = "index.php?menu=hm&delCom=1&id=" + id;
    }
}

function updateInsurance(id) {
    window.location="index.php?menu=hmr&id=" +id;
}

function deletePatient(med_record_number) {
    var confirmation = window.confirm("Are You Sure Delete this?")
    if(confirmation) {
        window.location = "index.php?menu=abr&delCom=1&id=" + med_record_number;
    }
}
function updatePatient(med_record_number) {
    window.location="index.php?menu=abr&id=" +med_record_number;
}