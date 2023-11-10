<style>
    .loading-spinner-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        display: flex;
        justify-content: center;
        align-items: center;
        z-index: 9999;
        /* Ubah z-index sesuai kebutuhan */
    }

    .loading-spinner {
        border: 2px solid #ccc;
        border-top: 2px solid #007bff;
        /* Ganti warna sesuai kebutuhan */
        border-radius: 50%;
        width: 20px;
        height: 20px;
        animation: spin 1s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>
<div class="loading-spinner-overlay" id="loading-spinner" style="">
    <div class="loading-spinner"></div>
    <p>Loading Data</p>
</div>
<div class="ml-2 mr-2 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 mt-6 border rounded-lg">
    <article class="p-4 mb-6 mx-8 sm:p-6 col-span-3">
        <div class="cols-2 row-dense md:flex gap-6">
            <span class="flex justify-center order-1 col-span-2">
                <svg width="141"
                    class="rounded-lg bg-white p-4 shadow-sm transition hover:shadow-lg border border-gray-200"
                    height="136" viewBox="0 0 141 136" fill="none" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink">
                    <rect x="0.5" width="140.185" height="136" fill="url(#pattern0)" />
                    <defs>
                        <pattern id="pattern0" patternContentUnits="objectBoundingBox" width="1" height="1">
                            <use xlink:href="#image0_503_939"
                                transform="matrix(0.0078125 0 0 0.00805288 0 -0.0153846)" />
                        </pattern>
                        <image id="image0_503_939" width="128" height="128"
                            xlink:href="data:image/png;base64,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" />
                    </defs>
                </svg>
            </span>
            <div class="grid grid-cols-1 order-2 text-center md:text-left">
                <p class="mt-2 text-2xl font-bold text-black" id="title_job">
                    -
                </p>
                <p class="mt-2 text-xl font-semibold text-black" id="company_name">
                    -
                </p>
                <div class="grid grid-cols-1 lg:flex justify-center lg:gap-6">
                    <p class="mt-2 font-normal text-figma-gray-500" id="company_website">
                        <i class="fa fa-link">&nbsp;</i>-
                    </p>
                    <p class="mt-2 font-normal text-figma-gray-500" id="company_num">
                        <i class="fa fa-phone">&nbsp;</i>-
                    </p>
                    <p class="mt-2 font-normal text-figma-gray-500" id="company_email">
                        <i class="fa fa-envelope">&nbsp;</i>-
                    </p>
                </div>
                {{-- <button data-popover-target="popover-bottom" data-popover-placement="bottom" type="button"
                    class="text-white bg-figma-biru-primary hover:bg-blue-800 duration-100 focus:ring-4 focus:ring-blue-300 font-medium w-auto p-4 my-12 mx-12 md:hidden lg:hidden">Apply
                    Job</button> --}}
            </div>
        </div>

    </article>

</div>
</div>

@include('company.detailjob.javascript')
