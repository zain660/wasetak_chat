  <div class="profile">
      <div class="page-main-heading sticky-top py-2 px-3 mb-3">

          <!-- Chat Back Button (Visible only in Small Devices) -->
          <button class="btn btn-secondary btn-icon btn-minimal btn-sm text-muted d-xl-none" type="button" data-close="">
              <svg class="hw-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M10 19l-7-7m0 0l7-7m-7 7h18" />
              </svg>
              <!-- <img class="injectable hw-20" src="./../assets/media/heroicons/outline/arrow-left.svg" alt=""> -->
          </button>

          <div class="pl-2 pl-xl-0">
              <h5 class="font-weight-semibold">Settings</h5>
              <p class="text-muted mb-0">Update Personal Information &amp; Settings</p>
          </div>
      </div>

      <div class="container-xl px-2 px-sm-3">
          <div class="row">
              <div class="col">
                  <div class="card mb-3">
                      <div class="card-header">
                          <h6 class="mb-1">Account</h6>
                          <p class="mb-0 text-muted small">Update personal &amp; contact information</p>
                      </div>
                      <form method="post" id="account_info_form">
                          <input type="hidden" id="token" value="{{ csrf_token() }}">
                          <div class="card-body">
                              <div class="row">
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="firstName">Full Name</label>
                                          <input type="text" value="{{ Auth::user()->name }}" name="name"
                                              class="form-control form-control-md" id="firstName"
                                              placeholder="Type your first name" value="Catherine">
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="mobileNumber">Mobile number</label>
                                          <input type="text" name="phone" class="form-control form-control-md"
                                              id="mobileNumber" value="{{ Auth::user()->phone }}"
                                              placeholder="Type your mobile number" value="+01-222-364522">
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="birthDate">Birth date</label>
                                          <input type="date" name="dob" class="form-control form-control-md"
                                              id="birthDate" value="{{ Auth::user()->dob }}" placeholder="dd/mm/yyyy"
                                              value="20/11/1992">
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="emailAddress">Email address</label>
                                          <input type="email" readonly class="form-control form-control-md"
                                              id="emailAddress" placeholder="Type your email address"
                                              value="catherine.richardson@gmail.com">
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="webSite">Website</label>
                                          <input type="text" name="website" class="form-control form-control-md"
                                              id="webSite"value="{{ Auth::user()->website }}"
                                              placeholder="Type your website" value="www.catherichardson.com">
                                      </div>
                                  </div>
                                  <div class="col-12">
                                      <div class="form-group">
                                          <label for="Address">Address</label>
                                          <input type="text" value="{{ Auth::user()->address }}" name="address"
                                              class="form-control form-control-md" id="Address"
                                              placeholder="Type your address"
                                              value="1134 Ridder Park Road, San Fransisco, CA 94851">
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <div class="card-footer d-flex justify-content-end">
                              <button type="reset" class="btn btn-link text-muted mx-1">Reset</button>
                              <button type="submit" class="btn btn-primary">Save Changes</button>
                          </div>
                      </form>
                  </div>

                  <div class="card mb-3">
                      <div class="card-header">
                          <h6 class="mb-1">Social network profiles</h6>
                          <p class="mb-0 text-muted small">Update personal &amp; contact information</p>
                      </div>

                      <div class="card-body">
                          <div class="row">
                              <div class="col-md-6 col-12">
                                  <div class="form-group">
                                      <label for="facebookId">Facebook</label>
                                      <input type="text" class="form-control form-control-md" id="facebookId"
                                          placeholder="Username">
                                  </div>
                              </div>
                              <div class="col-md-6 col-12">
                                  <div class="form-group">
                                      <label for="twitterId">Twitter</label>
                                      <input type="text" class="form-control form-control-md" id="twitterId"
                                          placeholder="Username">
                                  </div>
                              </div>
                              <div class="col-md-6 col-12">
                                  <div class="form-group">
                                      <label for="instagramId">Instagram</label>
                                      <input type="text" class="form-control form-control-md" id="instagramId"
                                          placeholder="Username">
                                  </div>
                              </div>
                              <div class="col-md-6 col-12">
                                  <div class="form-group">
                                      <label for="linkedinId">Linkedin</label>
                                      <input type="text" class="form-control form-control-md" id="linkedinId"
                                          placeholder="Username">
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div class="card-footer d-flex justify-content-end">
                          <button type="button" class="btn btn-link text-muted mx-1">Reset</button>
                          <button type="button" class="btn btn-primary">Save Changes</button>
                      </div>
                  </div>

                  <div class="card mb-3">
                      <div class="card-header">
                          <h6 class="mb-1">Password</h6>
                          <p class="mb-0 text-muted small">Update personal &amp; contact information</p>
                      </div>

                      <div class="card-body">
                          <form>
                              <div class="row">
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="current-password">Current Password</label>
                                          <input type="password" class="form-control form-control-md"
                                              id="current-password" placeholder="Current password" autocomplete="on">
                                      </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="new-password">New Password</label>
                                          <input type="password" class="form-control form-control-md"
                                              id="new-password" placeholder="New password" autocomplete="off">
                                      </div>
                                  </div>
                                  <div class="col-md-6 col-12">
                                      <div class="form-group">
                                          <label for="repeat-password">Repeat Password</label>
                                          <input type="password" class="form-control form-control-md"
                                              id="repeat-password" placeholder="Repeat password" autocomplete="off">
                                      </div>
                                  </div>
                              </div>
                          </form>
                      </div>

                      <div class="card-footer d-flex justify-content-end">
                          <button type="button" class="btn btn-link text-muted mx-1">Reset</button>
                          <button type="button" class="btn btn-primary">Save Changes</button>
                      </div>
                  </div>

              </div>
          </div>
      </div>
  </div>
  </div>
