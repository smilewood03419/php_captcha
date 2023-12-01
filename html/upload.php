<style>
    @import url('https://fonts.googleapis.com/css?family=Abel|Abril+Fatface|Alegreya|Arima+Madurai|Dancing+Script|Dosis|Merriweather|Oleo+Script|Overlock|PT+Serif|Pacifico|Playball|Playfair+Display|Share|Unica+One|Vibur');

    * {
        padding: 0;
        margin: 0;
        box-sizing: border-box;
    }
    body {
        background-image: linear-gradient(-225deg, #E3FDF5 0%, #FFE6FA 100%);
        background-image: linear-gradient(to top, #a8edea 0%, #fed6e3 100%);
        background-attachment: fixed;
        background-repeat: no-repeat;

        font-family: 'Vibur', cursive;
        font-family: 'Abel', sans-serif;
        opacity: .95;
    }
    form {
        width: 650px;
        min-height: 550px;
        height: auto;
        border-radius: 5px;
        margin: 2% auto;
        box-shadow: 0 9px 50px hsla(20, 67%, 75%, 0.31);
        padding: 2%;
        background-image: linear-gradient(-225deg, #E3FDF5 50%, #FFE6FA 50%);
    }
    form .con {
        display: -webkit-flex;
        display: block;
    
        -webkit-justify-content: space-around;
        justify-content: space-around;
    
        -webkit-flex-wrap: wrap;
        flex-wrap: wrap;
    
        margin: 0 auto;
    }
    header {
        margin: 2% auto 10% auto;
        text-align: center;
    }
    header h2 {
        font-size: 250%;
        font-family: 'Playfair Display', serif;
        color: #3e403f;
    }
    header p {letter-spacing: 0.05em;}
    .input-item {
        background: #fff;
        color: #333;
        padding: 14.5px 0px 15px 9px;
        border-radius: 5px 0px 0px 5px;
    }
    input[class="form-input"]{
        width: 400px;
        height: 50px;
        margin-left: 10px;
        margin-top: 3%;
        padding: 15px;
        
        font-size: 16px;
        font-family: 'Abel', sans-serif;
        color: #5E6472;
    
        outline: none;
        border: none;
    
        border-radius: 0px 5px 5px 0px;
        transition: 0.2s linear;
        
    }
    input[id="txt-input"] {width: 250px;}
    input:focus {
        transform: translateX(-2px);
        border-radius: 5px;
    }
    button {
        display: inline-block;
        color: #252537;
    
        width: 280px;
        height: 50px;
    
        padding: 0 20px;
        background: #fff;
        border-radius: 5px;
        
        outline: none;
        border: none;
    
        cursor: pointer;
        text-align: center;
        transition: all 0.2s linear;
        
        margin: 7% auto;
        letter-spacing: 0.05em;
    }
    .submits {
        width: 48%;
        display: inline-block;
        float: left;
        margin-left: 2%;
    }
    button:hover {
        transform: translatey(3px);
        box-shadow: none;
    }

    button:hover {
        animation: ani9 0.4s ease-in-out infinite alternate;
    }
    @keyframes ani9 {
        0% {
            transform: translateY(3px);
        }
        100% {
            transform: translateY(5px);
        }
    }
    
</style>

<?php
        $pdo = mysqli_connect("localhost", "root", "", "user");
         
        if (isset($_FILES['filename']) && $_FILES['filename']['error'] === UPLOAD_ERR_OK) {
            // Set the path of the uploaded file
            $path = "./" . basename($_FILES['filename']['name']);
          
            // Move the uploaded file to the current directory
            if (move_uploaded_file($_FILES['filename']['tmp_name'], $path)) {
          
              // Get the file contents
            //   $data = file_get_contents($path);
              $file = fopen($path, "r");
              // Run the query to insert the file contents into the database
              $sql = "INSERT INTO user_info (email) VALUES (?)";
              $stmt = $pdo->prepare($sql);
              $stmt->bind_param('s', $column);
              while (($line = fgets($file)) !== false) {
                // Get the value of the first column
                $column = trim($line);
          
                // Execute the query
                $stmt->execute();
              }
          
                  // Close the file
            fclose($file);

           
          
              echo "<h3>data stored in a database successfully."
              . " Please browse your localhost php my admin"
              . " to view the updated data</h3>";
            } else {
              echo "Error moving the uploaded file.";
            }
          } else {
            // echo "Error uploading the file.";
          }
          
          // Close the database connection
          $pdo = null;
?>

<div class="overlay">
<form enctype="multipart/form-data"  action="" method="post" >
   <div class="con">
   <header class="head-form">
      <h2>Valid User</h2>
      <p>Please upload txt file to get valid users</p>
   </header>
   <br>
   <div style="margin:0 auto; width:25%">
        <input name="filename" type="file" /><br />
        <input style="margin-top:50px" type="submit" value="upload file" />
   </div>
  </div>
</form>
</div>