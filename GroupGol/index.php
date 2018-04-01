<html>
    
          <head>
                <title> group_gol!</title>
                 <meta charset="UTF-8">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css" type="text/css">
        <script type="text/javascript" src="bootstrap-3.3.7-dist/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
        
         <style>
           
            #hi::after {
  content: "";
  background: url(bk8.jpg);
  opacity: 0.5;
  top: 0;
  left: 0;
  bottom: 0;
  right: 0;
  position: absolute;
background-size:cover;
  z-index: -1;   
}


             h1{
                
                 color:black;
                 text-align: center;
                 font-size:95px;
                     text-transform:capitalize;
             }
             div{
                 align-content: center;
             }
         </style>
               </head>
               <body>
                   <div id="hi">
                   <h1> <img src="imozi1.png">group gol!</h1>
                   <br><br>
        <div class="container">
            <div class="row">
                <div class="col-xs-3"></div>
                <div class="col-xs-6">
                    <a  style="color:white" data-toggle="modal" data-target="#Create"><button class="btn btn-primary btn-lg">
                            <span class="glyphicon glyphicon-pencil"></span> Create Poll</button></a>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a style="color:white" href="ongoing-polls.php"><button class="btn btn-primary btn-lg">
                            <span class="glyphicon glyphicon-asterisk"></span> Ongoing Polls</button><a>                   

                    
                </div>
            <div class="col-xs-3"></div>
                </div>
                
            </div>
                   </div>
                   <div id="Create" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" style="float:right;">&times;</button>
                        <h4>  Create a new Poll </h4>
                    </div>
                    <div class="modal-body">
                        <!--    FORM FOR CREATING A POLL -->
        <form method="post" action="CreatePoll.php">
            <div class="form-group">
            <input type="number" class="form-control" name="Roll" placeholder="Roll No." required>
            </div>
            <div class="form-group">
            <input type="text" name="Duration" class="form-control" placeholder="Duration for GG
                   Format: Subject, Day, Date(MM/DD/YYYY)" required>
            </div>
            <div class="form-group">
            <input type="text" name="Reason" class="form-control" placeholder="Reason for GG" required>
            </div>
            <div class="form-group">
            <input type="time" name="Deadline" class="form-control" placeholder="When would you like to stop the poll?" required>
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary" >Submit</button>
            <button type="reset" class="btn btn-primary" >Reset</button>
            <div>
        </form>
                    </div>
                </div>
                    </div>
            </div>
            </div>
        </div>
    </body>
</html>


