var choices = ["Algoritma dan Pemrograman 1", "Pr. Algoritma & Pemrograman 1","Sistem Operasi"];
var grades =['A','A-','A/B','B+','B'];

function addInput(divName) {
    var newDiv = document.createElement('div');
    var newDiv1 = document.createElement('div');
    var selectHTML = "";
    var selectHTML1="";
    // selectHTML="<select class='form-control' name='matakuliah '>";
    // for(i = 0; i < choices.length; i = i + 1) {
    //     selectHTML += "<option value='" + choices[i] + "'>" + choices[i] + "</option>";
    // }
    // selectHTML += "</select><br>";
    
    selectHTML1="<select class='form-control' name='nilai'>";
    for(i = 0; i < grades.length; i = i + 1) {
        j=5;
        selectHTML1 += "<option value='" + (i+j) + "'>" + grades[i] + "</option>";
        j= j-1;
    }
    selectHTML1 += "</select><br>";
    newDiv.innerHTML = selectHTML;
    newDiv1.innerHTML = selectHTML1;
    document.getElementById('divName').appendChild(newDiv);
    document.getElementById('divName').appendChild(newDiv1);
}