
<!DOCTYPE html>
<html>
<head>
    <title>Repo live search</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        input{
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container" style="max-width: 50%;">
        <div class="text-center mt-5 mb-4">
            <h2>Repository search</h2>
        </div>
        <form id="searchForm" method="post">
            <input type="text" name="created_date" class="form-control" id="created"  value="2020-01-01" placeholder="search by created date" >
            <input type="text" name="language" class="form-control" id="language" value="PHP" placeholder="search by language" >
            <input type="text" name="per_page" class="form-control" id="per_page" value="100" placeholder="items per_page " >
            <input type="text" name="sort" class="form-control" id="sort" value="stars" placeholder="sort by" >

            <input class="btn btn-primary" type="submit" value="Submit">
        </form> 
       
    </div>
        <div id="searchResult"> 
        </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
 
        <script type="text/javascript">
          
            $(document).ready(function() {
                $('#searchForm').submit(function(e) {
                    console.log($('#created').val());
                    e.preventDefault();
                    $.ajax({
                         type: "POST",
                         url: 'filterController.php',
                        data: $(this).serialize(),
                        success: function(response)
                        {
                            $("#searchResult").html(response)
                    }
                });
                });
            });
        </script>

    
</body>

</html>
