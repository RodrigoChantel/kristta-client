<div class="alert alert-danger mt-4" role="alert">
    No momento, você não possui permissão para essa ação.
</div>
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4 class="header-title">Project Status</h4>
        <div class="dropdown">
            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item">Weekly Report</a>
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item">Monthly Report</a>
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                <!-- item-->
                <a href="javascript:void(0);" class="dropdown-item">Settings</a>
            </div>
        </div>
    </div>

    <div class="card-body pt-0">
        <div class="mt-3 mb-4 chartjs-chart" style="height: 204px;">
            <canvas id="project-status-chart" data-colors="#0acf97,#727cf5,#fa5c7c" width="448" style="box-sizing: border-box; display: block; height: 204px; width: 224px;" height="408"></canvas>
        </div>

        <div class="row text-center mt-2 py-2">
            <div class="col-sm-4">
                <div class="my-2 my-sm-0">
                        <i class="mdi mdi-trending-up text-success mt-3 h3"></i>
                    <h3 class="fw-normal">
                        <span>64%</span>
                    </h3>
                    <p class="text-muted mb-0">Completed</p>
                </div>
                
            </div>
            <div class="col-sm-4">
                <div class="my-2 my-sm-0">
                        <i class="mdi mdi-trending-down text-primary mt-3 h3"></i>
                    <h3 class="fw-normal">
                        <span>26%</span>
                    </h3>
                    <p class="text-muted mb-0"> In-progress</p>
                </div>
                
            </div>
            <div class="col-sm-4">
                <div class="my-2 my-sm-0">
                        <i class="mdi mdi-trending-down text-danger mt-3 h3"></i>
                    <h3 class="fw-normal">
                        <span>10%</span>
                    </h3>
                    <p class="text-muted mb-0"> Behind</p>
                </div>
            </div>
        </div>
        <!-- end row-->

    </div> <!-- end card body-->
</div>