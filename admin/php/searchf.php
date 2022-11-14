<?php
    session_start();
    include_once "config.php";

 
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM freelancer WHERE fid LIKE '{$searchTerm}'";
    $result = $mysqli->query($sql);
    $output = "";
    
    if(mysqli_num_rows($result) > 0){
        ?>
        
        <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Fid</th>
                                                <th>Name</th>
                                                <th>E-mail</th>
                                                <th>Language</th>
                                                <th>CV</th>
                                                <th>ID Proof</th>
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
                                                <td><?=$row['fid']?></td>
                                                <td><?=$row['name']?></td>
                                                <td><?=$row['email']?></td>
                                                <td><?=$row['lang']?></td>
                                                <td><a href="<?=$row['cv']?>" class="btn-link">Resume</a></td>
                                                <td><a href="<?=$row['id_proof']?>" class="btn-link">ID Proof</a></td>
                                                <td><?=$row['date']?></td>
                                                <td class="text-nowrap">
                                                    <a href="inc/delete.php?cid=<?=$row['fid']?>" class="btn btn-outline-danger"><i class="fa fa-close text-danger"></i> Remove</a>
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
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>