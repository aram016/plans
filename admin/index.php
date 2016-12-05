<?php

    include("functions.php");
    $conn=connect();
    $query="select * from films";
    $res=mysqli_query($conn, $query);
    echo "<table id='tab' cellspacing='0px' border='1px'>";
    echo	"<tr cellspacing='10px'>";
    echo		"<th>Film Name <input type='button' value='achm' class='kam_n'></th>";
    echo		"<th>Film Price <input type='button' value='achm' class='kam_p'></th>";
    echo		"<th>delete</th>";
    echo		"<th>update</th>";
    echo    "</tr>";
    while($row=mysqli_fetch_assoc($res)){
        echo "<tr id=".$row['id'].">";
        echo 	"<td class='t_n' contenteditable>".$row['title']."</td>";
        echo 	"<td class='t_p' contenteditable>".$row['price']."</td>";
        echo 	"<td><input type='button' class='delete' value='delete'></td>";
        echo 	"<td><input type='button' class='update' value='update'></td>";
        echo "</tr>";
    }

    echo "</table>";
    echo   "<input type='text' class='input1' >";
    echo   "<input type='number' class='input2' >";
    echo   "<button class='ins'>add</button><br>";


?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        var k=1;
        var l=1;
        var m=1;
        $('.kam_n').click(function(){
            k++;
            var a=[];
            for(var i=0; i<$(".t_n").length;i++){
                a.push($(".t_n").eq(i).html().toLowerCase());
            }
            a.sort();
            if(k%2==0){
                $('.kam_n').val('nvaz');
                for(var i=0; i<a.length; i++){
                    for(var j=0; j<$(".t_n").length; j++){
                        if(a[i]==$(".t_n").eq(j).html().toLowerCase()){
                            var tr=$(".t_n").eq(j).parents('tr').detach()
                            tr.appendTo($('#tab'));
                        }
                    }
                }
            }
            else{
                $('.kam_n').val('achm');
                for(var i=a.length-1; i>=0; i--){
                    for(var j=0; j<$(".t_n").length; j++){
                        if(a[i]==$(".t_n").eq(j).html().toLowerCase()){
                            var tr=$(".t_n").eq(j).parents('tr').detach()
                            tr.appendTo($('#tab'));
                        }
                    }
                }
            }


        })


        $('.kam_p').click(function(){
            m++;
            var a=[];
            for(var i=0; i<$(".t_p").length;i++){
                a.push(Number($(".t_p").eq(i).html()));
            }
            for(var i=0;i<a.length-1;i++){
                if(a[i]>a[i+1]){
                    var td=a[i+1];
                    a[i+1]=a[i];
                    a[i]=td;
                    i=-1;
                }
            }
            if(m%2==0){
                $('.kam_p').val('nvaz');
                for(var i=0; i<a.length; i++){
                    for(var j=0; j<$(".t_p").length; j++){
                        if(a[i]==$(".t_p").eq(j).html()){
                            var tr=$(".t_p").eq(j).parents('tr').detach()
                            tr.appendTo($('#tab'));
                        }
                    }
                }
            }
            else{
                $('.kam_p').val('achm');
                for(var i=a.length-1; i>=0; i--){
                    for(var j=0; j<$(".t_p").length; j++){
                        if(a[i]==$(".t_p").eq(j).html()){
                            var tr=$(".t_p").eq(j).parents('tr').detach()
                            tr.appendTo($('#tab'));
                        }
                    }
                }
            }

        })


        $('.ins').click(function(){
            var text=$('.input1').val();
            var text1=$('.input2').val();;
            $.ajax({
                type:'post',
                url:'form.php',
                data:{text:text,text1:text1,action:'ins'},
                success:function(data){
                    location.reload();
                }
            })
        })
        $('.delete').click(function(){
            var id=$(this).parent().parent().attr('id');
            var jnji=$(this).parent().parent();

            $.ajax({
                type:'post',
                url:'form.php',
                data:{id:id,action:'delate'},
                success:function(data){
                    location.reload();
                }
            })
        })
        $('.update').click(function(){
            var id=$(this).parent().parent().attr('id');
            var text=$(this).parent().parent().find('td:eq(0)').text();
            var text1=$(this).parent().parent().find('td:eq(1)').text();
            $.ajax({
                type:'post',
                url:'form.php',
                data:{id:id, text:text,text1:text1,action:'update'},
                success:function(data){
                    location.reload();

                }
            })
        })

    })
</script>