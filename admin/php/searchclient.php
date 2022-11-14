<?php
    session_start();
    include_once "config.php";

 
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM client WHERE cid LIKE '{$searchTerm}'";
    $result = $mysqli->query($sql);
    $output = "";
    
    if(mysqli_num_rows($result) > 0){
        ?>
        
        <table class="table table-striped">
        <thead>
                                            <tr>
                                                <th>cid</th>
                                                <th>Name</th>
                                                <th>Email</th>
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
                                                <td><?=$row['cid']?></td>
                                                <td><?=$row['name']?></td>
                                                <td><?=$row['email']?></td>
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
        $output .= 'No user found related to your search term';
    }
    echo $output;
?>