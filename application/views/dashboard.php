<?php include("inc/header.php");?>
	<div class="container">
    <h1>Admin Dashboard</h1>
    <?php  $username = $this->session->userdata('username');?>
    
    <h2>Welcome <?php echo $username;?></h2>
    <?php echo anchor("Admin/addCollege", "ADD COLLEGE", ['class'=>'btn btn-primary']);?>
    <?php echo anchor("admin/addCoadmin", "ADD COADMIN", ['class'=>'btn btn-primary']);?>
    <?php echo anchor("admin/addStudent", "ADD STUDENT", ['class'=>'btn btn-primary']);?>
    <hr>
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">College Name</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Branch</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($users)):?> 
                    <?php foreach($users as $user):?>
                <tr class="table-active">
                    <td><?php echo $user->college_id;?></td>
                    <td><?php echo $user->collegename;?></td>
                    <td><?php echo $user->username;?></td>
                    <td><?php echo $user->email;?></td>
                    <td><?php echo $user->rolename;?></td>
                    <td><?php echo $user->gender;?></td>
                    <td><?php echo $user->branch;?></td>
                    <td>
                    <?php echo anchor("Admin/viewStudents/{$user->college_id}", "View Students", ['class'=>'buttons']);?>
                    </td>
                    </tr>
                    <?php endforeach;?>
                    <?php else:?>
                        <tr>
                            <td>
                                No Record Found!
                            </td>
                    </tr>
                    <?php endif;?>
                
            </tbody>
        </table>
    </div>
</div>
<?php include("inc/footer.php");?>