<div class = "modal fade" id = "addstudent" tabindex = "-1" role = "dialog">
              <div class = "modal-dialog ">
                <div class = "modal-content">
                        <div class = "modal-header" style = "background-color:#20B2AA;">
                            
                              <h2 classs = "modal-title" style = "color:white;">Enter Student's Details Below</h2>
                        </div>
                        <div class = "modal-body">
                              <form class="form-horizontal" role="form" action = "manager.php" method = "POST" enctype = "multipart/form-data">
               
                <div class="form-group">
                    <label for="firstName" class="control-label">Student's Name</label>
                    <div class="col-sm-">
                        <input type="text" name="name"  placeholder="name" class="form-control" autofocus>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label  class=" control-label">Gender</label>
                    <div>
                        <select class = "form-control" name = "gender">
                                     <option value = "">--</option>
                                    <option value = "male">Male</option>
                                    <option value = "female">Female</option>
                        </select>
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">Age</label>
                    <div class="">
                        <input type="number" name="age" placeholder="age" class="form-control">
                    </div>
                </div>

                 <div class="form-group">
                    <label for="password" class="control-label">Department</label>
                    <div class="">
                        <input type="text" name="dpartment" placeholder="department" class="form-control">
                    </div>
                </div>

               
                <div class="form-group">
                    <label for="birthDate" class="control-label">Passport</label>
                    <div class="col-sm-9">
                        <input type="file"  name = "image" >
                    </div>
                </div>
           
                <div class="form-group">
                    <div class="">
                        <button type="submit" class="btn btn-primary btn-block" name = "submit">Submit</button>
                    </div>
                </div>
            </form> <!-- /form -->
             <div class = "modal-footer">
                   
             </div>
                        
                        </div>
                        </div>
                </div>

             </div>