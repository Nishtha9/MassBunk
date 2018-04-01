<?php
include 'header.php';
include 'includes/common.php';

        $r="SELECT yes,no,sno,deadline from polls;";
        $r_s= mysqli_query($con, $r)or die(mysqli_error($con));
        $x=0;
       while ( $row= mysqli_fetch_array($r_s)){
        $yes=$row[0];
        $no=$row[1];
        $sno=$row[2];
        $Deadline=$row[3];
        
        ?>
        <script>
        var d=new Date();
    var t=d.toString().split(" ");
    var tm=[t];
    var time=t[4];
    document.cookie="time = "+time;
    const Resp;
    </script>
    <?php
        $time=$_COOKIE['time'];
        $y='Yes';
        $n='No';
        $x++;
        ?>

<div>
    <div class="col-xs-3 col-lg-offset-1">
        
        
        <a data-toggle="modal"  data-target="#Response"><button class="btn btn-primary btn-lg">Vote</button></a>
        <?php 
            if ($time>=$Deadline)
            {
               echo"<a href='CalcRes.php?id=$sno'><button class='btn btn-primary btn-lg'>Stop</button></a>"; 
            }
            else
                 echo"<a href='CalcRes.php?id=$sno'><button class='btn btn-primary btn-lg' disabled>Stop</button></a>"; ?>
        <div id="Response" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" style="float:right;">&times;</button>
                        <h4> Vote for GG </h4>
                    </div>
                    <div class="modal-body">
                        <br>
                        <?php echo "<form method='post' action='ResponseCheck.php'>"; ?>
                        <div class="form-group">
                            <input type="number" name="roll" class="form-control" placeholder="Roll No" required>
                            <input type="number" name="sno" value="<?php echo $sno; ?>" style="display:none">
                        </div>
                        <button type='submit' value="Yes" name="Resp" class="btn btn-lg"><a style='font-size: 40px;'>
                        <span class='glyphicon glyphicon-thumbs-up'></span></a> </button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <button type='submit' value="No" name="Resp" class="btn btn-lg"><a style='font-size: 40px;'>
                    <span class="glyphicon glyphicon-thumbs-down"></span></a></button>
                        </form>
                    </div>
                </div>
                    </div>
            </div>
            </div>
    <div class="col-xs-9">
      


<div class="container" style="width:500px;height:500px">
    <canvas id="myChart<?php echo $x;?>" ></canvas></div>
<script>
var ctx = document.getElementById("myChart<?php echo $x;?>").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["yes","no"],
        datasets: [{
            label: 'Polling Result',
            data: [<?php echo $yes; ?>,<?php echo $no; ?>],
            backgroundColor: [
                'green','red'
            ],
            borderColor: [
               'green','red'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
            </script>
    </div>
</div>
       <?php } ?>