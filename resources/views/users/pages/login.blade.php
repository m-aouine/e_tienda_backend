@extends("users.layouts.main")
@section("pageTitle",isset($pageTitle)?$pageTitle:"Log In")
@section("content")
<div class="col-md-6 col-lg-5">

						<div class="login-box bg-white box-shadow border-radius-10">
							<div class="login-title">
								<h2 class="text-center text-primary">@yield("pageTitle")</h2>
							</div>

                           @if(Session::get("fail"))
                              <div class="alert alert-danger">
                              {{Session::get("fail")}}

                                <button type="button"   class="close" data-dismiss="alert"  aria-label="close">
                                    <span> &times;</span>
                                </button>

                              </div>
                           @endif




							<form action="{{route("admin.login_handler")}}"  method="POST">		
                                @csrf				
								<div class="input-group custom">
									<input
										type="text"
										class="form-control form-control-lg"
										placeholder="Username/Email"
                                        name="login_id"
										
									/>


									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="icon-copy dw dw-user1"></i
										></span>
									</div>
								</div>
                                @error('login_id')
                                <div class="d-block text-danger" style="margin-top: -25px;margin-buttom: 15px">
                                    {{$message}}
                                </div>     
                                @enderror



								<div class="input-group custom">
									<input
										type="password"
										class="form-control form-control-lg"
										placeholder="**********"
                                        name="password"
									/>
									<div class="input-group-append custom">
										<span class="input-group-text"
											><i class="dw dw-padlock1"></i
										></span>
									</div>
								</div>
                                @error('password')
                                <div class="d-block text-danger" style="margin-top: -25px;margin-buttom: 15px">
                                    {{$message}}
                                </div>     
                                @enderror




								<div class="row pb-30">
									<div class="col-6">
										<div class="custom-control custom-checkbox">
											<input
												type="checkbox"
												class="custom-control-input"
												id="customCheck1"
											/>
											<label class="custom-control-label" for="customCheck1"
												>Remember</label
											>
										</div>
									</div>
									<div class="col-6">
										<div class="forgot-password">
											<a href="forgot-password.html">Forgot Password</a>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-sm-12">
										<div class="input-group mb-0">							
                                                <input
                                                type="submit"
                                                class="btn btn-primary btn-lg btn-block"
                                                placeholder="Username/Email"
                                              
                                            />

										</div>
									
										
									</div>
								</div>
							</form>
						</div>
					</div>
@endsection
