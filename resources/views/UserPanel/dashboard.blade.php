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
    @if($adminEvents && $adminEvents->isNotEmpty())
    <h3>Events By Admin</h3>
    @endif
    <div class="row g-1">
        @foreach($adminEvents as $data)
        <div class="col-lg-6">
            <div class="card" style="min-height: 223px;">
                <div class="card-body">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6 custom-card">
                                <h4 class="fontsize">{{ $data->event_name }}</h4>
                                <p class="description fontsize">{{ $data->description }}</p>
                                <h4 class="fontsize">Event By:- {{ $data->user->name }}</h4>
                                <h4 class="fontsize">Event Type:- {{ $data->eventType->name }}</h4>

                                @php

                                $paymentHistoryForEvent = null;

                                // Ensure $PaymentHistory is not null before querying further
                                if ($PaymentHistory && $PaymentHistory->isNotEmpty()) {
                                $paymentHistoryForEvent = $PaymentHistory->where('event_id', $data->id)->first();
                                }
                                @endphp
                                @if($paymentHistoryForEvent && $paymentHistoryForEvent->status == 2)
                                <a href="{{ route('courespaymentpage', $data->id) }}">
                                    <button class="btn join-btn">View Event</button>
                                </a>
                                @elseif($paymentHistoryForEvent === NULL)
                                <a href="{{ route('courespaymentpage', $data->id) }}">
                                    <button class="btn join-btn">View Event</button>
                                </a>
                                @else
                                <div class="card-footer text-center">
                                    <h3 class="btn btn-primary">We are processing your payment<br> Status Update Shortly</h3>
                                </div>
                                @endif

                            </div>
                            <div class="col-md-6">
                                <div class="program-card">
                                    <img src="{{ asset('storage/event_images/' . $data->image_path) }}"
                                        class="card-img-top"
                                        alt="Event Image"
                                        style="padding: 12px; border-radius: 18px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <br>
    @if($otherEvents && $otherEvents->isNotEmpty())
    <h3>Other Users Events</h3>
    @endif
    <div class="row g-1">
        @foreach($otherEvents as $data)
        <div class="col-lg-6">
            <div class="card" style="min-height: 223px;">
                <div class="card-body">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-md-6 custom-card">
                                <?php
                                $username = DB::table('users')
                                    ->where('id', $data->user_id)
                                    ->value('name');
                                $eventname = DB::table('event_types')
                                    ->where('id', $data->event_type)
                                    ->value('name');
                                ?>

                                <h4 class="fontsize">{{ $data->event_name }}</h4>
                                <p class="description fontsize">{{ $data->description }}</p>
                                <h4 class="fontsize">Event By:- {{ $username }}</h4>
                                <h4 class="fontsize">Event Type:- {{ $eventname }}</h4>

                                @php

                                $paymentHistoryForEvent = null;

                                // Ensure $PaymentHistory is not null before querying further
                                if ($PaymentHistory && $PaymentHistory->isNotEmpty()) {
                                $paymentHistoryForEvent = $PaymentHistory->where('event_id', $data->id)->first();
                                }
                                @endphp
                                @if($paymentHistoryForEvent && $paymentHistoryForEvent->status == 2)
                                <a href="{{ route('courespaymentpage', $data->id) }}">
                                    <button class="btn join-btn">View Event</button>
                                </a>
                                @elseif($paymentHistoryForEvent === NULL)
                                <a href="{{ route('courespaymentpage', $data->id) }}">
                                    <button class="btn join-btn">View Event</button>
                                </a>
                                @else
                                <div class="card-footer text-center">
                                    <h3 class="btn btn-primary">We are processing your payment<br> Status Update Shortly</h3>
                                </div>
                                @endif

                            </div>
                            <div class="col-md-6">
                                <div class="program-card">
                                    <img src="{{ asset('storage/event_images/' . $data->image_path) }}"
                                        class="card-img-top"
                                        alt="Event Image"
                                        style="padding: 12px; border-radius: 18px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <br>
    @if($userEvents && $userEvents->isNotEmpty())
    <h3>My Events</h3>
    @endif
    <div class="row g-1">
        @foreach($userEvents as $data)
        <div class="col-lg-6">
            <div class="card" style="min-height: 223px;">
                <div class="card-body">
                    <div class="container">
                        <div class="row align-items-center">
                            <i class="fa fa-share"></i>
                            <div class="col-md-6 custom-card">
                                <h4 class="fontsize">{{ $data->event_name }}</h4>
                                <p class="description fontsize">{{ $data->description }}</p>
                                <a href="{{ route('viewUserEvent',  $data->id ) }}">
                                    <button class="btn join-btn">View Event</button>
                                </a>
                            </div>
                            <div class="col-md-6">
                                <div class="program-card">
                                    <img src="{{ asset('storage/event_images/' . $data->image_path) }}"
                                        class="card-img-top"
                                        alt="Event Image"
                                        style="padding: 12px; border-radius: 18px;">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

</div>