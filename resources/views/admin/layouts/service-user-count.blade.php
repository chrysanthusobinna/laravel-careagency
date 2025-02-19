<div class="row">
    <div class="col-xl-4 col-sm-6">
        <div class="card pb-5">
            <div class="card-header card-no-border pb-0">
                <div class="header-top daily-revenue-card">
                    <h4>Total Service users</h4>
                </div>
            </div>
            <div class="card-body pb-0 total-sells">
                <div class="d-flex align-items-center gap-3">
                    <div class="flex-shrink-0">
                        <i class="fa fa-user text-white"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center gap-2">
                            <h2>{{ $totalCount }}  </h2>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6">
        <div class="card pb-5">
            <div class="card-header card-no-border pb-0">
                <div class="header-top daily-revenue-card">
                    <h4>Active Service users</h4>
                </div>
            </div>
            <div class="card-body pb-0 total-sells-2">
                <div class="d-flex align-items-center gap-3">
                    <div class="flex-shrink-0">
                        <i class="fa fa-user text-white"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center gap-2">
                            <h2>{{ $activeCount }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-sm-6">
        <div class="card pb-5">
            <div class="card-header card-no-border pb-0">
                <div class="header-top daily-revenue-card">
                    <h4>Eligble Service Users</h4>
                </div>
            </div>
            <div class="card-body pb-0 total-sells-3">
                <div class="d-flex align-items-center gap-3">
                    <div class="flex-shrink-0">
                        <i class="fa fa-user text-white"></i>
                    </div>
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center gap-2">
                            <h2>{{ $eligibleCount }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


