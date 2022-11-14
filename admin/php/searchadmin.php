<?php
    session_start();
    include_once "config.php";

 
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM post_prj WHERE pid LIKE '{$searchTerm}'";
    $result = $mysqli->query($sql);
    $output = "";
    
    if(mysqli_num_rows($result) > 0){
        ?>
        <table class="table table-striped">
        <thead>
                                            <tr>
                                                <th>PID</th>
                                                <th>Name</th>
                                                <th>Detail</th>
                                                <th>Language</th>
                                                <th><abbr title="Client ID">CID</abbr></th>
                                                <th><abbr title="Freelancer ID">FID</abbr></th>
                                                <th>Stutes</th>
                                                <th>Cost</th>
                                                <th>File</th>
                                                <th>Date</th>
                                                <th class="text-nowrap">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
if ($result->num_rows) {
    while ($row = $result->fetch_assoc()) {
        ?>
                                            <tr>
                                                <td><?=$row['pid']?></td>
                                                <td><?=$row['name']?></td>
                                                <td><?=substr($row['detail'], 0, 10)?></td>
                                                <td><?=$row['lang']?></td>
                                                <td><?=$row['cid']?></td>
                                                <td><?=$row['fid']?></td>
                                                <td><?=$row['status']?></td>
                                                <td><?=$row['cost']?></td>

                                                <td><?=(empty($row['file']) ? '-' : '<a href="../'.$row['file'].'" class="btn-link">File</a>')?></td>
                                                <td><?=$row['date']?></td>
                                                <td class="text-nowrap">
                                                    <a href="inc/delete.php?cid=<?=$row['cid']?>" class="btn btn-outline-danger"><i class="fa fa-close text-danger"></i> Remove</a>
                                                </td>
                                            </tr>
<?php
    }
}
?>
                                        </tbody>
                                    </table>
        
        
        <?php
    }else{
        $output .= 'No Project found related to your search term';
    }
    echo $output;
?>