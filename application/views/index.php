<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Village88 Training | Web Fundamentals | CSS | Bootstrap">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
        <style>
            .no-resize{
                resize: none;
            }
        </style>
        <title>Ajax | Tasks Lists</title>
    </head>
    <body class="d-flex flex-column h-100">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand text-success" href="<?= base_url(); ?>">Tasks List</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
            
        <div class="container mt-5">
            <div class="row">
                <div class="col-lg-6">
                    <h5 class="text-success mb-4">List of Tasks:</h5>
                    <ul id="tasks" class="list-group">

                    </ul>
                </div>
                <div class="col-lg-4 offset-1">
                    <h5 class="text-success mb-4">Create A New Task</h5>
                    <form action="create" method="POST" class="new_task">
                        <div class="mb-3">
                            <input type="text" name="task_title" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-success btn-sm">Add Task</button>
                    </form>
                </div>
            </div>
        </div>
        <footer class="container footer mt-auto text-success text-center mt-5">
            <p>© 2021 Village88 | All Rights Reserved</p>
        </footer>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                var clicked_twice = false;
                $.get("<?= base_url() ?>tasks/index_html", function(res){
                    $("#tasks").html(res);
                });

                $(".new_task").submit(function(){
                    $.post($(this).attr("action"), $(this).serialize(), function(res){
                        $("#tasks").html(res);
                    });

                    return false;
                })

                $(document).on("change", "input[type='checkbox']", function(){
                    var id = $(this).attr("id");

                    $.get("<?= base_url() ?>complete/"+id, function(res){
                        $("#tasks").html(res);
                    });
                });

                $(document).on("click", ".task_edit", function(){
                    var id = $(this).attr("id");

                    if(!clicked_twice){
                        $("#checkbox"+id).hide();
                        $("#input"+id).show();
                        clicked_twice = true;
                    }
                    else{
                        clicked_twice = false;
                        $.post($("#form"+id).attr("action"), $("#form"+id).serialize(), function(res){
                            $("#tasks").html(res);
                        });

                        return false;
                    }
                });
            });
        </script>
    </body>
</html>