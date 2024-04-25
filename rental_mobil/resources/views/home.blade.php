@extends('template')

@section('content')
@include('navbar')
<div class="w-11/12 flex flex-col justify-center items-center m-2">
    @foreach($dataAllCars as $car)
    
<div href="#" class="flex w-full flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
    <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg" src="../data_file/{{$car->foto}}" alt="">
    <div class="flex flex-col justify-between w-full p-4 leading-normal">
        <div class="text-white font-medium m-2 flex flex-row justify-between">
            {{$car->owner->name}}
             <span class="bg-green-100 ml-2 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-green-400 border border-green-400">
                 @if($car->tersedia===1) available @else not available @endif
             </span>
         </div>
        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$car->model}} ({{$car->tahun}})</h5>
        <div class="flex items-center mt-2.5 mb-5 bg-slate-500 p-1 rounded-md text-white">
            <table>
                <tr><td>Merk</td><td>:</td><td>{{$car->merek}}</td></tr>
                <tr><td>Transmisi</td><td>:</td><td>{{$car->transmisi}}</td></tr>
                <tr><td>Jenis</td><td>:</td><td>{{$car->jenis}}</td></tr>
                <tr><td>Bahan Bakar</td><td>:</td><td>{{$car->bahan_bakar}}</td></tr>
                <tr><td>No. Plat</td><td>:</td><td>{{$car->no_plat}}</td></tr>
            </table>
    </div>
    <div class="flex items-center justify-between">
        <span class="text-xl font-bold text-gray-900 dark:text-white">Rp. {{$car->tarif}}/hari</span>
        <button data-modal-target="crud-modal{{$car->id_car}}" data-modal-toggle="crud-modal{{$car->id_car}}" class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button">
            Sewa
          </button>
        
    </div>
    </div>
</div>


<!-- Main modal -->
<div id="crud-modal{{$car->id_car}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                    Sewa mobil
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal{{$car->id_car}}">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <form class="p-4 md:p-5" action="/newtransaksi" method="POST">
                    @CSRF
                    <div class="grid gap-4 mb-4 grid-cols-2">
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input type="text"  id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly value="{{Auth::user()->name}}">
                        </div>
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Mobil</label>
                            <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly value="{{$car->model}}">
                        </div>
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">NO Plat</label>
                            <input type="text"  id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" readonly value="{{$car->no_plat}}">
                        </div>
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">tanggal mulai sewa</label>
                            <input datepicker name="mulai_pinjam" id="tanggal_mulai{{$car->id_car}}" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full h-10 ps-10 p-2.5 dark:bg-gray-500 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="tanggal mulai sewa">
                        </div>
                        <div class="col-span-2">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">tanggal pengembalian</label>
                            <input datepicker name="selesai_pinjam" id="tanggal_pengembalian{{$car->id_car}}" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full h-10 ps-10 p-2.5 dark:bg-gray-500 dark:border-gray-700 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="tanggal pengembalian">
                            <button type="button" onClick="setTarif({{$car->id_car}})" id="cektarif{{$car->id_car}}" class="text-white bg-slate-500 rounded-lg p-1">cek tarif</button>
                        </div>
                        <div class="col-span-2">
                            <span id="tarifperday{{$car->id_car}}" hidden>{{$car->tarif}}</span>
                            <label for="tarif" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">tarif</label>
                            <input type="text" name="total_tarif" id="totaltarif{{$car->id_car}}" value="" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  >
                            <input type="text" name="tarif_per_hari" id="totaltarif" value="{{$car->tarif}}" class="bg-gray-50 border hidden border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  >
                            <input type="text" name="id_owner" id="id_owner" value="{{$car->id_owner}}" class="bg-gray-50 border hidden border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  >
                            <input type="text" name="id_car" id="id_car" value="{{$car->id_car}}" class="bg-gray-50 border hidden border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  >
                            <input type="text" name="id_user" id="id_user" value="{{Auth::user()->id_user}}" class="bg-gray-50 border hidden border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"  >
                        </div>
                    </div>
                    <button type="submit" id="btnPinjam{{$car->id_car}}" disabled class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Pinjam
                    </button>
                </form>
            </div>
        </div>

    </div> 
    <script>
       function setTarif(id){
            var dateselesai = new Date(document.getElementById(`tanggal_pengembalian${id}`).value)
            var datemulai = new Date(document.getElementById(`tanggal_mulai${id}`).value)
            var selisih_milidetik = dateselesai - datemulai;
            var selisih_hari = selisih_milidetik / (1000 * 60 * 60 * 24);
            var tarirperhari = document.getElementById(`tarifperday${id}`).textContent
            var newtarif = tarirperhari * selisih_hari
            document.getElementById(`totaltarif${id}`).value = newtarif
            document.getElementById(`btnPinjam${id}`).disabled = false
        }

    </script>
    
    @endforeach
    
    
    @endsection