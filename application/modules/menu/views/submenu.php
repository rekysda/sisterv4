<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      <?= $title; ?>
      <small>to manage <?= $title; ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active"><?= $title; ?></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title"><?= $title; ?></h3>
      </div>
      <div class="box-body">

        <?= $this->session->flashdata('message') ?>
        <?php $menu_idv = set_value('menu_id'); ?>
        <form action="<?php base_url('menu/submenu') ?>" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="name">Sub Menu*</label>
            <input type="text" class="form-control <?= form_error('title') ? 'is-invalid' : '' ?>" id="title" name="title" placeholder="Submenu title" value="<?= set_value('title'); ?>">
            <div class="invalid-feedback">
              <?= form_error('title') ?>
            </div>
          </div>
          <div class="form-group">
            <label for="name">Menu*</label>
            <select name="menu_id" id="menu_id" class="form-control <?= form_error('menu_id') ? 'is-invalid' : '' ?>">
              <option value="">== Menu ==</option>
              <?php foreach ($menu as $m) : ?>
                <option value="<?= $m['id']; ?>" <?= $m['id'] == $menu_idv ? ' selected="selected"' : ''; ?>><?= $m['menu']; ?></option>
              <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
              <?= form_error('menu_id') ?>
            </div>
          </div>
          <div class="form-group">
            <label for="name">Url*</label>
            <input type="text" class="form-control <?= form_error('url') ? 'is-invalid' : '' ?>" id="url" name="url" placeholder="Submenu url" value="<?= set_value('url'); ?>">
            <div class="invalid-feedback">
              <?= form_error('url') ?>
            </div>
          </div>
          <div class="form-group">
            <label for="name">Sort*</label>
            <input type="text" class="form-control <?= form_error('sort') ? 'is-invalid' : '' ?>" id="sort" name="sort" placeholder="Submenu sort" value="<?= set_value('sort'); ?>">
            <div class="invalid-feedback">
              <?= form_error('sort') ?>
            </div>
          </div>
          <div class="form-group">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
              <label class="form-check-label" for="is_active">
                Active?
              </label>
            </div>
          </div>
          <input class="btn btn-success" type="submit" name="btn" value="Save" />&nbsp; <a href="<?= base_url('menu/submenu'); ?> " class="btn btn-warning">Cancel</a>
        </form>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">List</h3>
      </div>
      <div class="box-body">

        <table class="table table-hover">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Menu</th>
              <th scope="col">Url</th>
              <th scope="col">Sort</th>
              <th scope="col">Active</th>
              <th scope="col">Action</th>

            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($subMenu as $sm) : ?>
              <tr>
                <th scope="row"><?= $i; ?></th>
                <td><?= $sm['title']; ?></td>
                <td><?= $sm['menu']; ?></td>
                <td><?= $sm['url']; ?></td>
                <td><?= $sm['sort']; ?></td>
                <td><?= $sm['is_active']; ?></td>
                <td>
                  <a href="<?= base_url('menu/submenuedit/' . $sm['id']); ?>" class="btn btn-success btn-xs">Edit</a>
                  <a href="<?= base_url('menu/submenuhapus/' . $sm['id']); ?>" class="btn btn-danger btn-xs" onclick="return confirm('Anda yakin ? data tidak dapat dikembalikan lagi...');">Delete</a>
                </td>

              </tr>
              <?php $i++; ?>
            <?php endforeach; ?>
          </tbody>
        </table>

      </div>
      <!-- /.box-body -->
    </div>
    <!-- /.box -->

    <!-- Modal -->
    <div class="modal fade" id="newSubMenuModal" tabindex="-1" role="dialog" aria-labelledby="newSubMenuModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="newSubMenuModalLabel">Add New Sub Menu</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form action="<?= base_url('menu/submenu'); ?>" method="post">
            <div class="modal-body">
              <div class="form-group">
                <input type="text" class="form-control" id="title" name="title" placeholder="Submenu title">
              </div>
              <div class="form-group">
                <select name="menu_id" id="menu_id" class="form-control">
                  <option value="">Select Menu</option>
                  <?php foreach ($menu as $m) : ?>
                    <option value="<?= $m['id']; ?>"><?= $m['menu']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="url" name="url" placeholder="Submenu url">
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="icon" name="icon" placeholder="Submenu icon">
              </div>
              <div class="form-group">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="1" name="is_active" id="is_active" checked>
                  <label class="form-check-label" for="is_active">
                    Active?
                  </label>
                </div>

              </div>

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add</button>
            </div>
          </form>
        </div>
      </div>
    </div>


  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->