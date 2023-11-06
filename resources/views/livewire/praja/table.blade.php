<div>
    {{-- Table: Nothing in the world is as soft and yielding as water. --}}

    <div class="flex justify-between">

        {{-- Search Input --}}
        <div class="">
            <input type="text" wire:model.live="search"
                class="peer block min-h-[auto] rounded bg-transparent px-3 py-[0.32rem] leading-[1.6] outline-none transition-all duration-200 ease-linear"
                placeholder="Pencarian Data" />
        </div>

        {{-- Export Button --}}
        <div class="">
            <button type="button" data-te-ripple-init data-te-ripple-color="light"
                class="mb-2 inline-block rounded px-6 py-2.5 text-xs font-medium uppercase leading-normal text-white shadow-md transition duration-150 ease-in-out hover:shadow-lg focus:shadow-lg focus:outline-none focus:ring-0 active:shadow-lg"
                style="background-color: #128c7e" data-te-toggle="tooltip" title="Export data to excel">

                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                    class="stroke-2 w-6 h-6">
                    <path fillRule="evenodd"
                        d="M1.5 5.625c0-1.036.84-1.875 1.875-1.875h17.25c1.035 0 1.875.84 1.875 1.875v12.75c0 1.035-.84 1.875-1.875 1.875H3.375A1.875 1.875 0 011.5 18.375V5.625zM21 9.375A.375.375 0 0020.625 9h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zm0 3.75a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5a.375.375 0 00.375-.375v-1.5zM10.875 18.75a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375h7.5zM3.375 15h7.5a.375.375 0 00.375-.375v-1.5a.375.375 0 00-.375-.375h-7.5a.375.375 0 00-.375.375v1.5c0 .207.168.375.375.375zm0-3.75h7.5a.375.375 0 00.375-.375v-1.5A.375.375 0 0010.875 9h-7.5A.375.375 0 003 9.375v1.5c0 .207.168.375.375.375z"
                        clipRule="evenodd" />
                </svg>

            </button>
        </div>

    </div>

    {{-- Data Table --}}
    <div class="flex flex-col overflow-x-auto">
        <div class="sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-x-auto">
                    <table class="min-w-full text-left text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">#</th>
                                {{-- <th scope="col" class="px-6 py-4">NPP</th> --}}
                                <th scope="col" class="px-6 py-4">Nama</th>
                                <th scope="col" class="px-6 py-4">Email</th>
                                <th scope="col" class="px-6 py-4">Tempat, Tanggal Lahir</th>
                                <th scope="col" class="px-6 py-4">Jenis Kelamin</th>
                                <th scope="col" class="px-6 py-4">Alamat</th>
                                <th scope="col" class="px-6 py-4">Agama</th>
                                <th scope="col" class="px-6 py-4">Tingkat</th>
                                <th scope="col" class="px-6 py-4">Angkatan</th>
                                <th scope="col" class="px-6 py-4">Lokasi Kampus</th>
                                <th scope="col" class="px-6 py-4">Tempat Wisma</th>
                                <th scope="col" class="px-6 py-4">Program Pendidikan</th>
                                <th scope="col" class="px-6 py-4">Program Studi</th>
                                <th scope="col" class="px-6 py-4">Kelas</th>
                                <th scope="col" class="px-6 py-4">Nomor Ponsel</th>
                            </tr>
                        </thead>

                        @php
                            // dd($users);
                        @endphp

                        <tbody>
                            @foreach ($praja as $user)
                                <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-500 dark:hover:bg-neutral-600"
                                    wire:key='{{ $user->PRAJA_NPP }}'>
                                    <td class="whitespace-nowrap px-6 py-4 font-medium ">
                                        {{ $loop->index + $praja->firstItem() }}
                                    </td>

                                    {{-- <td class="whitespace-nowrap px-6 py-4">{{ $user->PRAJA_NPP }}</td> --}}
                                    <td class="whitespace-nowrap px-6 py-4">{{ $user->PRAJA_NAMA }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $user->PRAJA_EMAIL }}</td>

                                    <td class="whitespace-nowrap px-6 py-4">
                                        {{ $user->PRAJA_TEMPAT_LAHIR }},
                                        {{ $user->PRAJA_TANGGAL_LAHIR }}
                                    </td>

                                    <td class="whitespace-nowrap px-6 py-4">
                                        @if ($user->PRAJA_JENIS_KELAMIN == 'P')
                                            Perempuan
                                        @else
                                            Laki-laki
                                        @endif
                                    </td>

                                    <td class="whitespace-nowrap px-6 py-4">
                                        {{ $user->PRAJA_PROVINSI }},
                                        {{ $user->PRAJA_KOTA }}
                                    </td>

                                    <td class="whitespace-nowrap px-6 py-4">{{ $user->PRAJA_AGAMA }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $user->PRAJA_TINGKAT }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $user->PRAJA_ANGKATAN }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $user->PRAJA_KAMPUS }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $user->PRAJA_WISMA }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $user->PRAJA_PROGRAM_PENDIDIKAN }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $user->PRAJA_FAKULTAS }} -
                                        {{ $user->PRAJA_PROGRAM_STUDI }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $user->PRAJA_KELAS }}</td>
                                    <td class="whitespace-nowrap px-6 py-4">{{ $user->PRAJA_NOMOR_PONSEL }}</td>


                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    {{ $praja->links() }}
                </div>
            </div>
        </div>
    </div>

</div>
