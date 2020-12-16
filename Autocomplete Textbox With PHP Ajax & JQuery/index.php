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
        <h1>Autocomplete Textbox with PHP & Ajax</h1>
      </td>
    </tr>
    <tr>
      <td id="table-form">
        <form id="search-form">
     
          <div id="autocomplete">
            <input type="text" id="city-box" placeholder="Enter City" autocomplete="off">
            <div id="cityList"></div>
          </div>
          <input type="submit" id="search-btn">
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

    // Autocomplete Textbox
    $("#city-box").keyup(function(){
      var city = $(this).val();

      if(city != ''){
         $.ajax({
            url: "load-city.php",
            method: "POST",
            data: { city: city},
            success: function(data){
              console.log(data);
              $("#cityList").fadeIn("fast").html(data);
            }
         }); 
      }else{
        $("#cityList").fadeOut();
        $("#table-data").html("");
      }
    });

    // Autocomplete List Click Code
    $(document).on('click','#cityList li',function(){
      $('#city-box').val($(this).text());
      $("#cityList").fadeOut();
    });

    // Search Button Code
    $("#search-btn").on('click', function(e){
      e.preventDefault();

      var city = $('#city-box').val();

      if(city == ""){
        alert("Please enter the city Name.");
        $("#table-data").html("");
      }else{
        $.ajax({
            url: "load-table.php",
            method: "POST",
            data: { city: city},
            success: function(data){
              $("#table-data").html(data);
            }
         }); 
      }
    })
  });
</script>
</body>

</html>
