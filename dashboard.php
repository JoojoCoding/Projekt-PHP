<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<style>
  
    body{
      margin: 0px;
      background-color: #151515;
    }
    .dash{
      display: flex;
      flex-direction: row;
      justify-content: center;
      width: 100%;
      margin: 0px;
    }
    .panel{
      width: 20%;
    }
    .dep {
      width: 80%;
      height: 50%;
    }
    
    </style>
<body>
  <section class="dash">
    <div class="panel"> <?php include_once("incl/menuPanel.php"); ?> </div>
    <div class="dep"> <?php include_once("departments.php"); ?> </div>
  </section>
    
    
    
    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>
