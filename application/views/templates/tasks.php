<?php   if($tasks == "No Result"){ ?>
                <div class="col-lg-12">
                    <p>No Tasks Available</p>
                </div>
<?php   }
        else{
            // DATE("F j, Y", STRTOTIME($ta["created_at"]))
            foreach($tasks as $task){ ?>
<?php       if($task["status"] == "done"){ ?>
                <li class="row list-group-item bg-secondary text-light">
<?php       }
            else{ ?>
                <li class="row list-group-item text-success">
<?php       } ?>
                    <form id="form<?= $task["id"] ?>" action="<?= base_url() ?>update/<?= $task["id"] ?>" method="POST" class="row row-cols-lg-auto g-2 align-items-center">
                        <div class="col-12">
                            <a class="btn btn-sm btn-warning task_edit" id="<?= $task["id"] ?>">Edit</a>
                        </div>

                        <div class="col-12" id="checkbox<?= $task["id"] ?>">
                            <div class="form-check" id="checkbox<?= $task["id"] ?>">
<?php                       if($task["status"] == "done") { ?>
                                <input class="form-check-input" type="checkbox" id="<?= $task["id"] ?>" checked disabled>
<?php                       }
                            else{ ?>
                                <input class="form-check-input" type="checkbox" id="<?= $task["id"] ?>">
<?php                       }?>                            
                                <label class="form-check-label" for="<?= $task["id"] ?>"><?= $task["title"] ?></label>
                            </div>
                        </div>
                        <div class="col-12" id="input<?= $task["id"] ?>" style="display: none;">
                            <input type="text" name="edit_task" class="form-control" value="<?= $task["title"] ?>">
                        </div>
                    </form>
                </li>
<?php       } 
        }?>