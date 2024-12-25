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
    <h3>Events By Admin</h3>
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
                                <a href="{{ route('courespaymentpage', $data->id) }}">
                                    <button class="btn join-btn">Join Event</button>
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
    <br>
    <h3>Event I Created</h3>
    <div class="row g-1">
        @foreach($userEvents as $data)
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
                                <a href="{{ route('referredregister',  $data->user_id ) }}" id="copyLinkBtn" target="_blank">
                                    <button class="btn join-btn" onclick="copyLink(event)">Share Event</button>
                                </a>

                                <!-- Invisible text area to copy the link -->
                                <input type="text" value="{{ route('referredregister', $data->user_id ) }}" id="linkToCopy" style="position: absolute; left: -9999px;">
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

<script>
    function copyLink(event) {
        event.preventDefault(); // Prevent the default link behavior
        var copyText = document.getElementById("linkToCopy");

        // Select the text field
        copyText.select();
        copyText.setSelectionRange(0, 99999); // For mobile devices

        // Copy the text inside the text field
        document.execCommand("copy");

        // Alert the copied text (optional, you can replace this with a custom message)
        alert("Event link copied to clipboard: " + copyText.value);

        // Optionally, open the link in a new tab after copying
        window.open(copyText.value, '_blank');
    }
</script>