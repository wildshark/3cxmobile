                        <ul>
							<li>
								<a href="?_p=dashboard&e=100&token=<?=$_SESSION['token']?>">
									<i class="fa fa-tachometer fa-fw"></i> <span class="menu-text">Dashboard</span>
									<span class="selected"></span>
								</a>					
							</li>
                            <li><a class="" href="?_p=upload&e=100&token=<?=$_SESSION['token']?>"><i class="fa fa-desktop fa-fw"></i> <span class="menu-text">Upload CSV</span></a></li>
							<li class="has-sub">
								<a href="javascript:;" class="">
								<i class="fa fa-table fa-fw"></i> <span class="menu-text">Files</span>
								<span class="arrow open"></span>
								<span class="selected"></span>
								</a>
								<ul class="sub">
                                    <?php
                                        $sql="SELECT * FROM `mobile_file` ORDER BY `file_id` DESC LIMIT 0,15";
                                        $stmt = $conn->prepare($sql);
                                       // $stmt->bind_param("i",$r[0]);
                                
                                        $stmt->execute();
                                        
                                        $result = $stmt->get_result();
                                        if($result->num_rows == 0){
                                            echo"<li><a class='' href='#'><span class='sub-menu-text'>Null</span></a></li>";
                                        } else{
                                            while($r = $result->fetch_assoc()){
                                                $id = bin2hex($r['file_id']."/".$r['file']."/".$r['created_date']);
                                                echo"<li><a class='' href='?_p=file&file={$id}&token={$_SESSION['token']}'><span class='sub-menu-text'>{$r['file']}</span></a></li>";
                                            }
                                        }
                                    ?>
								</ul>
                            </li>
                            <li><a class="" href="?user=logout&log=off"><i class="fa fa-envelope-o fa-fw"></i> <span class="menu-text">Log Out</span></a></li>
						</ul>