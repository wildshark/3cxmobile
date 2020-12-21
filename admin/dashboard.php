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
										<li>Dashboard</li>
									</ul>
									<!-- /BREADCRUMBS -->
									<div class="clearfix">
										<h3 class="content-title pull-left">Dashboard</h3>
										<!-- DATE RANGE PICKER -->
										<span class="date-range pull-right">
											<div class="btn-group">
												<a class="js_update btn btn-default" href="#">Today</a>
												<a class="js_update btn btn-default" href="#">Last 7 Days</a>
												<a class="js_update btn btn-default hidden-xs" href="#">Last month</a>
												
												<a id="reportrange" class="btn reportrange">
													<i class="fa fa-calendar"></i>
													<span></span>
													<i class="fa fa-angle-down"></i>
												</a>
											</div>
										</span>
										<!-- /DATE RANGE PICKER -->
									</div>
									<div class="description">Overview, Statistics and more</div>
								</div>
							</div>
						</div>
						<!-- /PAGE HEADER -->
						<!-- DASHBOARD CONTENT -->
						<div class="row">
							<!-- COLUMN 1 -->
							<div class="col-md-12">
								<div class="row">
								  <div class="col-lg-4">
									 <div class="dashbox panel panel-default">
										<div class="panel-body">
										   <div class="panel-left red">
												<i class="fa fa-instagram fa-3x"></i>
										   </div>
										   <div class="panel-right">
												<div class="number"><?=total_user($conn)?></div>
												<div class="title">Total Users</div>
												<span class="label label-success">
													26% <i class="fa fa-arrow-up"></i>
												</span>
										   </div>
										</div>
									 </div>
								  </div>
								  <div class="col-lg-4">
									 <div class="dashbox panel panel-default">
										<div class="panel-body">
										   <div class="panel-left blue">
												<i class="fa fa-twitter fa-3x"></i>
										   </div>
										   <div class="panel-right">
												<div class="number"><?=total_active_user($conn)?></div>
												<div class="title">Active User</div>
												<span class="label label-warning">
													5% <i class="fa fa-arrow-down"></i>
												</span>
										   </div>
										</div>
									 </div>
                                  </div>
                                  <div class="col-lg-4">
									 <div class="dashbox panel panel-default">
										<div class="panel-body">
										   <div class="panel-left blue">
												<i class="fa fa-twitter fa-3x"></i>
										   </div>
										   <div class="panel-right">
												<div class="number"><?=total_passive_user($conn)?></div>
												<div class="title">Passive User</div>
												<span class="label label-warning">
													5% <i class="fa fa-arrow-down"></i>
												</span>
										   </div>
										</div>
									 </div>
								  </div>
								</div>
							</div>
							<!-- /COLUMN 1 -->
						</div>
					   <!-- /DASHBOARD CONTENT -->
					   <!-- HERO GRAPH -->
						<div class="row">
							<div class="col-md-12">
								<!-- BOX -->
								<div class="box border green">
									<div class="box-title">
										<h4><i class="fa fa-bars"></i> <span class="hidden-inline-mobile">Traffic & Sales</span></h4>
									</div>
									<div class="box-body">
										<div class="tabbable header-tabs">
											<ul class="nav nav-tabs">
												 <li><a href="#box_tab2" data-toggle="tab"><i class="fa fa-search-plus"></i> <span class="hidden-inline-mobile">Select & Zoom Sales Chart</span></a></li>
												 <li class="active"><a href="#box_tab1" data-toggle="tab"><i class="fa fa-bar-chart-o"></i> <span class="hidden-inline-mobile">Traffic Statistics</span></a></li>
											 </ul>
											 <div class="tab-content">
												 <div class="tab-pane fade in active" id="box_tab1">
                                                    <!-- TAB 1 -->
                                                    <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="panel panel-default">
                                                            <div class="panel-body">
                                                                <table class="table table-striped table-bordered table-hover">
                                                                <thead>
                                                                    <tr>
                                                                    <th><i class="fa fa-user"></i> Client</th>
                                                                    <th class="hidden-xs"><i class="fa fa-quote-left"></i> Sales Item</th>
                                                                    <th><i class="fa fa-dollar"></i> Amount</th>
                                                                    <th><i class="fa fa-bars"></i> Status</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                    <td><a href="#">Fortune 500</a></td>
                                                                    <td class="hidden-xs">Gold Level Virtual Server</td>
                                                                    <td>$ 2310.23</td>
                                                                    <td><span class="label label-success label-sm">Paid</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td><a href="#">Cisco Inc.</a></td>
                                                                    <td class="hidden-xs">Platinum Level Virtual Server</td>
                                                                    <td>$ 5502.67</td>
                                                                    <td><span class="label label-warning label-sm">Pending</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td><a href="#">VMWare Ltd.</a></td>
                                                                    <td class="hidden-xs">Hardware Switch</td>
                                                                    <td>$ 3472.54</td>
                                                                    <td><span class="label label-success label-sm">Paid</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td><a href="#">Wall-Mart Stores</a></td>
                                                                    <td class="hidden-xs">Branding & Marketing</td>
                                                                    <td>$ 6653.25</td>
                                                                    <td><span class="label label-success label-sm">Paid</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td><a href="#">Exxon Mobil</a></td>
                                                                    <td class="hidden-xs">UX and UI Services</td>
                                                                    <td>$ 45645.45</td>
                                                                    <td><span class="label label-danger label-sm">Overdue</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td><a href="#">General Electric</a></td>
                                                                    <td class="hidden-xs">Web Designing</td>
                                                                    <td>$ 3432.11</td>
                                                                    <td><span class="label label-warning label-sm">Pending</span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
												   <!-- /TAB 1 -->
												 </div>
												 <div class="tab-pane fade" id="box_tab2">
                                                 <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="panel panel-default">
                                                            <div class="panel-body">
                                                                <table class="table table-striped table-bordered table-hover">
                                                                <thead>
                                                                    <tr>
                                                                    <th><i class="fa fa-user"></i> Client</th>
                                                                    <th class="hidden-xs"><i class="fa fa-quote-left"></i> Sales Item</th>
                                                                    <th><i class="fa fa-dollar"></i> Amount</th>
                                                                    <th><i class="fa fa-bars"></i> Status</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                    <td><a href="#">Fortune 500</a></td>
                                                                    <td class="hidden-xs">Gold Level Virtual Server</td>
                                                                    <td>$ 2310.23</td>
                                                                    <td><span class="label label-success label-sm">Paid</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td><a href="#">Cisco Inc.</a></td>
                                                                    <td class="hidden-xs">Platinum Level Virtual Server</td>
                                                                    <td>$ 5502.67</td>
                                                                    <td><span class="label label-warning label-sm">Pending</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td><a href="#">VMWare Ltd.</a></td>
                                                                    <td class="hidden-xs">Hardware Switch</td>
                                                                    <td>$ 3472.54</td>
                                                                    <td><span class="label label-success label-sm">Paid</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td><a href="#">Wall-Mart Stores</a></td>
                                                                    <td class="hidden-xs">Branding & Marketing</td>
                                                                    <td>$ 6653.25</td>
                                                                    <td><span class="label label-success label-sm">Paid</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td><a href="#">Exxon Mobil</a></td>
                                                                    <td class="hidden-xs">UX and UI Services</td>
                                                                    <td>$ 45645.45</td>
                                                                    <td><span class="label label-danger label-sm">Overdue</span></td>
                                                                    </tr>
                                                                    <tr>
                                                                    <td><a href="#">General Electric</a></td>
                                                                    <td class="hidden-xs">Web Designing</td>
                                                                    <td>$ 3432.11</td>
                                                                    <td><span class="label label-warning label-sm">Pending</span></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    </div>
												</div>
											 </div>
										</div>
									</div>
								</div>
								<!-- /BOX -->
							</div>
						</div>
						<!-- /HERO GRAPH -->
						<div class="footer-tools">
							<span class="go-top">
								<i class="fa fa-chevron-up"></i> Top
							</span>
						</div>
					</div><!-- /CONTENT-->
				</div>