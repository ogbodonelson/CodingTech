$(document).ready(function () {
    $('#submit1').submit(function (e) { 
        e.preventDefault();
        console.log('you just clicked me right now');

        var formData = $(this).serialize();

        swal({
            title: "Are you sure to Submit ?",
            text: "Please cross check once again before you proceed",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
            .then((willDelete) => {
              if (willDelete) {
                $.ajax({
                  method: "POST",
                  url: 'full.php',
                  data: formData,
                  // dataType: "dataType",
                  success: function (response) {
                    console.log('I have submitted main blog');
                    console.log(response);
                    if (response) {
                      swal("Success", "Blog Successfully added to draft", "success");
                      // setTimeout(location.reload(), 20000);
                    //   setTimeout(function () {
                    //     window.location.reload();
                    //   }, 1000);
                    } else {
                      swal("Error", "Something Went Wrong!", "warning");
                    }
                  }
                });
              } else {
                swal("Not Saved");
              }
            });
    });

    $('#Setmetaimage').submit(function (e) { 
        e.preventDefault();
        console.log('you just clicked me');

        var filename = $('#filename').val();
        var fileData = $('#Metaimage').prop('files')[0];
        var formData = new FormData();
        formData.append('file', fileData);
        formData.append('fname', filename);

        swal({
            title: "Are you sure to Submit ?",
            text: "Please cross check once again before you proceed",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
            .then((Setmetaimage) => {
              if (Setmetaimage) {
                $.ajax({
                  method: "POST",
                  url: 'full.php',
                  data: formData,
                  dataType: "script",
                  contentType: false, //must, tell jQuery not to process the data
                  processData: false,
                  success: function (response) {
                    console.log('I have set metaimage');
                    // console.log(response);
                    if (response) {
                      swal("Success", "Blog Successfully added to draft", "success");
                      // setTimeout(location.reload(), 20000);
                    //   setTimeout(function () {
                    //     window.location.reload();
                    //   }, 1000);
                    } else {
                      swal("Error", "Something Went Wrong!", "warning");
                    }
                  }
                });
              } else {
                swal("Not Saved");
              }
            });
    });

    // $('#Setmetaimage').click(function (e) { 
    //   e.preventDefault();

    //   var form = new FormData(document.getElementById('Metaimage'));
    //   //append files
    //   var file = document.getElementById('Metaimage').files[0];
    //   if (file) {   
    //       form.append('upload-image', file);
    //   }
    //   $.ajax({
    //     type: "POST",
    //     url: "full.php",
    //     data: form,             
    //     cache: false,
    //     contentType: false, //must, tell jQuery not to process the data
    //     processData: false,
    //     //data: $("#upload_img").serialize(),
    //     success: function(data)
    //     {
    //         console.log('I am doing well and fine');
    //     }
    // });

    // });


    // jQuery.noConflict();    
    // formdata = new FormData();
    // $('#Setmetaimage').submit(function (e) { 
    //   e.preventDefault();
    //   jQuery("#Metaimage").on("change", function() {
    //     var file = this.files[0];
    //     if (formdata) {
    //         formdata.append("image", file);
    //         formdata.append("Ready", 'Yes');
    //         jQuery.ajax({
    //             url: "full.php",
    //             type: "POST",
    //             data: formdata,
    //             processData: false,
    //             contentType: false,
    //             success:function(response){
    //               console.log(response);
    //             }
    //         });
    //     }                       
    // }); 
      
    // });     
    

    // for setting the meta description
    $('#Setmetadescription').submit(function (e) { 
        e.preventDefault();
        console.log('you just clicked me');

        var formData = $(this).serialize();

        swal({
            title: "Are you sure about this ?",
            text: "Please cross check once again before you proceed",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
            .then((willDelete) => {
              if (willDelete) {
                $.ajax({
                  method: "POST",
                  url: 'full.php',
                  data: formData,
                  // dataType: "dataType",
                  success: function (response) {
                    // console.log(response);
                    if (response) {
                      swal("Success", "Blog Successfully added to draft", "success");
                      // setTimeout(location.reload(), 20000);
                    //   setTimeout(function () {
                    //     window.location.reload();
                    //   }, 1000);
                    } else {
                      swal("Error", "Something Went Wrong!", "warning");
                    }
                  }
                });
              } else {
                swal("Not Saved");
              }
            });
    });

    // for updating main blog content in editblog.php
    // $('#Mainblogcontent').submit(function (e) { 
    //     e.preventDefault();
    //     console.log('Thank you for clicking me');

    //     // value from the submit button
    //     var Submitvalue = $(".Submit").val();
    //     var Categoryvalue = $("#Category").val();
    //     var Contentvalue = $("#edit").val();
    //     // var formData = $(this).serialize();
    //     var Submitvalueid = Submitvalue.match(/\d+/g);
    //     var Submitvalueltr =  Submitvalue.match(/[a-zA-Z]+/g);
    //     console.log(Categoryvalue);
    //     console.log(Contentvalue);

    //     swal({
    //         title: "Are you sure to Submit ?",
    //         text: "Please cross check once again before you proceed",
    //         icon: "warning",
    //         buttons: true,
    //         dangerMode: true,
    //       })
    //         .then((willupdatemainblog) => {
    //           if (willupdatemainblog) {
    //             $.ajax({
    //               method: "POST",
    //               url: `editblog.php?table=${Submitvalueltr}&id=${Submitvalueid}`,
    //               data: {
    //                 'a' : Categoryvalue,
    //                 'b' : Contentvalue,
    //                 Mainblogcontent : 'fox'
    //               },
    //               // dataType: "json",
    //               // encode: true,

    //               success: function (response) {
    //                 console.log(response);
    //                 console.log('I am the best');
    //                 console.log(Submitvalueltr + ' is ' + Submitvalueid);
    //                 if (response) {
    //                   swal("Success", "Blog Successfully added to draft", "success");
    //                   // setTimeout(location.reload(), 20000);
    //                 //   setTimeout(function () {
    //                 //     window.location.reload();
    //                 //   }, 1000);
    //                 } else {
    //                   swal("Error", "Something Went Wrong!", "warning");
    //                 }
    //               }
    //             });
    //           } else {
    //             swal("Not Saved");
    //           }
    //         });
    // });


});