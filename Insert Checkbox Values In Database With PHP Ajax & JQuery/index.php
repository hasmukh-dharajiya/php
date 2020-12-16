<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP & Ajax</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div id="main">
    <div id="header">
        <h1>Insert Checkbox values in Database<br>using PHP & Ajax</h1>
    </div>
    <div id="content">
        <form id="student-form">
        <table>
          <tr>
            <td><label>Name</label></td>
            <td><input type="text" id="first-name" autocomplete="off"></td>
          </tr>
          <tr>
            <td valign="top"><label>Languages</label></td>
            <td>
              <input type="checkbox" class="lang" value="PHP" />PHP <br />  
              <input type="checkbox" class="lang" value="Python" />Python <br />
              <input type="checkbox" class="lang" value="C++" />C++ <br />
              <input type="checkbox" class="lang" value="Java" />Java <br />
              <input type="checkbox" class="lang" value="C#" />C# <br />
              <input type="checkbox" class="lang" value="Ruby" />Ruby <br />
              <input type="checkbox" class="lang" value="JavaScript" />JavaScript <br />
              <input type="checkbox" class="lang" value="Swift" />Swift <br />

            </td>
          </tr>
          <tr>
            <td></td>
            <td><button id="submit">Submit</button></td>
          </tr>
        </table>
    </div>
  </div>
    
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#student-form').submit(function(e){
      e.preventDefault();

      var fname = $('#first-name').val();
      var languages = [];

      $(".lang").each(function(){
        if($(this).is(":checked")){
          languages.push($(this).val());
        }
      });

      languages = languages.toString();

      if(fname != '' && languages.length !== 0){
        $.ajax({
          url : "insert-data.php",
          method : "POST",
          data : {name : fname, languages: languages},
          success : function(data){
            $('#student-form').trigger('reset');
            alert(data);
          }
        });
      }else{
        alert("Please fill the required form fields.");
      }
    });
  });
</script>
</body>

</html>
