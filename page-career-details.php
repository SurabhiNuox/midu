<?php
/**
 * Template Name: Career Details
 *
 * @package midu
 */

get_header();
?>

<main id="primary" class="site-main detail-page-content career-detail-content">
	<div class="main_content">
		<section class="career_details_section">
			<div class="container">
			<div class="breadcrumb">
                 <ul>
                    <li><a href="<?php echo home_url(); ?>"> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/home.svg" alt="Home"></a></li>
                    <li><a href="<?php echo home_url(); ?>">Careers</a></li>
                    <li><span>Project Manager – Development</span></li>
                 </ul>
            </div>

			<div class="career_details_wrap">
				       <div class="career_details_left">
						          <label>Posted 18 hours ago</label>
								  <h2 class="second_title">Project Manager Development</h2>

								  <div class="career_tag">Job Description</div>

								  <div class="career_details_content">
									    <div class="career_details_box">
											        <h4>Key Responsibilities</h4>
													<ul>
														<li>Oversee project planning and coordination</li>
														<li>Collaborate with internal and external stakeholders</li>
														<li>Monitor progress and performance</li>
														<li>Prepare reports and documentation</li>
													</ul>
										</div>

										<div class="career_details_box">
											        <h4>Requirements & Qualifications</h4>
													<ul>
													<li>Relevant degree or certifications</li>
													<li>Minimum experience requirements</li>
													<li>Technical and soft skills</li>
													<li>Language requirements (if any)</li>
													</ul>
										</div>


										<div class="career_details_box">
											        <h4>What We Offer</h4>
													<ul>
													<li>Competitive salary and benefits</li>
													<li>Career development opportunities</li>
													<li>Collaborative work culture</li>
												<li>Exposure to major national projects</li>
													</ul>
										</div>
								  </div>
					   </div>

					   <div class="career_details_right"> 
						<div class="career_details_right_inner">
						<h3>Apply Now</h3>
						<div class="career_details_form">
							 <form action="#" method="post" enctype="multipart/form-data">
								 <div class="career_form_group">
									 <input type="text" id="career_first_name" name="career_first_name" placeholder="First Name*" required>
								 </div>

								 <div class="career_form_group">
									 <input type="text" id="career_last_name" name="career_last_name" placeholder="Last Name*" required>
								 </div>

								 <div class="career_form_group">
									 <input type="email" id="career_email" name="career_email" placeholder="Email Address*" required>
								 </div>

								 <div class="career_form_group">
									 <input type="tel" id="career_contact" name="career_contact" placeholder="Contact Number*" required>
								 </div>

								 <div class="career_form_group">
									 <select id="career_position" name="career_position" required>
										 <option value="">Position Applied for*</option>
										 <option value="project-manager">Project Manager – Development</option>
										 <option value="cfo">Chief Financial Officer</option>
										 <option value="senior-project-manager">Senior Project Manager</option>
									 </select>
								 </div>

								 <div class="career_form_group career_form_group--file">
									 <div class="career_form_file">
										 <div class="career_form_file_input">
											 <input type="file" id="career_resume" name="career_resume" accept=".pdf,.doc,.docx" required aria-label="Attach Resume">
											 <span class="career_form_file_label">Attach Resume*</span>
										 </div>
										 <button type="button" class="career_form_file_button">Attach Resume</button>
									 </div>
								 </div>

								 <div class="career_form_actions">
									 <button type="submit" class="btn-primary">
										 <span class="button-text">Submit</span>
										 <span class="button-icon">
											 <img src="<?php echo get_template_directory_uri(); ?>/assets/images/arrow.svg" alt="Arrow Right">
										 </span>
									 </button>
								 </div>
							</form>
						</div>
						</div>
						

                          </div>
			</div>

			</div>
		</section>
	</div>
</main><!-- #main -->

<?php
get_footer();
