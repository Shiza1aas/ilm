<div class="container-fluid">
	<div id="homeCarousel" class="carousel slide" data-ride="carousel">
		<!-- Indicators -->
		<ol class="carousel-indicators">
			<li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#homeCarousel" data-slide-to="1"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
			<div class="item active">
				<img style="width:100%;height:90%;" src="<?php echo base_url("assets/images/backgroud_1.jpg");?>">
				<div class="carousel-caption">

				</div>
			</div>
			<div class="item">
				<img style="width:100%;height:90%;" src="<?php echo base_url("assets/images/backgroud_2.jpg");?>">
				<div class="carousel-caption">

				</div>
			</div>
		</div>

		<!-- Controls -->
		<a class="left carousel-control" href="#homeCarousel" role="button" data-slide="prev">
			<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
			<span class="sr-only">Previous</span>
		</a>
		<a class="right carousel-control" href="#homeCarousel" role="button" data-slide="next">
			<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
			<span class="sr-only">Next</span>
		</a>
	</div>
</div>

<!-- Take a tour via a model -->

<button style="margin-left: 100px;position: absolute;bottom: 50%;right: 50%;" type="button" class="btn btn-danger center-block" id="start_quiz" data-toggle="modal" data-target="#myModal">
	Take A Tour
</button>
<h4 style="margin-left: 100px;position: absolute;bottom: 50%;right: 50%;">
	<?php 
	if ($this->session->has_userdata('username')) 
	{
		echo $this->session->username; 
		echo session_id(); 
		// echo user_agent(); 
		echo "<br/>";
		echo $_SERVER['REMOTE_ADDR']; 
		$this->session->sess_destroy();
	}
	else
		echo "Unable to signin";
	?>
</h4>
<button class="btn btn-lg" id="score" style="position: absolute;bottom: 40%;right: 50%;"></button>
<button class="btn btn-lg btn-success" id="login_button" style="position: absolute;bottom: 30%;right: 50%;"><a href="login.php">Please Login to proceed</a></button>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Sample Quiz</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-offset-1 col-sm-10">
						<div class="panel panel-success">
							<div class="panel-heading">
								<button type="button" class="btn btn-default pull-right"><span id="timer" class="badge"></span></button>
								<h4>Play Quiz</h4>
							</div>
							<div class="panel-body">
								<div class="well" id="question">
								</div>

								<div class="row">
									<div class="col-md-6">
										<div class="well option" id="option_a">
										</div>
									</div>
									<div class="col-md-6">
										<div class="well option" id="option_b">
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="well option" id="option_c">
										</div>
									</div>
									<div class="col-md-6">
										<div class="well option" id="option_d">
										</div>
									</div>
								</div>

							</div>
						</div>  
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Quit</button>
				<button type="button" class="btn btn-primary" id="next_question">Next Question</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal For login / signup-->
<div class="modal fade" id="LoginSignupModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Log In</h4>
			</div>
			<div class="modal-body">
				<ul class="nav nav-tabs" role="tablist">
					<li role="presentation" class="active"><a href="#LOGIN" aria-controls="LOGIN" role="tab" data-toggle="tab">LOGIN</a></li>
					<li role="presentation"><a href="#SIGNUP" aria-controls="SIGNUP" role="tab" data-toggle="tab">SIGNUP</a></li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content">
					<div role="tabpanel" class="tab-pane active" id="LOGIN">
						<div class="container">
							<div class="row">
								<br>
								<div class="col-xs-12 col-sm-12 col-md-6">
									<div class="panel panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title">
												Log in</h3>
											</div>
											<div class="panel-body">
												<div class="row">
													<br>
													<div class="col-sm-6 col-md-6"> 
														<button class="btn btn-primary">Sign up with : <i class="fa fa-facebook-square fa-2x"></i></button>
														<br/>
														<br/>

														<button class="btn btn-primary">Sign up with :  <i class="fa fa-envelope-o fa-2x"> </i></button>
														<br />
														<br>
														<br>
													</div>
													<div class="col-sm-6 col-md-6">
														<form role="form" method = "POST" id="login_form">
															<div class="input-group">
																<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
																<input type="text"  id="login_username"  name="login_username" class="form-control" placeholder="Username" required autofocus />
															</div>
															<br/>
															<div class="input-group">
																<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
																<input type="password" id="login_password"  name="login_password" class="form-control" placeholder="Password" required />
															</div>
															<p>
																<a href="#">Lost your password?</a></p>
																<button type="submit" name="login_submit" id="login_submit" class="btn btn-success btn-sm">
																	Sign in</button><br>

																</form>
															</div>
														</div>
													</div>

												</div>
											</div>
										</div>
									</div>
								</div> <!--Login tabpanel-->
								<div role="tabpanel" class="tab-pane" id="SIGNUP">
									<div class="container">
										<div class="row">
											<br>
											<div class="col-xs-12 col-sm-12 col-md-6">
												<div class="panel panel-primary">
													<div class="panel-heading">
														<h3 class="panel-title">
															Sign Up</h3>
														</div>
														<div class="panel-body">

															<div class="col-xs-12 col-sm-12 col-md-12">
																<form role="form" method = "POST" id="signup_form" name="signup_form">
																	<div class="input-group">
																		<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
																		<input type="text" id="signup_username" name="signup_username" class="form-control" minlength="5" placeholder="Username" required autofocus />
																	</div>
																	<br/>
																	<div class="input-group">
																		<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
																		<input type="password" id="signup_password" name="signup_password"class="form-control" minlength="5" placeholder="Password" required />
																	</div>
																	<br>
																	<div class="input-group">
																		<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
																		<input type="password" id="signup_repeat_password" name="signup_repeat_password"class="form-control" placeholder="Repeat Password" required />
																	</div>
																	<div class="form-group last">
																		<br>
																		<div class="">
																			<button type="submit" name="signup_submit" id="signup_submit" class="btn btn-success btn-sm">
																				Sign Up</button>
																				<button class="btn btn-success"><i class="fa fa-facebook-square "></i></button>
																				<button class="btn btn-success"><i class="fa fa-envelope-o "></i></button>

																			</div>
																		</form>
																	</div>
																</div>
															</div>

														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

								</div> <!-- Modal body ends here-->
								<div class="modal-footer">
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								</div>
							</div>
						</div>
					</div>
				</div>
