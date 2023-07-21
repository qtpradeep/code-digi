<?php include("header.php");?>

<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Dashboard</h1>
          </div>
          <div class="row">
            <div class="col-xl-3 col-lg-6">
              <div class="card">
                <div class="card-body card-type-3">
                  <div class="row">
                    <div class="col">
                      <h6 class="text-muted mb-0">Influecners</h6>
                      <span class="fw-bold mb-0"><?php $inf= $conn->totalInfluencers($user['id']);
                      echo(isset($inf))? $inf : "0"; ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="card-circle l-bg-orange text-white">
                        <i class="fas fa-user"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <!--<span class="text-success me-2"><i class="fa fa-arrow-up"></i> 10%</span>-->
                    <!--<span class="text-nowrap">Since last month</span>-->
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card">
                <div class="card-body card-type-3">
                  <div class="row">
                    <div class="col">
                      <h6 class="text-muted mb-0">Campaigns</h6>
                      <span class="fw-bold mb-0"><?php echo $conn->totalCampaigns($user['id']);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="card-circle l-bg-cyan text-white">
                        <i class="fas fa-briefcase"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    <!--<span class="text-success me-2"><i class="fa fa-arrow-up"></i> 7.8%</span>-->
                    <!--<span class="text-nowrap">Since last month</span>-->
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card">
                <div class="card-body card-type-3">
                  <div class="row">
                    <div class="col">
                      <h6 class="text-muted mb-0">Subscriptions</h6>
                      <span class="fw-bold mb-0"><?php echo $conn->totalSubscriptions($user['id']);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="card-circle l-bg-green text-white">
                        <i class="fas fa-dollar-sign"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                   
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-6">
              <div class="card">
                <div class="card-body card-type-3">
                  <div class="row">
                    <div class="col">
                      <h6 class="text-muted mb-0">My Referals</h6>
                      <span class="fw-bold mb-0"><?php echo $conn->totalReferals($user['userid']);?></span>
                    </div>
                    <div class="col-auto">
                      <div class="card-circle l-bg-purple text-white">
                        <i class="fas fa-users"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                   
                  </p>
                </div>
              </div>
            </div>
          </div>
         
        </section>
        <!--<div class="settingSidebar">-->
        <!--  <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>-->
        <!--  </a>-->
        <!--  <div class="settingSidebar-body ps-container ps-theme-default">-->
        <!--    <div class=" fade show active">-->
        <!--      <div class="setting-panel-header">Setting Panel-->
        <!--      </div>-->
        <!--      <div class="p-15 border-bottom">-->
        <!--        <h6 class="font-medium m-b-10">Select Layout</h6>-->
        <!--        <div class="selectgroup layout-color w-50">-->
        <!--          <label class="selectgroup-item">-->
        <!--            <input type="radio" name="value" value="1" class="selectgroup-input select-layout" checked>-->
        <!--            <span class="selectgroup-button">Light</span>-->
        <!--          </label>-->
        <!--          <label class="selectgroup-item">-->
        <!--            <input type="radio" name="value" value="2" class="selectgroup-input select-layout">-->
        <!--            <span class="selectgroup-button">Dark</span>-->
        <!--          </label>-->
        <!--        </div>-->
        <!--      </div>-->
        <!--      <div class="p-15 border-bottom">-->
        <!--        <h6 class="font-medium m-b-10">Sidebar Color</h6>-->
        <!--        <div class="selectgroup selectgroup-pills sidebar-color">-->
        <!--          <label class="selectgroup-item">-->
        <!--            <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">-->
        <!--            <span class="selectgroup-button selectgroup-button-icon" data-bs-toggle="tooltip"-->
        <!--              data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>-->
        <!--          </label>-->
        <!--          <label class="selectgroup-item">-->
        <!--            <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>-->
        <!--            <span class="selectgroup-button selectgroup-button-icon" data-bs-toggle="tooltip"-->
        <!--              data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>-->
        <!--          </label>-->
        <!--        </div>-->
        <!--      </div>-->
        <!--      <div class="p-15 border-bottom">-->
        <!--        <h6 class="font-medium m-b-10">Color Theme</h6>-->
        <!--        <div class="theme-setting-options">-->
        <!--          <ul class="choose-theme list-unstyled mb-0">-->
        <!--            <li title="white" class="active">-->
        <!--              <div class="white"></div>-->
        <!--            </li>-->
        <!--            <li title="cyan">-->
        <!--              <div class="cyan"></div>-->
        <!--            </li>-->
        <!--            <li title="black">-->
        <!--              <div class="black"></div>-->
        <!--            </li>-->
        <!--            <li title="purple">-->
        <!--              <div class="purple"></div>-->
        <!--            </li>-->
        <!--            <li title="orange">-->
        <!--              <div class="orange"></div>-->
        <!--            </li>-->
        <!--            <li title="green">-->
        <!--              <div class="green"></div>-->
        <!--            </li>-->
        <!--            <li title="red">-->
        <!--              <div class="red"></div>-->
        <!--            </li>-->
        <!--          </ul>-->
        <!--        </div>-->
        <!--      </div>-->
        <!--      <div class="p-15 border-bottom">-->
        <!--        <div class="theme-setting-options">-->
        <!--          <label>-->
        <!--            <span class="control-label p-r-20">Mini Sidebar</span>-->
        <!--            <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"-->
        <!--              id="mini_sidebar_setting">-->
        <!--            <span class="custom-switch-indicator"></span>-->
        <!--          </label>-->
        <!--        </div>-->
        <!--      </div>-->
        <!--      <div class="p-15 border-bottom">-->
        <!--        <div class="theme-setting-options">-->
        <!--          <div class="disk-server-setting m-b-20">-->
        <!--            <p>Disk Space</p>-->
        <!--            <div class="sidebar-progress">-->
        <!--              <div class="progress" data-height="5">-->
        <!--                <div class="progress-bar l-bg-green" role="progressbar" data-width="80%" aria-valuenow="80"-->
        <!--                  aria-valuemin="0" aria-valuemax="100"></div>-->
        <!--              </div>-->
        <!--              <span class="progress-description">-->
        <!--                <small>26% remaining</small>-->
        <!--              </span>-->
        <!--            </div>-->
        <!--          </div>-->
        <!--          <div class="disk-server-setting">-->
        <!--            <p>Server Load</p>-->
        <!--            <div class="sidebar-progress">-->
        <!--              <div class="progress" data-height="5">-->
        <!--                <div class="progress-bar l-bg-orange" role="progressbar" data-width="58%" aria-valuenow="25"-->
        <!--                  aria-valuemin="0" aria-valuemax="100"></div>-->
        <!--              </div>-->
        <!--              <span class="progress-description">-->
        <!--                <small>Highly Loaded</small>-->
        <!--              </span>-->
        <!--            </div>-->
        <!--          </div>-->
        <!--        </div>-->
        <!--      </div>-->
        <!--      <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">-->
        <!--        <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">-->
        <!--          <i class="fas fa-undo"></i> Restore Default-->
        <!--        </a>-->
        <!--      </div>-->
        <!--    </div>-->
        <!--  </div>-->
        <!--</div>-->
      </div>
      
      <?php include("footer.php");?>