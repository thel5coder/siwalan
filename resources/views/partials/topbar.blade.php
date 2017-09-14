<div class="navbar navbar-inverse">
    <div class="navbar-header">
        <a class="navbar-brand" href="{{route('dashboard')}}"><img src="{{url('public/img/logopemprovjatim.png')}}"
                                                                   alt=""></a>

        <ul class="nav navbar-nav pull-right visible-xs-block">
            <li><a data-toggle="collapse" data-target="#navbar-mobile"><i class="icon-tree5"></i></a></li>
        </ul>
    </div>

    <div class="navbar-collapse collapse" id="navbar-mobile">

        <p class="navbar-text"><span class="label bg-success-400">Online</span></p>

        <ul class="nav navbar-nav navbar-right">

            <li class="dropdown dropdown-user">
                <a class="dropdown-toggle" data-toggle="dropdown">
                    <img src="assets/images/placeholder.jpg" alt="">
                    Selamat Datang,
                    <span>{{auth()->user()->nama}}</span>
                    <i class="caret"></i>
                </a>

                <ul class="dropdown-menu dropdown-menu-right">
                    <li><a href="#" data-toggle="modal" data-target="#modalUbahEmail"><i class="icon-mail5"></i>Ubah
                            Email</a></li>
                    <li><a href="#" data-toggle="modal" data-target="#modalUbahPassword"><i class="icon-key"></i> Ubah
                            Password</a></li>
                </ul>
            </li>
            <li><a href="{{route('userLogout')}}"><i class="icon-exit"></i> Keluar</a></li>
        </ul>
    </div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="modalUbahPassword">
    <div class="modal-dialog" role="document">
        <form class="form-horizontal" id="frmUbahPassword">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Masukkan Password Baru</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-3">Password</label>
                        <div class="col-md-5">
                            <input type="password" class="form-control" id="password" name="password" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Konfirmasi Password</label>
                        <div class="col-md-5">
                            <input type="password" class="form-control" id="konfirmasiPassword" name="konfirmasiPassword"
                                   required/>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="modal fade" tabindex="-1" role="dialog" id="modalUbahEmail">
    <div class="modal-dialog" role="document">
        <form class="form-horizontal" id="frmUbahEmail">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Masukkan Email Baru</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-md-4">Email</label>
                        <div class="col-md-5">
                            <input type="text" class="form-control" id="email" name="email" required/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-4">Alasan Penggantian Email</label>
                        <div class="col-md-5">
                            <textarea type="text" class="form-control" id="alasan" name="alasan"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </div>
            </div><!-- /.modal-content -->
        </form>
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
