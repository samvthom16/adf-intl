<?php
/**
 * Template Name: End Persecution Now
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ADF
 */

get_header('epn'); ?>

	<main id="main" class="site-main">

	<?php while ( have_posts() ) : the_post(); ?>
		<div class="site-banner">
			<div class="banner-content">
				<h2>Faith changes everything</h2>
				<p>ADF International brings protection to Christians worldwide. The most persecuted faith group today deserves the attention of  all governments - so that all Christians can freely live out their faith. Today and in the future.</p>
				<a href = "#donate" class="btn">Donate Now</a>
			</div>
		</div>
		<div class="introduction" id="whatwedo">
			<div class="wrap">
				<h1>1 in 10 Christians are being persecuted because of their religious beliefs. We’re on a mission to change that. Here’s how.</h1>
				<ul class="three-things three-list group">
					<li>
						<span><?php include(get_template_directory().'/_svg/icon-group.php'); ?></span>
						<h3>We Protect</h3>
						<p>Our legal teams and allied lawyers help Christians at Court when their religious liberty is threatened.</p>
					</li>
					<li>
						<span><?php include(get_template_directory().'/_svg/icon-bullhorn.php'); ?></span>
						<h3>We Promote</h3>
						<p>Our team of legal and media advocates make the plight of persecuted Christians known around the world.</p>
					</li>
					<li>
						<span><?php include(get_template_directory().'/_svg/icon-flower.php'); ?></span>
						<h3>We Prevent</h3>
						<p>We are committed to stopping persecution before it happens – through legal advocacy at the most important national and international institutions.</p>
					</li>
				</ul>
				<a href = "#" class="" id="read-more"><b>Read More</b><i>Hide</i></a>
				<div class="more group">
					<div class="two-third first">
						<p>Our legal team helps Christians on a very personal level if they experience persecution, harassment or unfair treatment.</p>
						<p>In India, for example our allied lawyers have won more than 200 court cases, defending pastors, bishops, missionaries, and families facing imprisonment because of their faith.</p>
						<p>But we do more than simply protecting individuals at the local level – as important as that is.</p>
						<p>We seek structural, lasting change.</p>
						<p>That’s why we have a full-time presence at every major international institution in the world, where we litigate precedent-setting cases and advocate for laws and policies that will impact the entire globe.</p>
						<p>When it comes to religious persecution, we are not only addressing the effects. We challenge the cause.</p>
					</div>
					<div class="third">
						<img src = "http://placehold.it/300x300">
					</div>
				</div>
			</div>
		</div>
		<div class="video" id="whowesupport">
			<img src="<?php bloginfo('template_directory'); ?>/_i/epn-video.jpg" />
			<div class="video-content">
				<h2>Why did you abandon us?</h2>
				<p>Our responsibility for the persecuted church</p>
				<a href = "#" data-video="VPWr19lJEqI">
					<?php include(get_template_directory().'/_svg/icon-play-circle.php'); ?>
					<span>Play Video</span>
				</a>
			</div>
		</div>
		<div class="subscribe">
			<div class="wrap group">
				<div class="third first">
					<h2>Let us keep you updated on our work</h2>
				</div>
				<div class="two-third" id="epn-subscribe">
					<?php gravity_form( 15, false, false); ?>
				</div>
			</div>
		</div>
		<div class="projects">
			<div class="projects-intro">
				<div class="wrap">
					<h2>We’ve been able to help thousands of Christians around the world.</h2>
					<p>But we’re not done yet. We need your help.<br />Here are our current projects.</p>
				</div>
			</div>
			<div class="grid three story-buttons three">
				<a href="#" class="story-trigger" data-story="blasphemy">
					<img src = "http://placehold.it/600x600">
					<div class="story-title">
						<h3>Blasphemy cases in Pakistan</h3>
						<p>Christian girl faces severe punishment</p>
					</div>
				</a>
				<a href="#" class="story-trigger" data-story="india">
					<img src = "http://placehold.it/600x600">
					<div class="story-title">
						<h3>Christians behind bars</h3>
						<p>The fight against religious minorities in India</p>
					</div>
				</a>
				<a href="#" class="story-trigger" data-story="isis">
					<img src = "http://placehold.it/600x600">
					<div class="story-title">
						<h3>ISIS in the Middle East</h3>
						<p>"Being a Christian in Iraq is a suicide mission"</p>
					</div>
				</a>
			</div>
			<div class="story-content">
				<div class="wrap">
					<a href = "#" id="close-story">&times;<span class="assistive-text">Close</span></a>
					<div class="story" id="blasphemy">
						<h3>Blasphemy cases in Pakistan</h3>
						<h4>Christian girls faces severe punishment</h4>
						<p>Just recently the Pakistani Christian lawyer Adiba (name changed for her protection) told us about her case of a nine-year old girl facing a potential death sentence. Adiba was defending this young Christian girl, who was accused of apostasy. The girl had been forcefully mar­ried to a much older Muslim man and made to convert. The girl did not simply accept her fate but she ran away, back to her family.</p>
						<h4>They put the girl into jail</h4>
						<p>Shortly afterwards the police arrived at the girl’s house and put her in jail. Although Adiba knew the dangers, she did not care. She got fully involved in the legal defense of the young, fearless Christian girl. Subsequently. the lawyer found herself accused of blasphemy. She was forced to flee the country with her two young children and husband.</p>
						<h4>Defend Christians whatever the costs</h4>
						<p>However, Adiba soon returned to Pakistan because she wanted to defend her fellow Christians, whatever the cost. She is now an allied lawyer of ADF International like more than 3000 others, who also belong to this global network. Together we defend persecuted Christians at courts around the world but we also use individual cases to advocate for change at governmental and international level.</p>
						<h4>Persistency pays off</h4>
						<p> In this case, we have asked important international bodies to address the issue of blasphemy laws with the Pakistani government. Change is coming, albeit slowly. Our work shows that persistence always pays off and we are confident that we will soon see a change for the better in Pakistan. However, we need resources to sustain our legal work in the country and our advocacy at the international institutions.</p>
					</div>
					<div class="story" id="india">
						<h3>Christians behind bars</h3>
						<h4>The plight of religious minorities in India</h4>
						<p>Some 5.3 billion people, more than two thirds of the world’s population, live in countries with significant restrictions on religion. A study of the respected Pew Research Center clearly shows that Christians are the most persecuted faith group in the world.</p>
						<p>In India, for example, many Christians are under intense pressure.&nbsp;The extreme Hindu nationalists want to purge the entire nation of all non-Hindu religions.</p>
						<h4>Children kept in prison&nbsp;</h4>
						<p>This summer, in Madhya Pradesh, seven pastors, together with 60 children, were imprisoned for attending a Christian summer camp. Charged with kidnapping and forced conversion, the pastors spent three months in prison without trial.&nbsp; In the end, they were finally released on bail, but are still awaiting trial. The children too endured distress. They were kept in prison for three days and pressured to speak against the pastors.</p>
						<h4>Christians are driven out of their homes</h4>
						<p>Our Indian allies work tirelessly to defend these persecuted Christians. They engage on all levels, from district courts to the Indian Supreme Court in order to advocate for Indian Christians to freely live out their faith. Christians who have lived there for millen­nia and other minorities are being driven out of their jobs, their homes, their villages, their communities.</p>
						<h4>200 cases won</h4>
						<p>Churches burn. Ministers, priests, and the faithful suffer severe attacks, some of which are fatal. We can no longer accept this. Allied lawyers of ADF International won more than 200 cases in Indian courts. But this is not enough. We have also brought the situation in front of European governments and international institutions like the EU and the UN, both of which support the country financially. With your help, we can continue to urge the international community to stop the persecution of Christians, Muslims, and other religious minorities in India.</p>
					</div>
					<div class="story" id="isis">
						<h3>ISIS in the Middle East</h3>
						<h4>“Being a Christian in Iraq is a suicide mission”</h4>
						<p>“Being a Christian in Iraq is a suicide mission,” said one of the church leaders from the Middle East during a presentation ADF International held at the European Parliament. Over the last months, our team has documented the testimonies of Christian refugee families from Syria and Iraq. We found them living in desolate places and terrible conditions in Beirut, Amman, and Erbil. </p>
						<h4>Recording their statements</h4>
						<p>We recorded their statements to present to the United Nations, the International Criminal Court, but also to the national governments of countries like the U.S. and the UK. We interviewed Mikhail (name changed for security reasons), the father of a Christian family, who managed to flee ISIS. </p>
						<p>He brought back this heart-wrenching plea: <em>“Please do not allow the terrorists, who burnt our churches, raided our villages, murdered our families and raped our daughters, to simply shave off their beards once ISIS is defeated and to go on living a normal life as if nothing had ever happened.”</em></p>
						<p>He urged us to bring the perpetrators of genocide to justice. This is exactly what we are work­ing towards, day in, day out. With your valued help, we can strive to make a difference to the persecuted.</p>
						<div class="fitvids">
							<iframe width="560" height="315" src="https://www.youtube.com/embed/zWnd1ia3tK0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="donate" id="donate">
			<div class="wrap">
				<h2>Please support our work now!</h2>
				<div class="donate-container group">
					<div class="donate-instructions">
						<p><strong>Your gift of £10, £20, £40, or even £100 helps and protects the persecuted like Christians in India, Pakistan, and in the Middle East.</strong></p>
						<p>Persistence pays off. Your gift­ will help us to defend families and protect them from what others have had to endure. Your generosity enables us to defend freedom and seek justice worldwide. Not only for today but for the next generation to come. So please give with an open heart.</p>
						<p>Funds will be used to protect Christians around the world.</p>
					</div>
					<div id="donate-form">
						<?php if(site_url() == 'http://local-adf.com'){
							gravity_form( 11, false, false);
						} else {
							gravity_form( 16, false, false);
						} ?>
					</div>
				</div>
			</div>
		</div>
	<?php endwhile; ?>

	</main><!-- #main -->

<?php
//	get_sidebar();
get_footer();
