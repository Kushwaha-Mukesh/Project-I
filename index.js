        // Ajax call for signup form
        // once the form is submitted

$("#signupform").submit(function(event){
    // prevent defult php processing
     event.preventDefault();

     // collect user inputs
     var datatopost = $(this).serializeArray();
     console.log(datatopost);

    //  send the data to signup.php using ajax
    $.ajax({
        url: "signup.php",
        type: "POST",
        data: datatopost,
        success: function(data){
           if(data){
               $("#signupmessage").html(data);
           }
        },
        error: function(){
            $("#signupmessage").html("<div class='alert alert-danger'>There is error during ajax call. Please try again later!</div>"); 
        }
    }); 
  });

  // Ajax call form the login form
  // once the form is submitted
  $("#loginform").submit(function(event){
    // prevent defult php processing
     event.preventDefault();

     // collect user inputs
     var datatopost = $(this).serializeArray();
     console.log(datatopost);

    //  send the data to login.php using ajax
    $.ajax({
        url: "login.php",
        type: "POST",
        data: datatopost,
        success: function(data){
           if(data == "success"){
               window.location = "mainpage.php";
           }else{
               $('#loginmessage').html(data);
           }
        },
        error: function(){
            $("#loginmessage").html("<div class='alert alert-danger'>There is error during ajax call. Please try again later!</div>"); 
        }
    }); 
  });