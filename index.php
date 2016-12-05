<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Welcome to Cinema</title>


</head>
<body>
<?php
include("admin/functions.php");
$conn=connect();
$query="SELECT * FROM films";
$res=mysqli_query($conn,$query);
if(mysqli_num_rows($res)){
    $result=mysqli_fetch_all($res,MYSQLI_ASSOC);
?>
<form action="form.php" method = "post">
    <select class="opt" name="cin">

            <?php foreach ($result as $row){?>
                <option class="option_clic" data-price="<?= $row['price']?>"  value="<?php echo $row['id']?>" ><?php echo $row['title']?></option>
        <?php  }
        }
        ?>

    </select>
    <span class="price">
    </span>
    <br>
    Count<input type="number" name="count">
    <input type="submit" >
</form>

</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('.opt').change(function(){
            var id=$(this).val();
            $('.price').text($( ".opt option:selected" ).attr('data-price'))
        })
    })

</script>