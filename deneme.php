

<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<title>Hello, world!</title>
</head>
<body>
	
	<div class="container">
		<div class="row">
			<?php
			include 'special/baglan.php';

			$limit = 2; // sayfada gösterilecek içerik miktarını belirtiyoruz.
			$say=$db->prepare("SELECT * from makale");
			$say->execute();
			$toplam_icerik=$say->rowcount();
			$toplam_sayfa = ceil($toplam_icerik / $limit);
			// eğer sayfa girilmemişse 1 varsayalım.
			$sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
			// eğer 1'den küçük bir sayfa sayısı girildiyse 1 yapalım.
			if($sayfa < 1) $sayfa = 1; 
			// toplam sayfa sayımızdan fazla yazılırsa en son sayfayı varsayalım.
			if($sayfa > $toplam_sayfa) $sayfa = $toplam_sayfa; 
			$goster = ($sayfa - 1) * $limit;//2-1=1 1*2=2 hangi veriden başlanacağını belirler
			

			$sor=$db->prepare("SELECT * from makale order by makale_id desc limit $goster,$limit");
			$sor->execute();
			foreach ($sor as $bas ) {?>
				<div class="col-md-4">
					<div class="card mb-2">
						<img class="card-img-top" style="width: auto;height: 200px;"src="../<?php  echo $bas['makale_resim']; ?>" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title"><?php echo $bas['makale_baslik'];  ?></h5>
							<p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
								tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
							quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.</p>
							<a href="#" class="btn btn-primary">Devamını Oku</a>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>

		<nav aria-label="Page navigation example">
			<ul class="pagination justify-content-center">

				<?php if($sayfa>1){?>
					<a class="page-link" href="deneme.php?sayfa=1" >İlk</a>
					<a class="page-link" href="deneme.php?sayfa=<?php echo $sayfa-1; ?>" >Geri</a>
				<?php } ?>
				
				<?php 
				$sagsol=3;
				for ($i=$sayfa-$sagsol;$i<=$sayfa+$sagsol;$i++){
					if ($i>0 and $i<=$toplam_sayfa) {
						if ($sayfa==$i) {
							echo '<li class="page-item active"><a class="page-link" >'.$i.'</a></li>';
						}
						else{
							echo '<li class="page-item"><a class="page-link" href="deneme.php?sayfa='.$i.'">'.$i.'</a></li>';						}
							
						}
						
					}
					?>
					

					<?php if($sayfa!=$toplam_sayfa){?>
						<li class="page-item">
							<a class="page-link" href="deneme.php?sayfa=<?php echo $sayfa+1;?>">İleri</a>
						</li>
						<li class="page-item">
							<a class="page-link" href="deneme.php?sayfa=<?php echo $sayfa=$toplam_sayfa;?>">Son</a>
						</li>
					<?php  } ?>
				</ul>
			</nav>
		</div>
		

		<!-- Optional JavaScript -->
		<!-- jQuery first, then Popper.js, then Bootstrap JS -->
		<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
	</html>


