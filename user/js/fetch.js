const display = document.querySelector('#display');
		let dataBrg = [];

		const loadData = async () => {
			try {
				const url = await fetch('http://localhost/babakulan/admin/api/readBrgMasuk.php');
				dataBrg = await url.json();
				console.log(dataBrg);
				loadDataBrg(dataBrg);
			} catch (err) {
				console.log(err);
			}
		}

		const loadDataBrg = (data) => {
			const nama = document.querySelector('#nama');
			let no = 1;
			const output = data.produk.map((result) => {
			return`
			<div class="col-md-4">
					<div class="productbox ">
						<div class="fadeshop">
							<div class="captionshop text-center" style="display: none;">
								<h3>${result.nama_brg}</h3>
								<p>
									${result.keterangan}
								</p>
							</div>
							<span style="display: flex; justify-content: center;"  class="maxproduct"><img src="../admin/assets/img/gambar_brg_masuk/${result.gambar}" width="300px" height="300px" alt=""></span>
						</div>
						<!-- Tampilan Card -->
						<div class="product-details">
							<a href="#">
								<h1>${result.nama_brg}</h1>
							</a>
							<span class="price">
								<span class="edd_price">Rp. ${result.harga_jual}</span>
								<br>
								<span class="edd_price">Stok : ${result.stok}</span>
							</span>
						</div>
					</div>
				</div>
           		
        	`
			}).join('')
			display.innerHTML = output;
		}

		loadData();