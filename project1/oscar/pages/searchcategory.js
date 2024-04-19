$('#Searchcategories').submit(function (e) {
    e.preventDefault();
    console.log('you clicked me');
    
    // var formData = $(this).serialize();
    var formData = $('#Categoryy').val();
    // console.log($("#Categoryy").val());
    window.location.href = `tables.php?categoryy=${formData}`;
    
  });
