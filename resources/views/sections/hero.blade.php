<!-- HERO SECTION -->
<section id="home" class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-50 via-white to-blue-100 pt-20 relative overflow-hidden">
    <!-- Animated Background (Desktop Only) -->
    <canvas id="antigravityCanvas" class="hidden md:block absolute inset-0 w-full h-full pointer-events-auto"></canvas>
    
    <!-- Decorative Elements (Mobile Only) -->
    <div class="md:hidden absolute top-20 left-10 w-72 h-72 bg-green-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob"></div>
    <div class="md:hidden absolute top-40 right-10 w-72 h-72 bg-purple-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob animation-delay-2000"></div>
    <div class="md:hidden absolute bottom-20 left-1/2 w-72 h-72 bg-pink-200 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-blob animation-delay-4000"></div>
    
    <div class="max-w-6xl mx-auto px-6 py-20 text-center relative z-10">
        <div class="animate-fade-in-up">
            <h1 class="text-5xl md:text-7xl font-bold text-green-900 mb-6">
                {{ config('site.name') }}
            </h1>
            <p class="text-xl md:text-2xl text-gray-700 mb-8 max-w-3xl mx-auto">
                {{ config('site.tagline') }}
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#denah" class="bg-green-600 text-white px-8 py-4 rounded-full font-semibold hover:bg-green-700 transition-all shadow-lg hover:shadow-xl transform hover:scale-105">
                    <i class="fas fa-map mr-2"></i>Lihat Denah Perumahan
                </a>
                <a href="#kontak" class="bg-white text-green-600 px-8 py-4 rounded-full font-semibold hover:bg-gray-50 transition-all shadow-lg hover:shadow-xl border-2 border-green-600 transform hover:scale-105">
                    <i class="fas fa-envelope mr-2"></i>Hubungi Kami
                </a>
            </div>
        </div>

        <!-- Stats -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 mt-16">
            <div class="bg-white/80 backdrop-blur-md rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all transform hover:scale-105">
                <div class="text-center">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-home text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-green-600 mb-2">{{ $totalRumah }}</h3>
                    <p class="text-gray-700 font-medium">Total Rumah</p>
                </div>
            </div>
            <div class="bg-white/80 backdrop-blur-md rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all transform hover:scale-105">
                <div class="text-center">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-check-circle text-green-600 text-2xl"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-green-600 mb-2">{{ $rumahTerisi }}</h3>
                    <p class="text-gray-700 font-medium">Rumah Terisi</p>
                </div>
            </div>
            <div class="bg-white/80 backdrop-blur-md rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all transform hover:scale-105">
                <div class="text-center">
                    <div class="bg-orange-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-door-open text-orange-600 text-2xl"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-orange-600 mb-2">{{ $rumahKosong }}</h3>
                    <p class="text-gray-700 font-medium">Rumah Kosong</p>
                </div>
            </div>
            <div class="bg-white/80 backdrop-blur-md rounded-2xl p-6 shadow-lg hover:shadow-xl transition-all transform hover:scale-105">
                <div class="text-center">
                    <div class="bg-purple-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-3">
                        <i class="fas fa-layer-group text-purple-600 text-2xl"></i>
                    </div>
                    <h3 class="text-4xl font-bold text-purple-600 mb-2">{{ count($blokStats) }}</h3>
                    <p class="text-gray-700 font-medium">Total Blok</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
// Antigravity Particles with Mouse Repulsion Effect (Desktop Only)
document.addEventListener('DOMContentLoaded', function() {
    if (window.innerWidth < 768) return; // Skip on mobile
    
    const canvas = document.getElementById('antigravityCanvas');
    if (!canvas) return;
    
    const ctx = canvas.getContext('2d');
    let particles = [];
    let animationId;
    
    // Mouse tracking
    const mouse = {
        x: undefined,
        y: undefined,
        radius: 120 // Repulsion radius
    };
    
    // Setup canvas size
    function setCanvasSize() {
        canvas.width = canvas.offsetWidth;
        canvas.height = canvas.offsetHeight;
    }
    
    setCanvasSize();
    
    // Mouse events
    window.addEventListener('mousemove', function(e) {
        const rect = canvas.getBoundingClientRect();
        mouse.x = e.clientX - rect.left;
        mouse.y = e.clientY - rect.top;
    });
    
    window.addEventListener('mouseout', function() {
        mouse.x = undefined;
        mouse.y = undefined;
    });
    
    // Particle constructor
    class Particle {
        constructor() {
            this.x = Math.random() * canvas.width;
            this.y = Math.random() * canvas.height;
            this.size = Math.random() * 3 + 1;
            this.baseX = this.x;
            this.baseY = this.y;
            this.density = (Math.random() * 30) + 1;
            this.distance = 0;
            
            // Floating upward movement
            this.speedY = Math.random() * 0.8 + 0.3;
            this.speedX = Math.random() * 0.4 - 0.2;
            
            // Colors
            const colors = [
                { r: 34, g: 197, b: 94 },   // green
                { r: 16, g: 185, b: 129 },  // emerald
                { r: 20, g: 184, b: 166 },  // teal
                { r: 59, g: 130, b: 246 },  // blue
                { r: 139, g: 92, b: 246 }   // purple
            ];
            this.color = colors[Math.floor(Math.random() * colors.length)];
            this.alpha = Math.random() * 0.5 + 0.3;
        }
        
        draw() {
            ctx.fillStyle = `rgba(${this.color.r}, ${this.color.g}, ${this.color.b}, ${this.alpha})`;
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.closePath();
            ctx.fill();
            
            // Glow effect
            ctx.shadowBlur = 10;
            ctx.shadowColor = `rgba(${this.color.r}, ${this.color.g}, ${this.color.b}, 0.5)`;
        }
        
        update() {
            // Normal floating movement
            this.baseY -= this.speedY;
            this.baseX += this.speedX;
            
            // Reset if goes off screen
            if (this.baseY < -10) {
                this.baseY = canvas.height + 10;
                this.baseX = Math.random() * canvas.width;
            }
            if (this.baseX < -10 || this.baseX > canvas.width + 10) {
                this.baseX = Math.random() * canvas.width;
            }
            
            // Mouse repulsion effect
            let dx = mouse.x - this.baseX;
            let dy = mouse.y - this.baseY;
            let distance = Math.sqrt(dx * dx + dy * dy);
            
            if (distance < mouse.radius && mouse.x != undefined) {
                // Calculate repulsion
                let forceDirectionX = dx / distance;
                let forceDirectionY = dy / distance;
                let maxDistance = mouse.radius;
                let force = (maxDistance - distance) / maxDistance;
                let directionX = forceDirectionX * force * this.density * 2;
                let directionY = forceDirectionY * force * this.density * 2;
                
                // Apply repulsion (push away from mouse)
                this.x = this.baseX - directionX;
                this.y = this.baseY - directionY;
                
                // Increase visibility when near mouse
                this.alpha = Math.min(0.9, 0.3 + force * 0.6);
            } else {
                // Return to base position
                if (this.x !== this.baseX) {
                    let dx = this.x - this.baseX;
                    this.x -= dx / 10;
                }
                if (this.y !== this.baseY) {
                    let dy = this.y - this.baseY;
                    this.y -= dy / 10;
                }
                
                // Return to base alpha
                if (this.alpha > 0.3) {
                    this.alpha -= 0.02;
                }
            }
            
            this.draw();
        }
    }
    
    // Initialize particles
    function init() {
        particles = [];
        let numberOfParticles = (canvas.width * canvas.height) / 9000;
        
        for (let i = 0; i < numberOfParticles; i++) {
            particles.push(new Particle());
        }
    }
    
    // Animation loop
    function animate() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        
        for (let i = 0; i < particles.length; i++) {
            particles[i].update();
        }
        
        animationId = requestAnimationFrame(animate);
    }
    
    // Handle resize
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) {
            setCanvasSize();
            init();
        } else {
            if (animationId) {
                cancelAnimationFrame(animationId);
            }
        }
    });
    
    // Start
    init();
    animate();
});
</script>
