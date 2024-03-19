<div class="tab-content">
                        <div id="scholars" class="container tab-pane active"><br>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Scholar Email</th>
                                        <th scope="col">Faculty Email</th>
                                        <th scope="col">Department</th>


                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    $get_designation = mysqli_query($conn, "SELECT * FROM applicants");
                                    while ($designation = mysqli_fetch_array($get_designation)) {


                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $designation['email'] ?></th>
                                            <th scope="row"><?php echo $designation['faculty_email'] ?></th>
                                            <th scope="row"><?php echo $designation['contact'] ?></th>



                                            <th scope="col"><a href="" class="btn btn-light text-success fw-bold" data-bs-toggle="modal" data-bs-target="#more<?php echo $std['id'] ?>">View more</a></th>
                                        </tr>
                                    <?php
                                    }

                                    ?>

                </ul>