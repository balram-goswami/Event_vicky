<div class="container-fluid py-2">
    <style>
        .dashboardbox {
            height: 192px;
            background: #00bcd491;
            border-radius: 9px;
            display: flex;
            align-items: center;
            margin-bottom: auto;
        }

        .fontsize {
            font-size: 12px;
        }
    </style>
<h3 style="color: red;">Hello {{ $currentUser->name }} </h3>
    <div class="row g-1"> <!-- g-4 will add spacing between columns -->
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6 custom-card">
                                <h4 class="fontsize">Gateway To Host Event For Crypque</h4>
                                <p class="description fontsize">
                                    This program helps you create events for your community after completing certification successfully.
                                </p>
                                <a href="{{ route('allevents') }}">
                                    <button class="btn join-btn">Join Program</button>
                                </a>
                            </div>
                            <div class="col-md-6 dashboardbox">
                                <div class="program-card">
                                    <h5>CRYPQUE EVENT CERTIFICATION PROGRAM 2024</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>