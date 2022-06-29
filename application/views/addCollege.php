<?php include("inc/header.php");?>
	<div class="container">
            <?php echo form_open("Admin/createCollege", ['class' => 'form-horizontal']);?>
            <?php if($msg = $this->session->flashdata('message')):?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="alert alert-dismissible alert-success">
                            <?php echo $msg;?>
                            
                        </div>
                    </div>
                </div>

                <?php endif;?>
        <h1>Add College</h1>
        <hr>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-3 control-label">College Name</label>
                    <div class="col-md-9">
                        <?php echo form_input(['name' => 'collegename', 'class'=>'form-control', 'placeholder'=>'College Name', 'value'=>set_value('collegename')]);?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            <?php echo form_error('collegename', '<div class="text-danger">','</div>');?>
                
            </div>
        </div>
        
        

        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="col-md-3 control-label">Branch</label>
                    <div class="col-md-9">
                        <?php echo form_input(['name' => 'branch', 'class'=>'form-control', 'placeholder'=>'Branch']);?>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
            <?php echo form_error('branch', '<div class="text-danger">', '</div>');?>
                
            </div>
        </div>

        
        
                
        <button type="submit" class="btn btn-primary">Add</button>
        <?php echo anchor("admin/dashboard", "Back", ['class'=>'btn btn-primary']);?>
    </div>
        <?php echo form_close();?>
    </div>
<?php include("inc/footer.php");?>