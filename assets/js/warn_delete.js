
(function(){

  $("#example2 .btn-delete").click(function(event){
    event.preventDefault();
    
    var btn = $(this);
    var target = btn.prop("href");

    sweetAlert({
      title: "DATA AKAN DIHAPUS!",
      text: "Apakah Anda yakin untuk menghapus?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Ya",
      cancelButtonText: "Tidak",
      closeOnConfirm: false,
      closeOnCancel: true
    }, function(isConfirm){
      if (isConfirm) {
        window.location.replace(target);
      }
    });
  });

  // $("#table-thn .btn-delete").click(function(event){
  //   event.preventDefault();
    
  //   var btn = $(this);
  //   var target = btn.prop("href");

  //   sweetAlert({
  //     title: "Are you sure?",
  //     text: "Apakah anda yakin ingin menghapus?",
  //     type: "warning",
  //     showCancelButton: true,
  //     confirmButtonColor: "#DD6B55",
  //     confirmButtonText: "Ya",
  //     cancelButtonText: "Tidak",
  //     closeOnConfirm: false,
  //     closeOnCancel: true
  //   }, function(isConfirm){
  //     if (isConfirm) {
  //       window.location.replace(target);
  //     }
  //   });
  // });
}
)();