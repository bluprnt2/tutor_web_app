
	<div id="kb-yellowbar"></div>
	
	<?php
		require_once("../APIClient.php");
		//include ("connectiondb.php");
		$title = "Knowledge Base";
		include("header.php");
		include("navbar.php");
		//only tutors and admins should be able to
		//access and modify the knowledge base.
		//check if the user is logged in,
		//if not, redirect them.
		
		if(!APIClient::isLoggedIn())
		{
			//make note to update navbar on login
			//admin has option to view knowledge base but can remove files
			header('Location: ./index.php');
			echo '<p><a href="index.php">Only Tutors and Admins have access to the Knowledge Base</a><p>';
			exit();
		}
	?>
		
		<!--kb = knowledge base-->
		<div id="kb-container">
			<div id="kb-title">
				<div class="">Knowledge Base</div>
			</div>
			
			
			<div id="wrapper">
				<div id="kb-selection">
				<?php
					$departments = APIClient::getDepartments(null);
					$courses = APIClient::getCourses(null, null, null);
					$files = APIClient::getFiles(null, null, null);
				?>
					<form id="selDeptForm" method="POST">					
					<div id="kb-selection-component1">
						<select id="kb-department" name="department" class="dept-list" onChange="updateCourses()">
							<option value="">Select a Department</option>
							<?php
								foreach($departments as $d) {
									echo "<option value=" . $d->getID() . ">" . $d->getName() . "</option>";
								}					
							?>
						</select>
						<select id="kb-course" name="course" class="course-list" onChange="updateFiles()">
							<option value="">Select a Course</option>
							<?php
								foreach($courses as $c){
									echo "<option value=\"{ 'deptID':" . $c->getDeptID() . ", 'ID':" . $c->getID() . "}\">". $c->getName() ."</option>";
								}
							?>
						</select>
						<select id="kb-filename" name="file" class="file-list">
							<option value="">Select a File</option>
							<?php
								foreach($files as $f){
									echo "<option value=\"{ 'courseID':" . $f->getCourseID() . ", 'ID':" . $f->getID() . "}\">". $f->getFilename() ."</option>";
								}
							?>
						</select>
						<button id="kb-loadButton" type="submit" name="load-file">Load File</button>
					</div>
					</form>
				</div>
				
			<div id="kb-content">
					<div class="courseName">
						<?php
							//if(isset($file))
							//{
								$filename = APIClient::getFiles(null, $course, $file);
								foreach($file as $a){
									echo $a->getName();
								}
							//}
						?>
					</div>
					<div class="filesDisplay">
						<?php
							//if(isset($filename))
							//{
								$fileContents = APIClient::getFiles(null, $course, $filename);
								foreach($file as $a){
									echo $a->getContent();
								}
							//}
						?>
					</div>
			</div>
			
			<script>
				function updateCourses()
				{
					changedDepartment("selDeptForm");
				}
				function updateFiles()
				{
					changedCourse("selDeptForm");
				}
				function changedCourse(id) {
					var form = document.getElementById(id);
					var course = form.getElementsByClassName("course-list")[0];
					var file = form.getElementsByClassName("file-list")[0];
					file.options[0].selected=true;
					hide(file, "'courseID':".concat(course.value));
				}
				//author: Chris Mariani
				function changedDepartment(id) {
					var form = document.getElementById(id);
					var dept = form.getElementsByClassName("dept-list")[0];
					var course = form.getElementsByClassName("course-list")[0];
					course.options[0].selected=true;
					hide(course, "'deptID':".concat(dept.value));
				}
				//author: Chris Mariani
				function hide(drop, value) {
					for(i = 1; i < drop.length; i++) {
						var v = true;
						if(drop.options[i].value.includes(value)) v = false;
						drop.options[i].hidden=v;
					}
				}
			</script>
			<div id="kb-footer">
			<?php
				include("footer.php");
			?>
			</div>
		</div>
	</body>
</html>
