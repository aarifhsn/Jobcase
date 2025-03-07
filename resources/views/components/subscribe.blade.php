<!-- start subscribe -->
<section class="relative py-16 mt-4 overflow-hidden bg-zinc-700 dark:bg-neutral-900">
    <div class="container mx-auto">
        <div class="grid items-center grid-cols-12 gap-5">
            <div class="col-span-12 lg:col-span-7">
                <div class="text-center lg:text-start">
                    <h4 class="text-white">Get New Jobs Notification!</h4>
                    <p class="mt-1 mb-0 text-white/50 dark:text-gray-300">Subscribe &amp; get all related jobs notification.</p>
                </div>
            </div>
            <div class="z-40 col-span-12 lg:col-span-5">
                <form class="flex" action="#">
                    <input
                        type="text" class="w-full text-gray-100 bg-transparent rounded-md border-gray-50/30 ltr:border-r-0 rtl:border-l-0 ltr:rounded-r-none rtl:rounded-l-none placeholder:text-13 placeholder:text-gray-100 dark:text-gray-100 dark:bg-white/5 dark:border-neutral-600 focus:ring-0 focus:ring-offset-0"
                        id="subscribe" placeholder="Enter your email" >
                    <button class="text-white border-transparent btn ltr:rounded-l-none rtl:rounded-r-none group-data-[theme-color=violet]:bg-violet-500 group-data-[theme-color=sky]:bg-sky-500 group-data-[theme-color=red]:bg-red-500 group-data-[theme-color=green]:bg-green-500 group-data-[theme-color=pink]:bg-pink-500 group-data-[theme-color=blue]:bg-blue-500 focus:ring focus:ring-custom-500/30" type="button" id="subscribebtn">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
    <div class="absolute right-0 -top-10 -z-0 opacity-20">
        <img src="{{asset('images/subscribe.png')}}" alt="" class="img-fluid">
    </div>
</section>
<!-- end subscribe -->