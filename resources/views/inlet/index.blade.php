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

                    <section id="demo-content">
                        <div class="md:w-1/2 w-full h-12">
                            <div class="w-1/6 float-left">
                                <a id="startButton" class="w-full block text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 focus:outline-none"><i class="fa-solid fa-barcode"></i></a>
                            </div>
                            <div id="sourceSelectPanel" class="w-4/6 float-left px-2">
                                <select id="sourceSelect" class="w-full bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5"></select>
                            </div>
                            <div class="w-1/6 float-left">
                                <a id="resetButton" class="w-full block text-center text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 focus:outline-none"><i class="fa-solid fa-arrows-rotate"></i></a>
                            </div>
                        </div>
                        <div class="md:w-1/2 w-full">
                            <video id="video" class="w-full bg-gray-50 rounded-md"></video>
                        </div>
                        <form id="searchToken" action="{{ route('inlet.search') }}" method="POST">
                            @csrf
                            <div class="flex my-4">
                                <div class="relative w-full">
                                    <input type="search" name="token" id="search" class="block p-2.5 w-full z-20 text-sm text-gray-900 border-gray-200 bg-gray-50 border-1 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Token Pass" required autocomplete="off">
                                    <button type="submit" class="absolute top-0 right-0 py-2.5 px-4 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">
                                        <i class="fa-solid fa-magnifying-glass"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                    </section>


            </div>
        </div>
    </div>
    <audio id="audio">
        <source type="audio/mp3" src="/beep.mp3">
    </audio>
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
                    audio.play();
                    document.getElementById('search').value = result.text;
                    document.getElementById('searchToken').submit();
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