				<div class="row">
					<div id="content" class="col-lg-12">
						<!-- PAGE HEADER-->
						<div class="row">
							<div class="col-sm-12">
								<div class="page-header">
									<!-- BREADCRUMBS -->
									<ul class="breadcrumb">
										<li>
											<i class="fa fa-home"></i>
											<a href="index.html">Home</a>
										</li>
										<li>
											<a href="#">Tables</a>
										</li>
										<li>Dynamic Tables</li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Dynamic Tables</h3>
									</div>
									<div class="description">Dynamic Tables and Modals</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<!-- DATA TABLES -->
						<div class="row">
							<div class="col-md-12">
								<!-- BOX -->
								<div class="box border green">
									<div class="box-title">
										<h4><i class="fa fa-table"></i>Dynamic Data Tables</h4>
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
									<div class="box-body">
										<table id="datatable1" cellpadding="0" cellspacing="0" border="0" class="datatable table table-striped table-bordered table-hover">
											<thead>
												<tr>
													<th>Serial #</th>
													<th>File Name</th>
													<th class="hidden-xs">Records</th>
													<th class="hidden-xs">Created Date</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<?php
													 $sql="SELECT * FROM `get_mobile_file` ORDER BY `file_id` DESC LIMIT 0,1000";
													 $stmt = $conn->prepare($sql);
													// $stmt->bind_param("i",$r[0]);
											 
													 $stmt->execute();
													 
													 $result = $stmt->get_result();
													 if($result->num_rows == 0){
														echo"
															<tr class='gradeA'>
																<td>Null</td>
																<td>Null</td>
																<td class='hidden-xs'>Null</td>
																<td class='hidden-xs'>Null</td>
																<td class='center'>
																	<a href='#'>View</a> | 
																	<a href='#'>Delete</a>
																</td>
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
															<tr class='gradeA'>
																<td>{$n}</td>
																<td>{$r['file']}</td>
																<td class='hidden-xs'>{$r['total']}</td>
																<td class='hidden-xs'>{$r['created_date']}</td>
																<td class='center'>
																	<a href='?_p=file&file={$id}&token={$_SESSION['token']}'>View</a> | 
																	<a href='?_p=file&file={$id}&token={$_SESSION['token']}'>Delete</a>
																</td>
															</tr>
															";
														}
													 }
												
												?>
											
											</tbody>
											<!--tfoot>
												<tr>
													<th>Serial #</th>
													<th>File Name</th>
													<th class="hidden-xs">Created Date</th>
													<th></th>
												</tr>
											</tfoot-->
										</table>
									</div>
								</div>
								<!-- /BOX -->
							</div>
						</div>
						<!-- /DATA TABLES -->
					</div><!-- /CONTENT-->
				</div>