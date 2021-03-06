<script>
    var script = document.createElement("script");
    script.type = "text/javascript";

    script.addEventListener("load", function (event) {
      const config = {
        name: "{{ auth()->user()->name }}",
        meetingId: "LMS-SPM{{ $id }}",
        apiKey: "eaf8eb4d-c18a-4b71-a34d-e8d2d70c9b50",

        containerId: null,

        micEnabled: true,
        webcamEnabled: true,
        participantCanToggleSelfWebcam: true,
        participantCanToggleSelfMic: true,

        chatEnabled: true,
        screenShareEnabled: true,

        /*

       Other Feature Properties

        */
      };

      const meeting = new VideoSDKMeeting();
      meeting.init(config);
    });

    script.src =
      "https://sdk.videosdk.live/rtc-js-prebuilt/0.1.29/rtc-js-prebuilt.js";
    document.getElementsByTagName("head")[0].appendChild(script);
  </script>
