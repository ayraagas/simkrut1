var choices = ["Algoritma dan Pemrograman 1", "Pr. Algoritma & Pemrograman 1","Sistem Operasi"];

function addInput(divName) {
    var newDiv = document.createElement('div');
    var newDiv1 = document.createElement('div');
    var selectHTML = "";
    var selectHTML1="";
    selectHTML="<select class='form-control'>";
    for(i = 0; i < choices.length; i = i + 1) {
        selectHTML += "<option value='" + choices[i] + "'>" + choices[i] + "</option>";
    }
    selectHTML += "</select><br>";
    selectHTML1="<input type='text' class='form-control' placeholder='Masukkan nilai contoh: A-'><br>";
    newDiv.innerHTML = selectHTML;
    newDiv1.innerHTML = selectHTML1;
    document.getElementById('divName').appendChild(newDiv);
    document.getElementById('divName').appendChild(newDiv1);
}