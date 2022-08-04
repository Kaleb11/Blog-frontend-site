@extends('layout.app')
@section('title','Our awesome home page title')
@section('maincontent')
<!-- HEADER -->
		<!-- BANNER -->
		<section class="banner_sec">
			<div class="container">
				<div class="row">
					<div class="col-12 col-md-10 col-lg-8">
						<div class="row">
                       
							<div class="col-12 col-md-4 col-lg-4">
								<a href="">
									<div class="banner_box">
										<i class="fa fa-laravel"></i>
										<h3 class="banner_box_h3">{{$tagName}}</h3>
										<p>The Toptal Blog is the top hub for developers.</p>
									</div>
								</a>
							</div>
                            
							<!-- <div class="col-12 col-md-4 col-lg-4">
								<a href="">
									<div class="banner_box">
										<i class="fas fa-code"></i>
										<h3 class="banner_box_h3">Developers</h3>
										<p>The Toptal Blog is the top hub for developers.</p>
									</div>
								</a>
							</div>

							<div class="col-12 col-md-4 col-lg-4">
								<a href="">
									<div class="banner_box">
										<i class="fas fa-desktop"></i>
										<h3 class="banner_box_h3">Designers</h3>
										<p>The Toptal Blog is the top hub for developers.</p>
									</div>
								</a>
							</div>

							<div class="col-12 col-md-4 col-lg-4">
								<a href="">
									<div class="banner_box">
										<i class="fas fa-project-diagram"></i>
										<h3 class="banner_box_h3">Project Managers</h3>
										<p>The Toptal Blog is the top hub for developers.</p>
									</div>
								</a>
							</div>

							<div class="col-12 col-md-4 col-lg-4">
								<a href="">
									<div class="banner_box">
										<i class="fab fa-laravel"></i>
										<h3 class="banner_box_h3">Laravel</h3>
										<p>The Toptal Blog is the top hub for developers.</p>
									</div>
								</a>
							</div>

							<div class="col-12 col-md-4 col-lg-4">
								<a href="">
									<div class="banner_box">
										<i class="fab fa-sketch"></i>
										<h3 class="banner_box_h3">Product Managers</h3>
										<p>The Toptal Blog is the top hub for developers.</p>
									</div>
								</a>
							</div> -->
						</div>
                        <!-- {!! $blogs->links() !!} -->
					</div>
				</div>
			</div>
		</section>
		<!-- BANNER -->

		<!-- BODY -->
		<div class="home_body">
			<div class="container">
				<div class="latest_post">
					<div class="latest_post_top">
						<h1 class="latest_post_h1 brdr_line">Latest Blog</h1>
					</div>
					<div class="row">
                    @if(count($blogs)>0)

                    @foreach($blogs as $blog)
						<div class="col-12 col-md-6 col-lg-4">
							<a href="/blog/{{$blog->slug}}">
								<div class="home_card">
									<div class="home_card_top">
										<img src="http://127.0.0.1:8000{{$blog->featuredImage}}" alt="image">
									</div>
									<div class="home_card_bottom">
										<div class="home_card_bottom_text">
                                            @if(count($blog->cat)>0)
                                            
											<ul class="home_card_bottom_text_ul">
                                            @foreach($blog->cat as $c)
												<li>
													<a href="/blog/{{$blog->slug}}">{{$c->categoryName}}</a>
													<!-- <span><i class="fas fa-angle-right"></i></span> -->
												</li>
                                            @endforeach
											</ul>
                                           
                                            @endif
                                            
											<a href="/blog/{{$blog->slug}}">
												<h2 class="home_card_h2">{{$blog->title}}</h2>
											</a>
											<p class="post_p comment more">
                                            {{$blog->post_excerpt}}
											</p>
											<div class="home_card_bottom_tym">
                                            @if($blog->user)
												<div class="home_card_btm_left">
												<!-- <img src="C:/Users/Kaleb/Desktop/Laravel-projects/fullstack/public/uploads/User photos/1648111438.jpg" alt="Any alt text"/> -->
                                                <img src="http://127.0.0.1:8000{{$blog->user->photo}}" alt="Any alt text"/>
                                                   	
												</div>
                                                @endif
												<div class="home_card_btm_r8">
												<a href="contact_me.html"><p class="author_name">{{$blog->user->fullName}}</p></a>
                                               
													<ul class="home_card_btm_r8_ul">
                                                    
														<!-- <li>{{$blog->created_at}}</li> -->
                                                        
  
														<li><span class="dot"></span>{{$blog->created_at->diffForHumans()}}</li>

													</ul>
												</div>
											</div>
										</div>
									</div>
								</div>
							</a>
						</div>
                        @endforeach
                        @endif
					</div>




                   <div class="row">
                       
                       <div class="col-3 col-md-4 col-lg-4">
                       </div>
                         <div class="col-7 col-md-8 col-lg-8">
                         {!! $blogs->links() !!}
                            </div>
                             
                            
                    </div>















				</div>
               
			</div>
					<!-- PAGINATION -->
			<!-- <div class="pagination">
				<ul class="pagination_ul d-flex">
					<li>
						<a href="">
							<i class="fas fa-chevron-left"></i>
						</a>
					</li>
					<li>
						<a href="">1</a>
					</li>
					<li>
						<a href="">2</a>
					</li>
					<li>
						<a href="">3</a>
					</li>
					<li>
						<a href="">
							<i class="fas fa-chevron-right"></i>
						</a>
					</li>
				</ul>
			</div> -->
			<!-- PAGINATION -->
		</div>
		<!-- BODY -->
@endsection
