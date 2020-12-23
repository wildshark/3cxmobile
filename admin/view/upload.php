<?php
if(isset($_REQUEST['id'])){
	$_SESSION['file'] = $_REQUEST['file'];
	$_SESSION['id'] = $_REQUEST['id'];
	$_SESSION['token'] = $_REQUEST['token'];
	$path = http_build_query($_REQUEST);
}else{
	$path ="";
}
?>
				<div class="row">
					<div id="content" class="col-lg-12">
						<!-- PAGE HEADER-->
						<div class="row">
							<div class="col-sm-12">
								<div class="page-header">
									<!-- STYLER -->
									
									<!-- /STYLER -->
									<!-- BREADCRUMBS -->
									<ul class="breadcrumb">
										<li>
											<i class="fa fa-home"></i>
											<a href="index.html">Home</a>
										</li>
										<li>
											<a href="#">Form Elements</a>
										</li>
										<li>Forms</li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Forms</h3>
									</div>
									<div class="description">Form Elements and Features</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<!-- FORMS -->
						<div class="row">
							<div class="col-md-12">
								<div class="row">
									<div class="col-md-6">
										<!-- BASIC -->
										<div class="box border orange">
											<div class="box-title">
												<h4><i class="fa fa-bars"></i>Basic form elements</h4>
												<div class="tools hidden-xs">
													<a href="#box-config" data-toggle="modal" class="config">
														<i class="fa fa-cog"></i>
													</a>
													<a href="javascript:;" class="reload">
														<i class="fa fa-refresh"></i>
													</a>
													<a href="javascript:;" class="collapse">
														<i class="fa fa-chevron-up"></i>
													</a>
													<a href="javascript:;" class="remove">
														<i class="fa fa-times"></i>
													</a>
												</div>
											</div>
											<div class="box-body big">
												<h3 class="form-title">Basic Example</h3>
												<form role="form" action="index.php" method="post" enctype="multipart/form-data">
												  <div class="form-group">
													<label for="exampleInputEmail1">File Name</label>
													<input type="text" name="file-name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
												  </div>
												  <div class="form-group">
													<label for="exampleInputPassword1">Upload CSV</label>
													<input type="file" name="file" class="form-control" id="exampleInputPassword1" placeholder="Password">
												  </div>
				
												  <button type="submit" name="_submit" value="upload" class="btn btn-success">Submit</button>
												</form>
											</div>
										</div>
										<!-- /BASIC -->
									</div>
									<div class="col-md-6">
										<div class="box border primary">
											<div class="box-title">
												<h4><i class="fa fa-bars"></i>Form controls</h4>
												<div class="tools hidden-xs">
													<a href="#box-config" data-toggle="modal" class="config">
														<i class="fa fa-cog"></i>
													</a>
													<a href="javascript:;" class="reload">
														<i class="fa fa-refresh"></i>
													</a>
													<a href="javascript:;" class="collapse">
														<i class="fa fa-chevron-up"></i>
													</a>
													<a href="javascript:;" class="remove">
														<i class="fa fa-times"></i>
													</a>
												</div>
											</div>
											<div class="box-body big">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Mobile</th>
                                                        <th></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                            if(!isset($_GET['file'])){
                                                                echo"
                                                                <tr>
                                                                    <td>Null</td>
                                                                    <td>Null</td>
                                                                    <td>Null</td>
                                                                </tr>
                                                                ";
                                                            }else{
                                                                $id = $_GET['id'];
                                                                $sql ="SELECT * FROM `get_mobile_list` WHERE `file_id`=? LIMIT 0,1000";
                                                                $stmt = $conn->prepare($sql);
                                                                $stmt->bind_param("i",$id);
                                                         
                                                                 $stmt->execute();
                                                                 
                                                                 $result = $stmt->get_result();
                                                                 if($result->num_rows == 0){
                                                                    echo"
                                                                    <tr>
                                                                        <td>Null</td>
                                                                        <td>Null</td>
                                                                        <td>Null</td>
                                                                    </tr>";
                                                                 } else{
                                                                    while($r = $result->fetch_assoc()){
                                                                        if(isset($n)){
                                                                            $n = $n + 1;
                                                                        }else{
                                                                            $n = 1;
                                                                        }
                                                                        $id = bin2hex($r['file_id']."/".$r['created_date']);
                                                                        echo"
                                                                            <tr>
                                                                                <td>{$n}</td>
                                                                                <td>{$r['mobile']}</td>
                                                                                <td><a href='?_submit=delete-upload&mobile={$r['id']}&{$path}'>Delete</a></td>
                                                                            </tr>";
                                                                    }
                                                                 }
                                                            }
                                                        
                                                        ?>
                                                    </tbody>
                                                </table>
											</div>
                                        </div>
									</div>
								</div>
								<div class="separator"></div>
							</div>
						</div>
	
					</div><!-- /CONTENT-->
				</div>