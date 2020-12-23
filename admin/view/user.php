<?php
$_SESSION['file'] = $_REQUEST['file'];
$_SESSION['token'] = $_REQUEST['token'];
$path = http_build_query($_REQUEST);
$query = explode("/",hex2bin($_GET['file']));

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
											<a href="index.html">File</a>
										</li>
										<li>
											<a href="#"><?=ucfirst($query[2])?></a>
										</li>
										<li>Dynamic Tables</li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">File: <?=ucfirst($query[2])?> </h3>
									</div>
									<div class="description">File Created <?=date("H:i:sa d-m-Y",strtotime($query[3]))?> </div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<!-- DATA TABLES -->
						<div class="row">
							<div class="col-md-12">
								<!-- BOX -->
								<div class="box border">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i><span class="hidden-inline-mobile">SQL Code: Query Data By</span></h4>
									</div>
									<div class="box-body">
										<div class="tabbable header-tabs">
										  <ul class="nav nav-tabs">
										  <li class="active"><a href="#box_tab1" data-toggle="tab"><i class="fa fa-home"></i> <span class="hidden-inline-mobile">System User</span></a></li>
											 <li><a href="#box_tab2" data-toggle="tab"><i class="fa fa-user"></i> <span class="hidden-inline-mobile">My File</span></a></li>
											 
											 <li><a href="#box_tab3" data-toggle="tab"><i class="fa fa-home"></i> <span class="hidden-inline-mobile"> Date</span></a></li>
										  </ul>
										  <div class="tab-content">
											 <div class="tab-pane active" id="box_tab1">
											 	<p>Query Using #User</p>
												<p> SELECT get_mobile_list.mobile FROM get_mobile_list WHERE get_mobile_list.user_id = '<?=$query[1]?>' </p>												
											 </div>
											 <div class="tab-pane" id="box_tab2">												
											 	<p>Query Using #File</p>
												<p> SELECT get_mobile_list.mobile FROM get_mobile_list WHERE get_mobile_list.file_id = '<?=$query[0]?>' </p>
											 </div>
											 <div class="tab-pane" id="box_tab3">												
											 	<p>Query Using #File</p>
												<p> SELECT get_mobile_list.mobile FROM get_mobile_list WHERE get_mobile_list.curr_date = '<?=$query[3]?>' </p>
											 </div>
										  </div>
									   </div>
									</div>
								</div>
							</div>	
							<div class="col-md-12">
								<!-- BOX -->
								<div class="box border green">
									<div class="box-title">
										<h4><i class="fa fa-table"></i>Mobile Number(s)</h4>
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
                                                    <th>Created</th>
													<th>Mobile</th>
													<th class="hidden-xs">Hash</th>
													<th></th>
												</tr>
											</thead>
											<tbody>
												<?php
													 $sql="SELECT * FROM `get_mobile_list` WHERE `file_id`=?";
													 $stmt = $conn->prepare($sql);
													 $stmt->bind_param("i",$file[0]);
											 
													 $stmt->execute();
													 
													 $result = $stmt->get_result();
													 if($result->num_rows == 0){
														echo"
															<tr class='gradeA'>
																<td>Null</td>
																<td>Null</td>
																<td>Null</td>
																<td class='hidden-xs'>Null</td>
																<td class='center'>
																	<a href='#'>Delete</a>
																</td>
															</tr>
															";
													 } else{
														while($r = $result->fetch_assoc()){
															if(isset($n)){
																$n = $n + 1;
															}else{
																$n = 1;
                                                            }
                                                            $md5 = md5($r['mobile']);
															$id = bin2hex($r['file_id']."/".$r['created_date']);
															echo"
																<tr class='gradeA'>
																	<td>{$n}</td>
																	<td>{$r['created_date']}</td>
																	<td>{$r['mobile']}</td>
																	<td class='hidden-xs'>{$md5}</td>
																	<td class='center'>
																		<a href='?_submit=delete-mobile&id={$r['id']}&{$path}'>Delete</a>
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