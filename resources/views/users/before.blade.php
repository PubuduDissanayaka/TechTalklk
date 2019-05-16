<div class="row py-2">
        <div class="col-sm-12 container-fluid">
            <div ></div>
            <button class="bc" data-toggle="tooltip" data-placement="top" title="Change Cover Photo"><i class="fa fa-camera"></i></button>
            <img class="img-fluid covphoto img-thumbnail" src="https://images.pexels.com/photos/414612/pexels-photo-414612.jpeg?cs=srgb&amp;dl=beautiful-beauty-blue-414612.jpg&amp;fm=jpg" alt="Cover Photo">
        </div>
    </div>
    <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-2">
        <img class="propic img-thumbnail mx-auto d-block circle z-index-1" src="{{asset('/img/avatar-1.jpg')}}" alt="profile picture">
            <br>
            <h3 class="text-center">User Name</h3>
            <h5 class="text-center">Designation</h5>
        </div>
        <div class="col-sm-5"></div>
    </div>
    <div class="row">
        <div class="col-sm-12 d-flex justify-content-center">
            {{-- start sub navigation bar --}}
            <nav>
                <div class="nav nav-tabs align-items-center" id="nav-tab" role="tablist">
                  <a class="nav-item nav-link active bg-hover-gradient-primary" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Time Line</a>
                  <a class="nav-item nav-link bg-hover-gradient-primary " id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">About</a>
                  <a class="nav-item nav-link bg-hover-gradient-primary" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Friends</a>
                  <a class="nav-item nav-link bg-hover-gradient-primary" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Photos</a>
                </div>
            </nav>
            {{-- end sub navigation bar --}}
        </div>
    </div>
    <br>

    <div class="row">
        {{-- main content --}}
        <div class="col-sm-9">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row">
                        <div class="col-sm-3">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Intro</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">bio</h6>
                                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <a href="#" class="card-link">Read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-9 poststatus p-3 shadow-lg">
                            <div class="row">
                                <table>
                                    <tr>
                                        <td class="px-2 py-2"><img class="statuspp shadow" src="https://scontent.fcmb2-1.fna.fbcdn.net/v/t1.0-9/46024619_2185219198163793_2572975427970662400_n.jpg?_nc_cat=102&_nc_ht=scontent.fcmb2-1.fna&oh=f935d2334c4fe016f7bb9044a0e2eabc&oe=5CBB4997" alt=""></td>
                                        <td style="width: 100%" class="shadow-none statuspp px">
                                            <p class="py"><strong>User Name</strong></p>
                                            <p><small>Posted at</small></p>
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <div class="row">
                                    <div class="col-sm-12 px">
                                        <form action="" method="post">
                                            <textarea class="form-control form-control" name="" id="" rows="7"></textarea>
                                            <br>
                                            <a><button class="btn statusbtn bg-hover-gradient-primary btn form-control" type="submit">Post</button></a>
                                    </form>
                                    </div>
                                    <div class="col-sm-12">
                                    </div>
                                </div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">2nd</div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">3rd</div>
                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">4rd</div>
            </div>
        </div>
        {{-- end main content --}}
        <div class="col-sm-3">
            <div class="card">
                <img class="card-img-top img-thumbnail mx-auto d-block rounded-circle procardimg" src="https://scontent.fcmb2-1.fna.fbcdn.net/v/t1.0-9/46024619_2185219198163793_2572975427970662400_n.jpg?_nc_cat=102&_nc_ht=scontent.fcmb2-1.fna&oh=f935d2334c4fe016f7bb9044a0e2eabc&oe=5CBB4997" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
