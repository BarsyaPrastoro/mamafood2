<div id="sidebar-wrapper">
    <ul class="sidebar-nav">
        <li class="sidebar-brand">
            <br>
        </li>
        <li class="sidebar-brand">
            <img width="175px" src="<?php echo base_url() . 'public/images/LOGONAMA.png'; ?>" /> 
        </li>
        <li class="<?= ($nama_hal == 'adm-pegawai')?'active':'' ?> cs">
            <a href="/admin/pegawai">Akun Pegawai</a>
        </li>
        <li class="<?= ($nama_hal == 'adm-user')?'active':'' ?> cs">
            <a href="/admin/user">Akun User</a>
        </li>                
        <li class="form-inline" style="margin-top:300px; margin-left:40px">
            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target=".bd-example-modal-lg">Create Account</button>
        </li>
    </ul>
</div>
<div class="modal fade bd-example-modal-lg" tabindex="" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content" style="padding:10px;">
                        <div class="row">
                            <div class="col-md-12">
                                <h2>Create Account</h2>
                            </div>
                        </div>
                        <hr>
                        <form method="POST">
                            <div class="row">
                                <div class="col-md-8" style="border-right:1px solid lightgray">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                            </span>
                                            <input type="text" class="form-control" name="name"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Posisi</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-map-marker"></span>
                                            </span>
                                            <select class="form-control" id="status" name="status">
                                              <option value="1" id="1" name="1">Applicant Reviewer</option>
                                              <option value="2" id="2" name="2">Profitable Measure</option>
                                              <option value="3" id="3" name="3">Customer Service</option>
                                              <option value="4" id="4" name="4">Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Email</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                            </span>
                                            <input type="text" class="form-control" name="email"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Password</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span>
                                            </span>
                                            <input type="text" class="form-control" name="password"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Telepon</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span>
                                            </span>
                                            <input type="text" class="form-control" name="telepon"/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Alamat</label>
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span>
                                            </span>
                                            <input type="text" class="form-control" name="alamat"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">                                
                                    <div class="row">
                                        <div class="col-md-12" style="text-align:center">
                                            <div class="form-group">
                                                <input id="submit" name="submit" type="submit" class="btn btn-secondary" value="SUBMIT" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                  </div>
                </div>