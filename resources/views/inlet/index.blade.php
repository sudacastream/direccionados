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
                  
                      <div>
                        <a class="button" id="startButton">Iniciar</a>
                        <a class="button" id="resetButton">Resetear</a>
                      </div>
                  
                      <div>
                        <video id="video" width="640" height="480" style="border: 1px solid gray"></video>
                      </div>
                  
                      <div id="sourceSelectPanel" style="display:none">
                        <label for="sourceSelect">C&aacute;mara:</label>
                        <select id="sourceSelect" style="max-width:400px">
                        </select>
                      </div>
                  
                      <label>Resultado:</label>
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
        const codeReader = new ZXing.BrowserMultiFormatReader()
        console.log('ZXing code reader initialized')
        codeReader.listVideoInputDevices()
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
                    console.log(result)
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