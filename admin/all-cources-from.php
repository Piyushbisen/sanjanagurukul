<?php require_once('header.php'); ?>

<section class="content-header">
	<div class="content-header-left">
		<h1>View All Courses form Response</h1>
	</div>
	<div class="content-header-right">
		<a href="faq-add.php" class="btn btn-primary btn-sm">Add New</a>
	</div>
</section>


<section class="content">

  <div class="row">
    <div class="col-md-12">


      <div class="box box-info">
        
        <div class="box-body table-responsive">
          <table id="example1" class="table table-bordered table-striped">
			<thead>
			    <tr>
				<th width="50">SL</th>
			        <th width="50">Full Name</th>
			        <th width="50">email</th>
			        <th width="50">phone</th>
			        <th width="80">enroll In</th>
			    </tr>
			</thead>
            <tbody>
	            <?php
	            	$i=0;
	            	$statement = $pdo->prepare("SELECT * FROM tbl_register ");
	            	$statement->execute();
	            	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
	            	foreach ($result as $row) {
	            		$i++;
		            	?>
			            <tr>
			                <td><?php echo $i; ?></td>
			                <td><?php echo $row['full_name']; ?></td>
			                <td><?php echo $row['email']; ?></td>
			                <td><?php echo $row['phone']; ?></td>
							<td><?php echo $row['enroll']; ?></td>
			                <!-- <td>
			                    <a href="faq-edit.php?id=<?php echo $row['faq_id']; ?>" class="btn btn-primary btn-xs">Edit</a>
			                    <a href="#" class="btn btn-danger btn-xs" data-href="faq-delete.php?id=<?php echo $row['faq_id']; ?>" data-toggle="modal" data-target="#confirm-delete">Delete</a>  
			                </td> -->
			            </tr>
			            <?php
	            	}
	            ?>
            </tbody>
          </table>
        </div>
      </div>
  

</section>


<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete Confirmation</h4>
            </div>
            <div class="modal-body">
                Are you sure want to delete this item?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a class="btn btn-danger btn-ok">Delete</a>
            </div>
        </div>
    </div>
</div>


<?php require_once('footer.php'); ?>