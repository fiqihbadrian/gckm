<!-- KONTAK SECTION -->
<section id="kontak" class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-6">
        <div class="text-center mb-16">
            <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Hubungi Kami</h2>
            <p class="text-xl text-gray-600">Ada pertanyaan? Kami siap membantu Anda</p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            <div class="bg-gradient-to-br from-blue-50 to-blue-100 rounded-2xl p-8">
                <div class="flex items-start gap-4">
                    <div class="bg-green-600 w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-map-marker-alt text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Alamat</h3>
                        <p class="text-gray-700">{{ config('site.contact.address.street') }}<br/>{{ config('site.contact.address.city') }}, {{ config('site.contact.address.province') }} {{ config('site.contact.address.postal_code') }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-green-50 to-green-100 rounded-2xl p-8">
                <div class="flex items-start gap-4">
                    <div class="bg-green-600 w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-phone text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Telepon</h3>
                        <p class="text-gray-700">{{ config('site.contact.phone.0') }}<br/>{{ config('site.contact.phone.1') }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-purple-50 to-purple-100 rounded-2xl p-8">
                <div class="flex items-start gap-4">
                    <div class="bg-purple-600 w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-envelope text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Email</h3>
                        <p class="text-gray-700">{{ config('site.contact.email.0') }}<br/>{{ config('site.contact.email.1') }}</p>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-br from-orange-50 to-orange-100 rounded-2xl p-8">
                <div class="flex items-start gap-4">
                    <div class="bg-orange-600 w-12 h-12 rounded-full flex items-center justify-center flex-shrink-0">
                        <i class="fas fa-clock text-white text-xl"></i>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-gray-900 mb-2">Jam Operasional</h3>
                        <p class="text-gray-700">{{ config('site.contact.operating_hours.weekdays') }}<br/>{{ config('site.contact.operating_hours.saturday') }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-gray-50 rounded-2xl p-8 shadow-lg">
            <h3 class="text-2xl font-bold text-gray-900 mb-6">Kirim Pesan</h3>
            <form class="space-y-6">
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Nama Lengkap</label>
                    <input type="text" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-200 transition-all" placeholder="Masukkan nama Anda">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Email</label>
                    <input type="email" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-200 transition-all" placeholder="email@example.com">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Nomor Telepon</label>
                    <input type="tel" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-200 transition-all" placeholder="+62 812 3456 7890">
                </div>
                <div>
                    <label class="block text-gray-700 font-medium mb-2">Pesan</label>
                    <textarea rows="5" class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-green-500 focus:outline-none focus:ring-2 focus:ring-green-200 transition-all" placeholder="Tulis pesan Anda di sini..."></textarea>
                </div>
                <button type="submit" class="w-full bg-green-600 text-white py-4 rounded-lg font-semibold hover:bg-green-700 transition-all shadow-lg hover:shadow-xl">
                    <i class="fas fa-paper-plane mr-2"></i>Kirim Pesan
                </button>
            </form>
        </div>
    </div>
</section>
