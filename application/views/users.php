<?php include("inc/header.php");?>
	<div class="container">
    <h1>Co-Admin Dashboard</h1>
    <?php  $username = $this->session->userdata('username');?>
    
    <h2>Welcome <?php echo $username;?></h2>
    <hr>
    <div class="row">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Student Name</th>
                    <th scope="col">College Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Gender</th>
                    <th scope="col">Course</th>
                </tr>
            </thead>
            <tbody>
                <?php if(count($students)):?> 
                    <?php foreach($students as $student):?>
                <tr class="table-active">
                    <td><?php echo $student->id;?></td>
                    <td><?php echo $student->studentname;?></td>
                    <td><?php echo $student->collegename;?></td>
                    <td><?php echo $student->email;?></td>
                    <td><?php echo $student->gender;?></td>
                    <td><?php echo $student->course;?></td>
                    
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