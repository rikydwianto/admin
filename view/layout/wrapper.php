<div class="page-wrapper">
	<div class="page-breadcrumb">
		<div class="row">
			<div class="col-5 align-self-center">
				<h4 class="page-title">ADMINISTRASI</h4>
			</div>
			<div class="col-7 align-self-center">
				<div class="d-flex align-items-center justify-content-end">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item">
								<a href="<?=$url?>">HOME</a>
							</li>
							<?php 
							$menu="";
							$act="";
							$id="";
							if(isset($_GET['menu'])){
								$menu = $_GET['menu'];
								$panah = " <i class='mdi mdi-arrow-right'></i> ";
								?>
									<li class="breadcrumb-item" aria-current="page"><a href="<?=menu($menu)?>"><?=str_replace("/","$panah",strtoupper($menu))?></a> &nbsp;&nbsp;&nbsp;</li>
									
								<?php
							}
							?>
							<?php 
							if(isset($_GET['act'])){
								$act = $_GET['act'];
								?>
									<li class="breadcrumb-item" aria-current="page"><a href="<?=menu($menu,$act)?>"><?=$act?></a> &nbsp;&nbsp;&nbsp; </li>
									
								<?php
							}
							if(isset($_GET['id'])){
								$id = dekrip($_GET['id']);
								?>
									<li class="breadcrumb-item" aria-current="page"><?=$id?>  &nbsp;&nbsp;&nbsp;  </li>
								<?php
							}
							?>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-body table-responsive">
						<?php 
						include"controller/control.php";
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include"view/layout/footer_name.php"; ?>
</div>