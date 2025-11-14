document.addEventListener('DOMContentLoaded', () => {
            
            // 1. Lấy các vùng chứa (Container)
            const heroSlider = document.getElementById('dynamic-hero-slider');
            const categoryContainer = document.getElementById('dynamic-categories');
            const subBannerContainer = document.getElementById('dynamic-sub-banners');
            const productContainer = document.getElementById('product-list');

            // 2. Gọi API lấy TOÀN BỘ dữ liệu
            fetch('/shop_mvc/api/index.php?action=layTatCa')
                .then(res => res.json())
                .then(data => {
                    // data = { banners: [], categories: [], products: [] }

                    // --- A. XỬ LÝ BANNER (Slider Chính & Banner Phụ) ---
                    if (data.banners && data.banners.length > 0) {
                        
                        // Lọc banner chính (slider_chinh)
                        const mainSlides = data.banners.filter(b => b.vi_tri === 'slider_chinh');
                        if (mainSlides.length > 0) {
                            renderCarousel(heroSlider, mainSlides, 'heroCarousel');
                        } else {
                            heroSlider.innerHTML = ''; // Ẩn nếu không có
                        }

                        // Lọc banner phụ (banner_phu) - Render dạng ảnh tĩnh hoặc carousel tùy ý
                        const subBanners = data.banners.filter(b => b.vi_tri === 'banner_phu');
                        if (subBanners.length > 0) {
                            let subHtml = '';
                            subBanners.forEach(bn => {
                                subHtml += `
                                    <section class="position-relative w-100 overflow-hidden mb-3">
                                        <img src="/shop_mvc/${bn.hinh_anh}" class="img-fluid w-100" alt="${bn.tieu_de}">
                                    </section>`;
                            });
                            subBannerContainer.innerHTML = subHtml;
                        }
                    } else {
                        heroSlider.innerHTML = '<p class="text-center p-5">Chưa có banner</p>';
                    }

                    // --- B. XỬ LÝ DANH MỤC ---
                    if (data.categories && data.categories.length > 0) {
                        let catHtml = '';
                        data.categories.forEach(cat => {
                            // Ảnh mặc định nếu chưa có
                            const catImg = cat.hinh_anh ? `/shop_mvc/${cat.hinh_anh}` : '/shop_mvc/images/placeholder.jpg';
                            
                            // HTML chuẩn theo giao diện cũ của bạn
                            catHtml += `
                                <div class="col coldanhmuc">
                                    <div class="mt-2 mb-2 text-center">
                                        <a href="/shop_mvc/baocao/danhmuc.php?id=${cat.id}">
                                            <img loading="lazy" src="${catImg}" class="img-fluid" alt="${cat.ten_danhmuc}">
                                        </a>
                                        <a href="/shop_mvc/baocao/danhmuc.php?id=${cat.id}" id="danhmuc-link" style="font-size:12px; font-weight:bold; display:block; margin-top:5px;">
                                            ${cat.ten_danhmuc.toUpperCase()}
                                        </a>
                                    </div>
                                </div>
                            `;
                        });
                        categoryContainer.innerHTML = catHtml;
                    }

                    // --- C. XỬ LÝ SẢN PHẨM (Carousel từng sp) ---
                    const products = data.products || (Array.isArray(data) ? data : []); // Fallback
                    
                    if (products.length > 0) {
                        let prodHtml = '';
                        products.forEach((sp, index) => {
                            const dsAnh = sp.anh_dai_dien ? sp.anh_dai_dien.split(',') : ['images/placeholder.jpg'];
                            const carouselId = `carouselProduct${sp.id}`;
                            const price = Number(sp.gia);
                            const oldPrice = price * 1.2;

                            prodHtml += `
                            <div class="col-lg-3 col-6 mb-4">
                                <div id="${carouselId}" class="carousel carousel-dark slide" data-bs-ride="carousel">
                                    
                                    <div class="carousel-indicators">
                                        ${dsAnh.map((_, i) => `<button type="button" data-bs-target="#${carouselId}" data-bs-slide-to="${i}" class="${i===0?'active':''}"></button>`).join('')}
                                    </div>

                                    <div class="carousel-inner">
                                        ${dsAnh.map((anh, i) => `
                                            <div class="carousel-item ${i===0?'active':''}">
                                                <a href="/shop_mvc/baocao/chitietsp.php?id=${sp.id}">
                                                    <img src="/shop_mvc/${anh.trim()}" class="d-block w-100" style="height: 300px; object-fit: cover;">
                                                </a>
                                            </div>`).join('')}
                                    </div>
                                    
                                    <button class="carousel-control-prev" type="button" data-bs-target="#${carouselId}" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon"></span>
                                    </button>
                                    <button class="carousel-control-next" type="button" data-bs-target="#${carouselId}" data-bs-slide="next">
                                        <span class="carousel-control-next-icon"></span>
                                    </button>

                                    <div class="price mt-2 text-center">
                                        <h6 class="text-truncate mb-1"><a href="#" class="text-dark text-decoration-none fw-bold">${sp.ten_san_pham}</a></h6>
                                        <span class="mb-1 d-block">
                                            <span class="text-muted text-decoration-line-through me-2">${oldPrice.toLocaleString('vi-VN')}đ</span>
                                            <span class="text-danger fw-bold">${price.toLocaleString('vi-VN')}đ</span>
                                        </span>
                                    </div>
                                </div>
                            </div>`;
                        });
                        productContainer.innerHTML = prodHtml;
                    } else {
                        productContainer.innerHTML = '<p class="text-center w-100">Chưa có sản phẩm nào.</p>';
                    }

                })
                .catch(err => {
                    console.error('Lỗi:', err);
                    // Tắt loading nếu lỗi
                    heroSlider.classList.remove('min-h-banner');
                    heroSlider.innerHTML = ''; 
                });

            // Hàm hỗ trợ Render Carousel (Cho Banner chính)
            function renderCarousel(container, items, id) {
                let html = `
                    <div id="${id}" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            ${items.map((_, i) => `<button type="button" data-bs-target="#${id}" data-bs-slide-to="${i}" class="${i===0?'active':''}"></button>`).join('')}
                        </div>
                        <div class="carousel-inner">
                            ${items.map((item, i) => `
                                <div class="carousel-item ${i===0?'active':''}" data-bs-interval="4000">
                                    <img src="/shop_mvc/${item.hinh_anh}" class="d-block w-100" alt="${item.tieu_de}">
                                </div>`).join('')}
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#${id}" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#${id}" data-bs-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>`;
                container.innerHTML = html;
                container.classList.remove('min-h-banner'); // Xóa chiều cao tối thiểu sau khi load
            }
        });