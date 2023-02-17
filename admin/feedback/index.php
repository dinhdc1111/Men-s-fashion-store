<?php
    $title = 'Feedback Management';
    $baseUrl = '../';
    require_once('../layouts/headerAdmin.php'); 
    require_once('../layouts/navbarAdmin.php');

    $sql = "select * from feedback order by status asc, updated_at desc";
    $data = executeResult($sql);
?>
<div class="main-content">
    <div class="col-md-12 ">
            <table class="table table-bordered table-hover " style="margin-top: 20px;">
            <thead class="thead-dark">
                <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Phone Number</th>
                <th>Email</th>
                <th>Topic</th>
                <th>Content</th>
                <th>Date created</th>
                <th style="width: 50px"></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $index = 0;
                foreach($data as $item){
                    echo '<tr>
                    <th>'.(++$index).'</th>
                    <td>'.$item['firstname'].'</td>
                    <td>'.$item['lastname'].'</td>
                    <td>'.$item['phone_number'].'</td>
                    <td>'.$item['email'].'</td>
                    <td>'.$item['subject_name'].'</td>
                    <td>'.$item['note'].'</td>
                    <td>'.$item['updated_at'].'</td>
                    <td style="width: 100px">';
                        if($item['status'] == 0){
                        echo '<button onclick="markRead('.$item['id'].')" class="btn btn-danger">UNREAD</button>';
                        }else{
                            echo '<span class="badge bg-danger text-white">SEEN</span>';
                        }
                    echo '</td>
                    </tr>';
                }
                ?>
            </tbody>
            </table>
        </div>
    </div>
    <script type="text/javascript">
        function markRead(id){
            $.post('form_api.php',{
                'id' : id,
                'action' : 'mark'
            },function(data){
                location.reload()
            })
        }
    </script>
