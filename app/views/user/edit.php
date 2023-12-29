<?php

use MyApp\Core\Message;

$data = Message::getData();
if ($data) {
    $user['id_tmu'] = $data['id_tmu'];
    $user['name_tmu'] = $data['name_tmu'];
    $user['username_tmu'] = $data['username_tmu'];
    $user['role_tmu'] = $data['role_tmu'];
    $user['gender_tmu'] = $data['gender_tmu'];
    $user['email_tmu'] = $data['email_tmu'];
    $user['password_tmu'] = $data['password_tmu'];
    $user['address_tmu'] = $data['address_tmu'];
    $user['contact_tmu'] = $data['contact_tmu'];
}

Message::flash();
?>
<div class="container-fluid">
    <main id="main" class="main">
        <section class="section dashboard">
            <div class="pagetitle">
                <h1><?= $title ?></h1>
                <nav>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/home" style="color:#003CF0">Home</a></li>
                        <li class="breadcrumb-item"><a href="<?= BASEURL; ?>/user" style="color:#003CF0">User</a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </nav>
            </div><!-- End Page Title -->
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="pagetitle">
                                <h2>Form <?= $title ?></h2>
                            </div><!-- End Page Title -->
                            <br>
                            <!-- Multi Columns Form -->
                            <form class="form-sample" action="<?= BASEURL; ?>/user/edit_user" method="POST" id="form">
                                <input type="hidden" name="id_tmu" value="<?= $user['id_tmu'] ?>">
                                <input type="hidden" name="mode" id="mode" value="update">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="name_tmu" class="col-sm-3 col-form-label">Nama Lengkap</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="name_tmu" class="form-control" id="name_tmu" value="<?= $user['name_tmu'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="username_tmu" class="col-sm-3 col-form-label">Username</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="username_tmu" class="form-control" id="username_tmu" aria-describedby="inputGroupPrepend" value="<?= $user['username_tmu'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="email_tmu" class="col-sm-3 col-form-label">Email</label>
                                            <div class="col-sm-9">
                                                <input type="email" name="email_tmu" class="form-control" id="email_tmu" value="<?= $user['email_tmu'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="password_tmu" class="col-sm-3 col-form-label">Password</label>
                                            <div class="col-sm-9">
                                                <input type="password" name="password_tmu" class="form-control" id="password_tmu" value="<?= $user['password_tmu'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="gender_tmu" class="col-sm-3 col-form-label">Gender</label>
                                            <div class="col-sm-9">
                                                <select id="gender_tmu" name="gender_tmu" class="form-control">
                                                    <option selected><?= $user['gender_tmu'] ?></option>
                                                    <option value="Laki-Laki">Laki-Laki</option>
                                                    <option value="Perempuan">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="role_tmu" class="col-sm-3 col-form-label">Role</label>
                                            <div class="col-sm-9">
                                                <select id="role_tmu" name="role_tmu" class="form-control">
                                                    <option selected><?= $user['role_tmu'] ?></option>
                                                    <option value="Owner">Owner</option>
                                                    <option value="Admin">Admin</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label for="address_tmu" class="col-sm-3 col-form-label">Alamat</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="address_tmu" class="form-control" id="address_tmu" placeholder="1234 Main St" value="<?= $user['address_tmu'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group row">
                                            <label class="col-sm-3 col-form-label" for="contact_tmu">Contact</label>
                                            <div class="col-sm-9">
                                                <input type="text" name="contact_tmu" class="form-control" id="contact_tmu" placeholder="+62" value="<?= $user['contact_tmu'] ?>" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="footer">
                                    <button class="btn btn-success save-btn" type="submit" onclick="edit('update')" style="margin-right: 5px;">
                                        <span><i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-refresh" width="20" height="20" viewBox="3 3 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                    <path d="M20 11a8.1 8.1 0 0 0 -15.5 -2m-.5 -4v4h4" />
                                                    <path d="M4 13a8.1 8.1 0 0 0 15.5 2m.5 4v-4h-4" />
                                                </svg></i></span>
                                        <span class='hide-menu'>Update</span>
                                    </button>
                                    <button type="button" class="btn btn-danger" style="margin-right: 5px;">
                                    <a href="<?= BASEURL ?>/user" style="color:white">
                                            <span><i><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="3 3 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M18 6l-12 12" />
                                                        <path d="M6 6l12 12" />
                                                    </svg></i></span>
                                            <span class='hide-menu'>Cancel</span>
                                        </a>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</div>