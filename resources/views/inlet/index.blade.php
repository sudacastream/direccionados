@section('title', 'Admisión - Congreso Direccionados')
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admisión') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-5">


                <main class="wrapper" style="padding-top:2em">

                    <section class="container" id="demo-content">
                      <h1 class="title">Scan 1D/2D Code from Video Camera</h1>
                  
                      <p>This example shows how to scan any supported 1D/2D code with ZXing javascript library from the device video
                        camera. If more
                        than one video input devices are available (for example front and back camera) the example shows how to read
                        them and use a select to change the input device.</p>
                  
                      <div>
                        <a class="button" id="startButton">Start</a>
                        <a class="button" id="resetButton">Reset</a>
                      </div>
                  
                      <div>
                        <video id="video" width="640" height="480" style="border: 1px solid gray"></video>
                      </div>
                  
                      <div id="sourceSelectPanel" style="display:none">
                        <label for="sourceSelect">Change video source:</label>
                        <select id="sourceSelect" style="max-width:400px">
                        </select>
                      </div>
                  
                      <label>Result:</label>
                      <pre><code id="result"></code></pre>
                    </section>
                  
                  </main>



            </div>
        </div>
    </div>
    <script src="https://unpkg.com/@zxing/library@latest"></script>
    <script>
        window.addEventListener('load', function () {
            let selectedDeviceId;
            var hints = new Map();
            hints.set(ZXing.DecodeHintType.ASSUME_GS1, true)
            hints.set(ZXing.DecodeHintType.TRY_HARDER, true)
            const codeReader = new ZXing.BrowserMultiFormatReader(hints)
            console.log('ZXing code reader initialized')
            codeReader.getVideoInputDevices()
            .then((videoInputDevices) => {
            const sourceSelect = document.getElementById('sourceSelect')
            selectedDeviceId = videoInputDevices[0].deviceId
            if (videoInputDevices.length >= 1) {
                videoInputDevices.forEach((element) => {
                const sourceOption = document.createElement('option')
                sourceOption.text = element.label
                sourceOption.value = element.deviceId
                sourceSelect.appendChild(sourceOption)
                })

                sourceSelect.onchange = () => {
                selectedDeviceId = sourceSelect.value;
                };

                const sourceSelectPanel = document.getElementById('sourceSelectPanel')
                sourceSelectPanel.style.display = 'block'
            }

            document.getElementById('startButton').addEventListener('click', () => {
                codeReader.decodeFromVideoDevice(selectedDeviceId, 'video', (result, err) => {
                if (result) {
                    console.log(result.getText())
                    document.getElementById('result').textContent = result.text
                }
                if (err && !(err instanceof ZXing.NotFoundException)) {
                    console.error(err)
                    document.getElementById('result').textContent = err
                }
                })
                console.log(`Started continous decode from camera with id ${selectedDeviceId}`)
            })

            document.getElementById('resetButton').addEventListener('click', () => {
                codeReader.reset()
                document.getElementById('result').textContent = '';
                console.log('Reset.')
            })

            })
            .catch((err) => {
            console.error(err)
            })
        })
    </script>
</x-app-layout>