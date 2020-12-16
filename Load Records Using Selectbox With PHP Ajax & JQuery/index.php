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
  <table id="main" border="0" cellspacing="0">
    <tr>
      <td id="header">
        <h1>Load Records using Select Box <br>
        with PHP & Ajax</h1>
      </td>
    </tr>
    <tr>
      <td id="table-form">
        <form>
          Select City : <select id="city-box">
                          <option value="">Select City</option>
                        </select>
        </form>
      </td>
    </tr>
    <tr>
      <td id="table-data"></td>
    </tr>
  </table>
    
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $.ajax({
      url : "load-city.php",
      type : "POST",
      dataType : "JSON",
      success : function(data){
        $.each(data, function(key, value){
          $("#city-box").append("<option value='" + value.city + "'>" + value.city + "</option>");
        });
      }
    });

    // Load Table Data
    $("#city-box").change(function(){
      var city = $(this).val();

      if(city == ""){
        $("#table-data").html("");
      }else{
        $.ajax({
          url : "load-table.php",
          type : "POST",
          data : { city : city },
          success : function(data){
            $("#table-data").html(data);
          }
        });
      }
    })
  });
</script>
</body>

</html>
