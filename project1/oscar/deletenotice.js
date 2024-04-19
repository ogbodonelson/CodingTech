$(document).ready(function () {
  $('.publish').click(function (e) {
    e.preventDefault();

    var id = $(this).val();
    // alert(id);

    swal({
      title: "Are you sure ?",
      text: "Are you sure to publish this blog ?",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
      .then((willPublish) => {
        if (willPublish) {
          $.ajax({
            method: "POST",
            url: `publish.php?id=${id}`,
            data: {
              'id': id,
              'publish': true
            },
            // dataType: "dataType",
            success: function (response) {
              // swal("Success", "You clicked the button!", "success");
              console.log(response);
              if (response) {
                swal("Success", "Blog Published sucessfully", "success");
              } else {
                swal("Error", "Something Went Wrong!", "error");
              }
            }
          });
        } else {
          swal("Not Published ");
        }
      });
  });


  // deleting blog

  $('.delete').click(function (e) {
    e.preventDefault();

    var idd = $(this).val();
    // alert(id);
    const ma = idd.split("=");
    var id = ma[1]
    // console.log(ma[1]);

    swal({
      title: "Are you sure to delete ?",
      text: "once deleted, you will not be able to recover",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
      .then((willDelete) => {
        if (willDelete) {
          $.ajax({
            method: "POST",
            url: 'tables.php',
            data: {
              'id': id,
              'delete': true
            },
            // dataType: "dataType",
            success: function (response) {
              // console.log(response);
              if (response) {
                swal("Success", "Blog Deleted Successfully", "success");
                // setTimeout(location.reload(), 20000);
                setTimeout(function () {
                  window.location.reload();
                }, 1000);
              } else {
                swal("Error", "Something Went Wrong!", "warning");
              }
            }
          });
        } else {
          swal("Not Deleted");
        }
      });
  });



  // deleting blog

  $('#Blogdel').click(function (e) {
    e.preventDefault();
    // alert('WHY DO YOU DO THIS TO ME');
    // console.log('WHY DO YOU DO THIS TO ME');
    var idd = $(this).val();
    // alert(idd);
    const ma = idd.split("=");
    var id = ma[1]
    console.log(ma[1]);

    swal({
      title: "Are you sure to delete ?",
      text: "once deleted, you will not be able to recover",
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
      .then((remove) => {
        if (remove) {
          $.ajax({
            method: "POST",
            // url: 'editblog.php',
            url: `editblog.php?table=publish&id=${id}`,
            data: {
              'id': id,
              'Blogdelete': true
            },
            // dataType: "dataType",
            success: function (response) {
              console.log(response);
              if (response) {
                swal("Success", "Blog Deleted Successfully", "success");
                // $('.eachblog').load(location.href + ' .eachblog');
                // setTimeout(location.reload(), 20000);
                // setTimeout(function () {
                //   window.location.reload();
                // }, 1000);
              } else {
                swal("Error", "Something Went Wrong!", "warning");
              }
            }
          });
        } else {
          swal("Not Deleted");
        }
      });
  });



});