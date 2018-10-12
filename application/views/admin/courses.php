

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
          <br><br>
         <?php if($section == "list"){ ?>
          <h2>Courses <a href="<?php echo base_url();?>admin/courses/create_course" class="btn btn-secondary btn-sm float-right">Create New</a></h2>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>
                <tr>
                    <th>#</th>
                    <th>Course Title</th>
                    <th>Course Name</th>
                    <th>Category</th>
                    <th>Created</th>
                    <th>Status</th>
                    <th></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($list as $key => $item){ ?>
                  <tr>
                    <th><?php echo $key ;?></th>
                    <th><?php echo $item['course_title'];?></th>
                    <th><?php echo $item['course_name'];?></th>
                    <th><?php echo $item['category_title'];?></th>
                    <th><?php echo $item['created'];?></th>
                    <th><?php echo $item['status'];?></th>
                    <th>
                      <a href="<?php echo base_url();?>admin/courses/update_course/<?php echo $item['id'];?>" class="btn btn-primary btn-sm">U</a>
                      <a href="<?php echo base_url();?>admin/courses/delete/<?php echo $item['id'];?>" class="btn btn-danger btn-sm">D</a>
                    </th>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        <?php }elseif($section == "create"){ ?>
          <h2>Create Course</h2>
          <?php echo form_open('admin/courses/create_course');?>
          <div class="table-responsive">
            <table class="table table-striped table-sm">
                <tr>
                    <th>Course Title</th>
                    <th><input type="text" placeholder="Course Title" name="title" class="form-control" required /></th>
               </tr>
               <tr>
                    <th>Course Name</th>
                    <th><input type="text" placeholder="Course Name" name="name" class="form-control" required/></th>
               </tr>
               <tr>
                    <th>Category</th>
                    <th>
                      <select name="category_id" class="form-control">
                           <option disabled selected>Select Category</option>
                        <?php foreach($list as $item){ ?>
                           <option value="<?php echo $item['id'];?>"><?php echo $item['category_title'];?></option>
                        <?php } ?>
                      </select>
                    </th>
               </tr>
                <tr>
                     <th>Status</th>
                    <th>
                       <select class="form-control" name="status">
                         <option value="1"  >Active</option>
                         <option value="0" >Disable</option>
                       </select>
                    </th>
                 </tr>
                 <tr>
                      <th></th>
                     <th>
                      <input type="submit" name="create" value="Create" class="btn btn-primary btn-sm" />
                     </th>
                  </tr>
            </table>
          </div>
          <?php echo form_close();?>
        <?php }elseif($section == "update"){ ?>
          <h2>Update Course</h2>
          <?php echo form_open('admin/courses/update_course/'.$this->uri->segment(4));?>
          <div class="table-responsive">
            <?php foreach($one as $item){ } ?>
            <table class="table table-striped table-sm">
                <tr>
                    <th>Course Title</th>
                    <th><input type="text" value="<?php echo $item['course_title'];?>" class="form-control" /></th>
               </tr>
               <tr>
                    <th>Course Name</th>
                    <th><input type="text" value="<?php echo $item['course_name'];?>" class="form-control" /></th>
               </tr>
               <tr>
                    <th>Category Name</th>
                    <th>
                      <select name="category_id" class="form-control">
                        <?php foreach($list as $item2){
                         $select = ($item2['id'] == $item['category_id']) ? "selected" : "" ;
                        ?>
                       <option value="<?php echo $item2['id'];?>" <?php echo $select;?> ><?php echo $item2['category_title'];?></option>
                        <?php } ?>
                      </select>
                    </th>
               </tr>
                <tr>
                     <th>Status</th>
                    <th>
                       <select class="form-control" name="status">
                         <option value="1" <?php echo ($item['status'] == 1) ? "selected" : "";?> >Active</option>
                         <option value="0" <?php echo ($item['status'] == 0) ? "selected" : "";?>>Disable</option>
                       </select>
                    </th>
                 </tr>
                 <tr>
                      <th></th>
                     <th>
                      <input type="submit" name="update" value="Update" class="btn btn-primary btn-sm" />
                     </th>
                  </tr>
            </table>
          </div>
            <?php echo form_close();?>
        <?php } ?>
        </main>
