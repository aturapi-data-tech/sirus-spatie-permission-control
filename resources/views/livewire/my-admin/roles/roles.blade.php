<div>

    {{-- Start Coding  --}}

    {{-- Canvas 
    Main BgColor / 
    Size H/W --}}
    <div class="w-full h-[calc(100vh-68px)] bg-white border border-gray-200 px-16 pt-2">

        {{-- Title  --}}
        <div class="mb-2">
            <h3 class="text-3xl font-bold text-gray-900 ">{{ $myTitle }}</h3>
            <span class="text-base font-normal text-gray-700">{{ $mySnipet }}</span>
        </div>
        {{-- Title --}}

        {{-- Top Bar --}}
        <div class="flex justify-between">

            <div class="flex justify-between w-full">
                {{-- Cari Data --}}
                <div class="relative w-1/3 mr-2 pointer-events-auto">
                    <div class="absolute inset-y-0 left-0 flex items-center p-5 pl-3 pointer-events-none ">
                        <svg width="24" height="24" fill="none" aria-hidden="true" class="flex-none mr-3 ">
                            <path d="m19 19-3.5-3.5" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round"></path>
                            <circle cx="11" cy="11" r="6" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"></circle>
                        </svg>
                    </div>

                    <x-text-input type="text" class="w-full p-2 pl-10" placeholder="Cari Data" autofocus
                        wire:model.live.debounce.2s="refSearch" />
                </div>

                <div>
                    <form wire:submit="createRole">
                        <x-primary-button type="submit">Create Role</x-primary-button>
                    </form>
                </div>
                {{-- Cari Data --}}


                {{-- <x-primary-button class="ml-2" wire:click='scanLogProses()' wire:loading.remove>
                    {{ 'ScanLog' }}
                </x-primary-button>

                <div wire:loading wire:target="scanLogProses">
                    <x-loading />
                </div>

                <x-primary-button class="ml-2" wire:click='scanLogProses()' wire:loading.remove>
                    {{ 'ScanLog All' }}
                </x-primary-button> --}}

            </div>

            <div>
                {{-- <x-primary-button class="ml-2" wire:click='RoleProses()' wire:loading.remove>
                    {{ 'Role' }}
                </x-primary-button>

                <div wire:loading wire:target="RoleProses">
                    <x-loading />
                </div> --}}

                {{-- <x-primary-button class="ml-2" wire:click='getDevInfoMachine()' wire:loading.remove>
                    {{ 'DevieInfo' }}
                </x-primary-button>

                <div wire:loading wire:target="getDevInfoMachine">
                    <x-loading />
                </div> --}}
            </div>

            @if ($isOpen)
                @include('livewire.my-admin.roles.create')
            @endif

        </div>
        {{-- Top Bar --}}






        <div class="h-[calc(100vh-250px)] mt-2 overflow-auto">
            <!-- Table -->
            <table class="w-full text-sm text-left text-gray-700 table-auto ">
                <thead class="sticky top-0 text-xs text-gray-900 uppercase bg-gray-100">
                    <tr>
                        <th scope="col" class="w-1/5 px-4 py-3 ">
                            Role
                        </th>
                        <th scope="col" class="w-1/5 px-4 py-3 ">
                            Guard Name
                        </th>
                        <th scope="col" class="w-1/5 px-4 py-3 ">
                            Permissions
                        </th>
                        <th scope="col" class="w-1/5 px-4 py-3 ">
                            Create
                        </th>
                        <th scope="col" class="w-1/5 px-4 py-3 ">
                            Hapus
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white ">

                    @foreach ($myQueryData as $myQData)
                        <tr class="border-b ">
                            <td class="px-4 py-2">
                                {{ $myQData->roles_name }}
                            </td>
                            <td class="px-4 py-2">
                                {{ $myQData->guard_name }}
                            </td>
                            <td class="px-4 py-2">
                                {{ $myQData->permissions_name }}
                            </td>
                            </td>
                            <td class="px-4 py-2">
                                {{ $myQData->created_at }}
                            </td>
                            <td class="px-4 py-2">
                                <div>
                                    <form wire:submit="deleteRole('{{ $myQData->id }}')">
                                        <x-primary-button type="submit">Hapus Role</x-primary-button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>

        {{ $myQueryData->links() }}








    </div>

    {{-- Canvas 
    Main BgColor / 
    Size H/W --}}

    {{-- End Coding --}}
</div>
